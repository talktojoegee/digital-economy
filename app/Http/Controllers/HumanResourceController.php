<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Department;
use App\Models\EmploymentStatus;
use App\Models\GradeLevel;
use App\Models\JobRole;
use App\Models\LocalGovernment;
use App\Models\MaritalStatus;
use App\Models\Permission as CusPermission;
use App\Models\State;
use App\Models\Supervisor;
use App\Models\SupervisorLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HumanResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->user = new User();
        $this->department = new Department();
        $this->supervisor = new Supervisor();
        $this->employmentstatus = new EmploymentStatus();
        $this->gradelevel = new GradeLevel();
        $this->maritalstatus = new MaritalStatus();
        $this->supervisorlog = new SupervisorLog();
        $this->jobrole = new JobRole();
        $this->state = new State();
        $this->localgovernment = new LocalGovernment();
        $this->auditlog = new AuditLog();
        $this->permissions = new CusPermission();

    }

    public function index(){
        return view('human-resource.all-employees',['employees'=>$this->user->getAllEmployees()]);
    }

    public function showNewEmployeeForm(){
        return view('human-resource.add-new-employee',[
            'states'=>$this->state->getAllStates(),
            'job_roles'=>$this->jobrole->getAllJobRoles(),
            'marital_statuses'=>$this->maritalstatus->getAllMaritalStatuses(),
            'grade_levels'=>$this->gradelevel->getAllGradeLevels(),
            'departments'=>$this->department->getAllDepartments(),
            'employment_types'=>$this->employmentstatus->getAllEmploymentStatuses()
        ]);
    }

    public function storeNewEmployee(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile_no'=>'required',
            //'birth_date'=>'required|date',
            //'address'=>'required',
            'local_gov'=>'required',
            'state'=>'required',
            'gender'=>'required',
            'marital_status'=>'required',
            'department'=>'required',
            'job_role'=>'required',
            //'hire_date'=>'required|date',
            //'employment_type'=>'required',
            //'grade_level'=>'required'
        ],[
            'first_name.required'=>'Enter employee first name',
            'surname.required'=>'Enter employee surname',
            'email.required'=>'Enter email address',
            'email.email'=>'Enter a valid email address',
            'email.unique'=>"An account exist with this email. Choose another one",
            'mobile_no.required'=>'Enter employee mobile number',
            //'birth_date.required'=>'Enter employee birth date',
            //'birth_date.date'=>'Enter a valid date format',
            //'address.required'=>'Enter employee address',
            'local_gov.required'=>'Select employee local government area',
            'state.required'=>'Select employee state of origin',
            'gender.required'=>'Select employee gender',
            'marital_status.required'=>'Select employee marital status',
            'department.required'=>'Assign department to employee',
            'job_role.required'=>'Choose position from the options provided.',
            //'hire_date.required'=>'When was this employee hired or employed?',
            //'hire_date.date'=>'Choose or enter a valid date format',
            //'employment_type.required'=>'Select the mode of employment',
            //'grade_level.required'=>'Select grade level'
        ]);
        $this->user->setNewEmployee($request);
        $message = Auth::user()->first_name." added a new employee (".$request->first_name." ".$request->surname.") to the system.";
        $subject = "New employee enrollment";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "<strong>Congratulations!</strong> You've successfully added a new employee to the system. A <code>random password</code> was sent to
  <u class='text-muted'>$request->email</u> along with other details. Thank you <i class='ti-heart ml-2 text-warning'></i>");
        return back();
    }

    public function viewEmployeeProfile($slug){
        $employee = $this->user->getEmployeeBySlug($slug);
        if(!empty($employee)){
            return view('human-resource.view-employee-profile',['employee'=>$employee]);
        }else{
            session()->flash("error", "<strong>Whoops!</strong> No record found.");
            return back();
        }
    }






    public function showHumanResourceSettings(){
        return view('human-resource.settings',[
            'states'=>$this->state->getAllStates(),
            'lgas'=>$this->localgovernment->getAllLocalGovernmentAreas(),
            'job_roles'=>$this->jobrole->getAllJobRoles(),
            'supervisors'=>$this->supervisor->getAllSupervisors(),
            'grade_levels'=>$this->gradelevel->getAllGradeLevels(),
            'marital_statuses'=>$this->maritalstatus->getAllMaritalStatuses(),
            'employment_statuses'=>$this->employmentstatus->getAllEmploymentStatuses(),
            'departments'=>$this->department->getAllDepartments(),
            'employees'=>$this->user->getAllActiveEmployees()
        ]);
    }
    public function storeDepartment(Request $request){
        $this->validate($request,[
            'department_name'=>'required|unique:departments,department_name'
        ],[
            'department_name.required'=>'Enter department name',
            'department_name.unique'=>"The department name you entered already exist"
        ]);
        $this->department->setNewDepartment($request);
        $message = Auth::user()->first_name." added a new section to the system";
        $subject = "New section/unit";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "<strong>Success!</strong> Department name registered.");
        return back();
    }
    public function updateDepartment(Request $request){
        $this->validate($request,[
            'department_name'=>'required',
            'department'=>'required'
        ],[
            'department_name.required'=>'Enter department name'
        ]);
        $update = $this->department->updateDepartment($request);
        $message = Auth::user()->first_name." updated section/unit from (".$request->department_name.") to (".$update->department_name.")";
        $subject = "Update on section/unit";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "<strong>Success!</strong> Your changes were saved.");
        return back();
    }
    public function storeJobRole(Request $request){
        $this->validate($request,[
            'role_name'=>'required',
            'department'=>'required',
            'description'=>'required'
        ],[
            'role_name.required'=>'Enter job role name',
            'department.required'=>'Select department',
            'description.required'=>'Enter brief description'
        ]);
        $this->jobrole->setNewJobRole($request);
        session()->flash("success", "<strong>Success!</strong> New Job role registered.");
        return back();
    }
    public function updateJobRole(Request $request){
        $this->validate($request,[
            'role_name'=>'required',
            'department'=>'required',
            'description'=>'required',
            'role'=>'required'
        ],[
            'role_name.required'=>'Enter job role name',
            'department.required'=>'Select department',
            'description.required'=>'Enter brief description'
        ]);
        $this->jobrole->updateJobRole($request);
        session()->flash("success", "<strong>Success!</strong> Your changes were saved.");
        return back();
    }

    public function assignSectionHead(Request $request){
        $this->validate($request, [
            'department'=>'required',
            'supervisor'=>'required'
        ],[
            'department.required'=>'Select department',
            'supervisor.required'=>'Select supervisor'
        ]);
        $this->supervisor->setNewSupervisor($request);
        session()->flash("success", "New section head assigned successfully!");
        return back();
    }

    public function createPermission(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:permissions,name'
        ],[
            'name.required'=>'Enter name for this permission',
            'name.unique'=>"There's a permission with this name."
        ]);
        $permission = Permission::create(['name'=>$request->name]);
        session()->flash("success", "Permission created!");
        return back();
    }

    public function grantPermissionToUser(){

    }

    public function managePermissions(){
        return view("human-resource.manage-permissions",[
            'permissions'=>$this->permissions->getPermissions()
        ]);
    }
}
