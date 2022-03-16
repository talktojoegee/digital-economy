<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WorkflowProcess extends Model
{
    use HasFactory;

    public function getOfficer(){
        return $this->belongsTo(User::class, 'officer_id');
    }

    public function getSection(){
        return $this->belongsTo(Department::class, 'department_id');
    }


    public function addWorkflowProcess($company, $request, $officer,$department, $is_seen, $status, $type, $comment = null){
        $process = new WorkflowProcess();
        $process->company_id = $company;
        $process->post_id = $request;
        $process->officer_id = $officer;
        $process->is_seen = $is_seen;
        $process->status = $status;
        $process->type = $type;
        $process->comment = $comment ?? '';
        $process->department_id = $department;
        $process->save();
        return $process;
    }

    public function updateWorkflowProcess(Request $request, $processId){
        $process = WorkflowProcess::find($processId);
        $process->status = $request->status;
        $process->save();
        return $process;
    }

    public function getWorkflowProcesses($licenseAppId, $processorId){
        return WorkflowProcess::where('post_id', $licenseAppId)->where('officer_id', $processorId)->get();
    }

    public function getWorkflowProcessByCompanyId($company_id){
        return WorkflowProcess::where('company_id', $company_id)->orderBy('id', 'DESC')->get();
    }


}
