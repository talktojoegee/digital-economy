<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEmergencyContact extends Model
{
    use HasFactory;

    public function setNewEmergencyContact(Request $request){
        $contact = new UserEmergencyContact();
        $contact->full_name = $request->full_name ?? '';
        $contact->email = $request->email ?? '';
        $contact->mobile_no = $request->emergency_mobile_no ?? '';
        $contact->relationship = $request->relationship ?? '';
        $contact->user_id = Auth::user()->id;
        $contact->save();
    }

    public function updateEmergencyContact(Request $request){
        $contact =  UserEmergencyContact::find($request->econtact);
        $contact->full_name = $request->full_name ?? '';
        $contact->email = $request->email ?? '';
        $contact->mobile_no = $request->emergency_mobile_no ?? '';
        $contact->relationship = $request->relationship ?? '';
        $contact->user_id = Auth::user()->id;
        $contact->save();
    }
}
