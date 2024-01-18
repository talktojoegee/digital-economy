<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UtilityController extends Controller
{
    //


    public function attendToRemoteRegistrationRequest(Request $request){
        $email = $request->email;
        $slug = $request->slug;
        //return response()->json(['email'=>$email, 'slug'=>$slug]);
        $subscriber = EmailVerification::storeFromRemoteRegistration($email, $slug);
        try{
            Mail::to($subscriber)->send(new VerificationMail($subscriber));
            return response()->json($subscriber);
        }catch (\Exception $exception){
            return response()->json(['error'=>"Something went wrong. {$exception->getMessage()}"],500);
        }


    }
}
