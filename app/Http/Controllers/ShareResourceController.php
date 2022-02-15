<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobRole;
use App\Models\LocalGovernment;
use Illuminate\Http\Request;

class ShareResourceController extends Controller
{
    //

    public function __construct()
    {
        $this->localgovernment = new LocalGovernment();
        $this->department = new Department();
        $this->jobrole = new JobRole();
    }

    public function loadLocalGovernments(Request $request){
        $this->validate($request,[
            'state'=>'required'
        ]);
        $lgas = $this->localgovernment->getLocalGovernmentsByStateId($request->state);
        return view('partial._local-governments', ['lgas'=>$lgas]);
    }
    public function loadDepartments(Request $request){
        $this->validate($request,[
            'role'=>'required'
        ]);
        $role = $this->jobrole->getJobRoleById($request->role);
        if(!empty($role)){
            return view('partial._departments', ['departments'=>$this->department->getDepartmentById($role->department_id)]);
        }

    }

    public function loadJobRoles(Request $request){
        $this->validate($request,[
            'department'=>'required'
        ]);
        return view('partial._job-roles', ['job_roles'=>$this->jobrole->getJobRoleByDepartmentId($request->department)]);
    }




}
