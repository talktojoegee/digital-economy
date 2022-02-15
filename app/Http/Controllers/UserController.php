<?php

namespace App\Http\Controllers;

use App\Models\UserEmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->useremergencycontact = new UserEmergencyContact();
    }

    public function changePassword(Request $request){
        $this->validate($request,[
            'current_password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ],[
            'current_password.required'=>'Enter your current password for this account.',
            'password.required'=>'Choose a new password.',
            'password.confirmed'=>'New password does not match with confirm/re-type password.',
            'password_confirmation.required'=>'Re-type password'
        ]);
        if (Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->password = bcrypt($request->password);
            Auth::user()->save();
            session()->flash("success", "<strong>Congratulations!</strong> You've successfully changed your password.");
            return back();
        }else{
            session()->flash("error", "<strong>Whoops!</strong> The password you entered does not match our record.");
            return back();
        }
    }

    public function addNewEmergencyContact(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email',
            'emergency_mobile_no'=>'required',
            'relationship'=>'required'
        ],[
            'full_name.required'=>'Enter full name',
            'email.required'=>'Enter email address',
            'email.email'=>'Enter a valid email address',
            'relationship.required'=>"What's your relationship with this person?",
            'emergency_mobile_no.required'=>'Enter mobile number'
        ]);
        $this->useremergencycontact->setNewEmergencyContact($request);
        session()->flash("success", "<strong>Success!</strong> Your new emergency contact was added.");
        return back();
    }
}
