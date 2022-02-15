<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkMessage extends Model
{
    use HasFactory;
    public function setNewMessage($msg, $phone_numbers){
        $message = new BulkMessage();
        $message->sent_by = Auth::user()->id;
        $message->status = 1;
        $message->slug = substr(sha1(time()),29,40);
        $message->message = $msg;
        $message->sent_to = $phone_numbers;
        $message->save();
    }

    public function getTenantMessages(){
        return BulkMessage::orderBy('id', 'DESC')->get();
    }

    public function getTenantMessageBySlug($slug){
        return BulkMessage::where('slug', $slug)->first();
    }
}
