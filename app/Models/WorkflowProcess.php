<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowProcess extends Model
{
    use HasFactory;

    public function getOfficer(){
        return $this->belongsTo(User::class, 'officer_id');
    }



    public function addWorkflowProcess($company, $request, $officer, $is_seen, $status, $type){
        $process = new WorkflowProcess();
        $process->company_id = $company;
        $process->post_id = $request;
        $process->officer_id = $officer;
        $process->is_seen = $is_seen;
        $process->status = $status;
        $process->type = $type;
        $process->save();
        return $process;
    }

    public function getWorkflowProcessByCompanyId($company_id){
        return WorkflowProcess::where('company_id', $company_id)->orderBy('id', 'DESC')->get();
    }


}
