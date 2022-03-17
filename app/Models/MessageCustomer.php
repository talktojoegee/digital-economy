<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageCustomer extends Model
{
    use HasFactory;

    public function getCustomer(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getSentBy(){
        return $this->belongsTo(User::class, 'sent_by');
    }




    public function messageCustomer(Request  $request){
        $message = new MessageCustomer();
        $message->company_id = $request->customer;
        $message->subject = $request->subject;
        $message->message = $request->compose_message;
        $message->slug = Str::slug($request->subject).'-'.substr(sha1(time()),32,40);
        $message->sent_by = Auth::user()->id;
        $message->ref_code = substr(sha1(time()),30,40);
        $message->message_type = $request->message_type;
        $message->save();
        return $message;
    }

    public function getAllMessagesByCompanyId($companyId){
        return MessageCustomer::where('company_id', $companyId)->orderBy('id', 'DESC')->get();
    }

    public function updateMessageStatus($id, $status){
        $message = MessageCustomer::find($id);
        $message->message_status = $status;
        $message->date_updated = now();
        $message->status_updated_by = Auth::user()->id;
        $message->save();
    }

    public function getAllMessages(){
        return MessageCustomer::orderBy('id', 'DESC')->get();
    }

    public function getAllMessagesBySlug($slug){
        return MessageCustomer::where('slug', $slug)->first();
    }
}
