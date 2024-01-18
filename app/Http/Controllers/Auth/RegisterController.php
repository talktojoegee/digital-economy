<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use App\Models\Company;
use App\Models\EmailVerification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->emailverification = new EmailVerification();
        $this->company = new Company();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function eRegistration(Request $request){
        $this->validate($request,[
            'security_code'=>'required',
            'email'=>'email|required|unique:companies,email',
            'validScode'=>'required'
        ],[
            'security_code.required'=>'Enter security code in the box provided.',
            'email.email'=>'Enter a valid email address',
            'email.required'=>'Enter email address in the box provided',
            'email.unique'=>"There's already an account with this email address"
        ]);

        if($request->validScode !== $request->security_code){
            session()->flash("error", "Whoops! Incorrect security code. Try again.");
            return back();
        }else{
            $subscriber = $this->emailverification->addRegistration($request);
            #Send mail
            //try{
            //$url = "https://digitale.ojivenetworksolutions.com.ng/api/mailer/send";
            $url = "https://digitale.ojivenetworksolutions.com.ng/mailer/send/{$subscriber->slug}/{$subscriber->email}";
            //$form['slug'] = $subscriber->slug;
            //$form['email'] = $subscriber->email;
            //$req = $this->sendAPIRequest($url, json_encode($form));
            $client = new Client();
            $response = $client->get($url);
            if($response->getStatusCode() == 200){
                session()->flash("success", "Success! A verification link was sent to your email account. Please click on the link
            provided to continue with the registration process.");
                return back();
            }else{
                session()->flash("error", "<strong>Whoops!</strong> We had trouble sending a mail to this email address"."(".$request->email.")");
                  return back();
            }
                //\Mail::to($subscriber)->send(new VerificationMail($subscriber) );
                //session()->flash("success", "Success! A verification link was sent to your email account. Please click on the link
            //provided to continue with the registration process.");
            //session()->flash("success", "Phase one of the registration process was successful.");
            //return redirect()->route('verify-e-registration', $subscriber->slug);
                //return back();
            //}catch (\Exception $ex){
              //  session()->flash("error", "<strong>Whoops!</strong> We had trouble sending a mail to this email address"."(".$request->email.")");
              //  return back();
            //}
        }

    }

    public function verifyERegistration(Request $request){
        $token = $request->token;
        $verifyToken = $this->emailverification->getRegistrationBySlug($token);
        if(!empty($verifyToken)){
            //session()->flash("success", "Welcome back! Let's quickly get this out of the way.");
            return view('auth.verify', ['token'=>$verifyToken]);
        }else{
            session()->flash("error", "The token has expired or is no longer in use.");
            return view('auth.register');
        }
    }

    public function registerSubscriber(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:companies,email',
            'password'=>'required|confirmed',
            'company_name'=>'required',
            'token'=>'required'
        ],[
            'email.email'=>'Enter a valid email address',
            'email.required'=>'Enter email address in the box provided',
            'company_name.required'=>'Enter company name in the box provided',
            'password.required'=>'Choose a strong password to secure your account',
            'password.confirmed'=>'Password mis-match. Check and try again.',
            'email.unique'=>"There's already an account with this email address"
        ]);
        $verify = $this->emailverification->findRequestBySlug($request->token);
         if(!empty($verify)){
             $statusUpdate = $this->emailverification->updateStatus($request->token, 1);
             if($statusUpdate){
                 $this->company->basicSetup($request);
                 session()->flash("success", "Congratulations ".$request->company_name."! Your account was registered successfully.");
                 //return back();
                 return redirect()->route('login');
             }else{
                 session()->flash("error", "Whoops! Something went wrong. Try again.");
                 return back();
             }

         }

    }

    public function sendAPIRequest($url, $data){

        try{
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_POSTFIELDS =>$data,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            return curl_exec($curl);

            curl_close($curl);
        }catch (\Exception $exception){
            return 'exception'.$exception;
        }
    }
}
