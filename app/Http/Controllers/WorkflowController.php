<?php

namespace App\Http\Controllers;

use App\Models\AppDefaultSetting;
use App\Models\AppSmsSetting;
use App\Models\AuditLog;
use App\Models\Department;
use App\Models\EmploymentStatus;
use App\Models\GradeLevel;
use App\Models\JobRole;
use App\Models\LicenceApplication;
use App\Models\LocalGovernment;
use App\Models\MaritalStatus;
use App\Models\State;
use App\Models\Supervisor;
use App\Models\SupervisorLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkflowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->department = new Department();
        $this->user = new User();
        $this->supervisor = new Supervisor();
        $this->employmentstatus = new EmploymentStatus();
        $this->gradelevel = new GradeLevel();
        $this->maritalstatus = new MaritalStatus();
        $this->supervisorlog = new SupervisorLog();
        $this->jobrole = new JobRole();
        $this->state = new State();
        $this->localgovernment = new LocalGovernment();
        $this->appdefaultsettings = new AppDefaultSetting();
        $this->appsmsdefaultsettings = new AppSmsSetting();
        $this->auditlog = new AuditLog();
        $this->licenceapplication = new LicenceApplication();
    }

    public function showWorkflowSettings(){
        return view('workflow.settings',[
            'departments'=>$this->department->getAllDepartments(),
            'states'=>$this->state->getAllStates(),
            'lgas'=>$this->localgovernment->getAllLocalGovernmentAreas(),
            'job_roles'=>$this->jobrole->getAllJobRoles(),
            'supervisors'=>$this->supervisor->getAllSupervisors(),
            'grade_levels'=>$this->gradelevel->getAllGradeLevels(),
            'marital_statuses'=>$this->maritalstatus->getAllMaritalStatuses(),
            'employment_statuses'=>$this->employmentstatus->getAllEmploymentStatuses(),
            'employees'=>$this->user->getAllActiveEmployees(),
            'app_licence_setting'=>$this->appdefaultsettings->getAppDefaultSettings(),
            'app_sms_setting'=>$this->appsmsdefaultsettings->getAppSmsDefaultSettings(),
        ]);
    }

    public function appDefaultSettings(Request $request){
        $this->validate($request,[
           'new_app_section'=>'required',
            'licence_renewal'=>'required',
            'engage_customer'=>'required'
        ],[
            'new_app_section.required'=>'Kindly choose which section/unit should initiate new licence workflow process ',
            'licence_renewal.required'=>'Choose the section/unit that should initiate licence renewal process',
            'engage_customer.required'=>'Which section or unit interacts with customers?'
        ]);
        $this->appdefaultsettings->addAppDefaultSetting($request);
        $message = Auth::user()->first_name." updated application default settings for: new licence application, renewal and customer engagement";
        $subject = "Application default settings(licence & customer engagement)";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success",  "Your settings were saved successfully.");
        return back();
    }

    public function workflow(){
        return view('workflow.index');
    }

    public function readMemo($slug){
        $memo = $this->licenceapplication->getLicenceApplicationByCompanySlug($slug);
        if(!empty($memo)){
            return view('workflow.view',['memo'=>$memo]);
        }else{
            session()->flash("error", "Record not found.");
            return redirect()->route('workflow');
        }
    }
}
