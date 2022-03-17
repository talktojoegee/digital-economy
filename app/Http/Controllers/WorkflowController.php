<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AppDefaultSetting;
use App\Models\AppSmsSetting;
use App\Models\AuditLog;
use App\Models\Company;
use App\Models\Department;
use App\Models\EmploymentStatus;
use App\Models\GradeLevel;
use App\Models\JobRole;
use App\Models\LicenceApplication;
use App\Models\LocalGovernment;
use App\Models\MaritalStatus;
use App\Models\MessageCustomer;
use App\Models\RadioLicenseApplication;
use App\Models\RadioLicenseApplicationDetail;
use App\Models\State;
use App\Models\Supervisor;
use App\Models\SupervisorLog;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\WorkflowProcess;
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
        $this->radiolicenseapplication = new RadioLicenseApplication();
        $this->radiolicenseapplicationdetails = new RadioLicenseApplicationDetail();
        $this->company = new Company();
        $this->workflowprocess = new WorkflowProcess();
        $this->adminnotification = new AdminNotification();
        $this->usernotification = new UserNotification();
        $this->messagecustomer = new MessageCustomer();
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
        return view('workflow.index',[
            'applications'=>$this->radiolicenseapplication->getAllRadioLicenseApplications()
        ]);
    }

    public function readRadioLicenseApplication($slug){
        $application = $this->radiolicenseapplication->getRadioLicenseApplicationBySlug($slug);
        if($application){
            $form = false;
            $processId = null;
            $processes = $this->workflowprocess->getWorkflowProcesses($application->id, Auth::user()->id);
            $workflow_processes = $this->workflowprocess->getAllWorkflowProcessesByApplicationId($application->id);
            if(!empty($processes)){
                foreach($processes as $process){
                    if($process->status == 0 && $process->is_seen == 0){
                        $form = true;
                        $processId = $process->id;
                        break;
                    }
                }
                return view('workflow.view',[
                    'application'=>$application,
                    'sections'=>$this->department->getAllDepartments(),
                    'form'=>$form,
                    'processId'=>$processId,
                    'workflow_processes'=>$workflow_processes
                ]);
            }else{
                return view('workflow.view',[
                    'application'=>$application,
                    'sections'=>$this->department->getAllDepartments(),
                    'form'=>$form,
                    'processId'=>$processId,
                    'workflow_processes'=>$workflow_processes
                ]);
            }

        }else{
            session()->flash("error", "Whoops! No record found.");
            return back();
        }
    }

    public function processRadioLicenseApplication(Request $request){
        $this->validate($request,[
            'comment'=>'required',
            'action_type'=>'required',
            'status'=>'required',
            'appId'=>'required'
        ],[
          'comment.required'=>'Kindly leave a comment',
          'status.required'=>'Select status',
          'action_type.required'=>'What form of action would you want to take?'
        ]);
        $radioApp = $this->radiolicenseapplication->getRadioLicenseApplicationById($request->appId);
        if(!empty($radioApp)){

            if($request->action_type == 1){ //forward
                $this->validate($request,[
                    'section'=>'required'
                ],[
                    'section.required'=>"Select section/unit to forward this application to."
                ]);

                $supervisor = $this->supervisor->getActiveSupervisorByDepartmentId($request->section);
                if(!empty($supervisor)){

                    $update = $this->workflowprocess->updateWorkflowProcess($request);

                    //$company, $request, $officer, $is_seen, $status, $type
                    $this->workflowprocess->addWorkflowProcess($radioApp->company_id, $radioApp->id, $supervisor->user_id, $supervisor->department_id,0, 0, 1, $request->comment);
                    #Admin notification
                    $subject = "Update on New Radio license application";
                    $body = Auth::user()->first_name." acted on a new radio license application";
                    $this->adminnotification->addAdminNotification($subject, $body, "read-radio-license-application", $radioApp->slug, 1, $supervisor->user_id);

                    #User notification
                    $subject = "Update on New Radio license application";
                    $body = "An action was recently taken on your radio license application";
                    $this->usernotification->addUserNotification($subject, $body, "view-radio-license-application", $radioApp->slug, 1, $radioApp->company_id);

                    session()->flash("success", "Your action was successfully recorded.");
                    return redirect()->route('workflow');
                }else{
                    session()->flash("error", "Whoops! There's currently no supervisor in the selected section. Kindly choose another section or setup a supervisor.");
                    return back();
                }
            }else{
                $update = $this->workflowprocess->updateWorkflowProcess($request);
                $appUpdate = $this->radiolicenseapplication->updateRadioLicenceApplicationStatus($request->appId, $request->status);
                #Admin notification
                $subject = "Process Completed!";
                $body = Auth::user()->first_name." marked this application as final";
                $this->adminnotification->addAdminNotification($subject, $body, "read-radio-license-application", $radioApp->slug, 1, Auth::user()->id);

                #User notification
                $subject = "Process Completed!";
                $body = "Your radio license application workflow process is done.";
                $this->usernotification->addUserNotification($subject, $body, "view-radio-license-application", $radioApp->slug, 1, $radioApp->company_id);

                session()->flash("success", "Your action was successfully recorded.");
                return redirect()->route('workflow');
            }

        }else{
            session()->flash("error", "Record not found.");
            return back();
        }
    }

    public function showMessageCustomerForm($customer){
        $customer = $this->company->getCompanyBySlug($customer);
        if(!empty($customer)){
            return view('workflow.message-customer', ['customer'=>$customer]);
        }else{
            session()->flash("error", "Whoops! No record found.");
            return back();
        }

    }

    public function messageCustomer(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'customer'=>'required',
            'compose_message'=>'required'
        ],[
            'subject.required'=>'Enter a subject for this conversation',
            'compose_message.required'=>'Type a message in the box provided.'
        ]);
        $message = $this->messagecustomer->messageCustomer($request);
        //Log
        #Admin notification
        $subject = "Message Customer";
        $body = Auth::user()->first_name." sent a message to customer.";
        $this->adminnotification->addAdminNotification($subject, $body, "read-message", $message->slug, 1, Auth::user()->id);

        #User notification
        $subject = "New message from ".config('app.name');
        $body = "You recently received a message from ".config('app.name');
        $this->usernotification->addUserNotification($subject, $body, "view-message", $message->slug, 1, $request->customer);
        session()->flash("success", "Your message was sent.");
        return back();
    }

    public function messages(){
        return view('workflow.messages', ['messages'=>$this->messagecustomer->getAllMessages()]);
    }

    public function readMessage($slug){
        $message = $this->messagecustomer->getAllMessagesBySlug($slug);
        if(!empty($message)){
            return view('workflow.message-view', ['message'=>$message]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }

    }
}
