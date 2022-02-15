<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Department extends Model
{
    use HasFactory;

    public function getSupervisor(){
        return $this->belongsTo(Supervisor::class, 'user_id');
    }



    /*
     * Use-case
     */

    public function setNewDepartment(Request $request){
        $department = new Department();
        $department->department_name = $request->department_name ?? "";
        $department->save();
    }


    public function updateDepartment(Request $request){
        $department = Department::find($request->department);
        $department->department_name = $request->department_name ?? "";
        $department->save();
    }

    public function getAllDepartments(){
        return Department::orderBy('department_name', 'ASC')->get();
    }

    public function getDepartmentById($id){
        return Department::find($id);
    }
}
