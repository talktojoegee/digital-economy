<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Supervisor extends Model
{
    use HasFactory;

    public function getEmployee(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getDepartment(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    /*
     * Use-case
     */
    public function getAllSupervisors(){
        return Supervisor::orderBy('id', 'DESC')->get();
    }

    public function setNewSupervisor(Request $request){
        $status = $this->checkForAnyActiveSupervisorByDepartment($request->department);

        if(!empty($status)){
            //Update status
            $this->updateSupervisorStatus($status); //make active supervisor inactive
            $supervisor = new Supervisor();
            $supervisor->user_id = $request->supervisor;
            $supervisor->department_id = $request->department;
            $supervisor->assigned_by = Auth::user()->id;
            $supervisor->save();
        }else{
            $supervisor = new Supervisor();
            $supervisor->user_id = $request->supervisor;
            $supervisor->department_id = $request->department;
            $supervisor->assigned_by = Auth::user()->id;
            $supervisor->save();
        }

    }

    public function checkForAnyActiveSupervisorByDepartment($department){
        return Supervisor::where('department_id',$department)->first();

    }

    public function updateSupervisorStatus($status){
        $supervisor = Supervisor::where('department_id', $status->department_id)->get();
        if(!empty($supervisor) || count($supervisor) > 0){
            foreach($supervisor as $sup){
                $sup->status = 0;
                $sup->save();
            }
        }
    }

    public function getActiveSupervisorByDepartmentId($department_id){
        return Supervisor::where('department_id', $department_id)->where('status',1)->first();
    }

}
