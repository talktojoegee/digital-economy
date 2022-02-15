<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JobRole extends Model
{
    use HasFactory;

    public function getDepartment(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    /*
     * use-case methods
     */
    public function setNewJobRole(Request $request){
        $role = new JobRole();
        $role->role_name = $request->role_name ?? '';
        $role->description = $request->description ?? '';
        $role->department_id = $request->department ?? '';
        $role->save();
    }


    public function updateJobRole(Request $request){
        $role =  JobRole::find($request->role);
        $role->role_name = $request->role_name ?? '';
        $role->description = $request->description ?? '';
        $role->department_id = $request->department ?? '';
        $role->save();
    }

    public function getAllJobRoles(){
        return JobRole::orderBy('role_name', 'ASC')->get();
    }

    public function getJobRoleById($id){
        return JobRole::find($id);
    }

    public function getJobRoleByDepartmentId($id){
        return JobRole::where('department_id',$id)->get();
    }
}
