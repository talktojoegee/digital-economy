<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;


    public function getOfficer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function registerLog($user, $subject, $activity){
        $log = new AuditLog();
        $log->user_id = $user;
        $log->subject = $subject;
        $log->activity = $activity;
        $log->save();
    }


    public function getAuditLog(){
        return AuditLog::orderBy('id', 'DESC')->get();
    }

    public function getAuditLogByPeriod($start, $end){
        return AuditLog::whereBetween('created_at', [$start, $end])->orderBy('id', 'DESC')->get();
    }



}
