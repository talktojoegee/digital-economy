<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrequencyAssignmentLog extends Model
{
    use HasFactory;

    public function getLoggedBy(){
        return $this->belongsTo(User::class, 'logged_by');
    }


    public function logRequest(Request $request){
        $log = new FrequencyAssignmentLog();
        $log->fa_id = $request->frequency_id;
        $log->logged_by = Auth::user()->id;
        $log->subject = $request->subject;
        $log->narration = $request->narration;
        $log->save();
        return $log;
    }

    public function getLogByFrequencyAssignmentId($id){
        return FrequencyAssignmentLog::where('fa_id', $id)->orderBy('id', 'DESC')->get();
    }
}
