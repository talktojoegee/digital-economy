<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->user = new User();
        $this->company = new Company();
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ],
            [
                'email.required'=>'Enter your registered email',
                'password.required'=>'Enter valid password for this account.'
            ]);
        if(Auth::guard('web')->attempt([
            'email'=>$request->email,
            'password'=>$request->password])){

            $company = $this->company->getCompanyByEmail($request->email);
            if($company){
                return redirect()->route('dashboard');
            }else{
                session()->flash("error", "We could not log you in at the moment. Try again later.");
                return back();
            }
        }else{
            session()->flash("error", " Wrong or invalid login credentials. Try again or contact support.");
            return back();
        }
    }


    public function showAdminLoginScreen(){
        return view('auth.admin-login');
    }

    public function loginAdmin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ],
            [
                'email.required'=>'Enter your registered email',
                'password.required'=>'Enter valid password for this account.'
            ]);
        if(Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password],
            $request->remember)){

            $user = $this->user->getUserByEmail($request->email);
            if($user){
                return redirect()->route('admin-dashboard');
            }else{
                session()->flash("error", "We could not log you in at the moment. Try again later.");
                return back();
            }
        }else{
            session()->flash("error", " Wrong or invalid login credentials. Try again or contact support.");
            return back();
        }
    }
}
