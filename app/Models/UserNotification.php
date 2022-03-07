<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;


    public function addUserNotification($subject, $body, $route_name, $route_param, $route_type, $user_id){
        $notify = new UserNotification();
        $notify->subject = $subject ?? '';
        $notify->body = $body ?? '';
        $notify->route_name = $route_name ?? '';
        $notify->route_param = $route_param ?? '';
        $notify->route_type = $route_type ?? "" ;
        $notify->user_id = $user_id;
        $notify->is_read = 0; //not read
        $notify->save();
    }

    public function getNotifications($user_id){
        return UserNotification::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
    }
}
