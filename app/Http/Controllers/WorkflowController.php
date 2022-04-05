<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AppDefaultSetting;
use App\Models\AppSmsSetting;
use App\Models\AssignFrequencyQueue;
use App\Models\AuditLog;
use App\Models\Company;
use App\Models\Department;
use App\Models\EmploymentStatus;
use App\Models\FrequencyAssignment;
use App\Models\GradeLevel;
use App\Models\JobRole;
use App\Models\Invoice;
use App\Models\LicenceApplication;
use App\Models\LocalGovernment;
use App\Models\MaritalStatus;
//use App\Models\MessageCustomer;
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
        $this->invoice = new Invoice();
        $this->assignfrequencyqueue = new AssignFrequencyQueue();
        $this->frequencyassignment = new FrequencyAssignment();
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

    public function loadQueuedFrequencyAssignments(){
        return view('frequency.index',[
            'queue'=>$this->assignfrequencyqueue->getAllQueuedFrequencyAssignments()
        ]);
    }

    public function showAssignFrequencyForm($slug, $invoice_slug){
        $company = $this->company->getCompanyBySlug($slug);
        if(!empty($company)){
            $invoice = $this->invoice->getInvoiceBySlug($invoice_slug);
            if(empty($invoice)){
                session()->flash("error", "No record found.");
                return redirect()->route("manage-transactions");
            }
            $detail = $this->radiolicenseapplicationdetails->getSingleDetailByRadioLicenseAppId($invoice->radio_lic_app_id);
            $handheld = $this->radiolicenseapplicationdetails->sumNumberOfDevicesByParam($invoice->radio_lic_app_id, 1);
            $base = $this->radiolicenseapplicationdetails->sumNumberOfDevicesByParam($invoice->radio_lic_app_id, 2);
            $repeaters = $this->radiolicenseapplicationdetails->sumNumberOfDevicesByParam($invoice->radio_lic_app_id, 3);
            $vehicular = $this->radiolicenseapplicationdetails->sumNumberOfDevicesByParam($invoice->radio_lic_app_id, 4);
            return view("frequency.assign-frequency",[
                'customer'=>$company,
                'applicationId'=>$invoice->radio_lic_app_id,
                'invoice_slug'=>$invoice->slug,
                'handheld'=>$handheld,
                'base'=>$base,
                'repeaters'=>$repeaters,
                'vehicular'=>$vehicular,
                'detail'=>$detail
            ]);
        }else{
            session()->flash("error", "No record found.");
            return redirect()->route("manage-transactions");
        }
    }


    public function assignRadioFrequency(Request $request){
        //return dd($request->all());
        $this->validate($request,[
            'start_date'=>'required|date',
            'assign_frequency'=>'required|array',
            'assign_frequency.*'=>'required',
            'application'=>'required'

        ],[
            'assign_frequency.required'=>'Enter frequency value in the field provided',
            'start_date.required'=>'Choose a date for license validity',
            'start_date.date'=>'Enter a valid date format'
        ]);
        $application = $this->radiolicenseapplication->getRadioLicenseApplicationById($request->application);
        $companyId = $application->company_id;
        $batch_code = substr(sha1(time()),27,40);
        if(count($request->assign_frequency) > 0){
            for($i = 0; $i < count($request->assign_frequency); $i++){
                $frequency = $this->frequencyassignment->addFrequency($companyId, $request->application,
                    $request->type_of_device[$i], $request->assign_frequency[$i], $request->start_date, $batch_code);
            }
            //Update queued freq. assign. status
            $queue = $this->assignfrequencyqueue->updateQueuedFrequencyAssignmentBySlug($request->slug, 1);

            session()->flash("success", "You've successfully assigned frequencies.");
            return redirect()->route('queued-frequency-assignment');
        }else{
            session()->flash("error", "Whoops! Something went wrong. Try again.");
            return back();
        }

    }

    public function showTransactionReportForm(){

        return view('invoice.transaction-report',[
            'thisMonth'=>$this->invoice->thisMonthsInvoice(),
            'search'=>0
        ]);
    }

    public function generateTransactionReport(Request $request){
        $this->validate($request,[
            'start'=>'required',
            'end'=>'required'
        ],[
            'start.required'=>'Select start date',
            'end.required'=>'Select end date'
        ]);
        return view('invoice.transaction-report',[
            'search'=>1,
            'invoices'=>$this->invoice->generateReport($request->start, $request->end),
        ]);
    }

    public function assignedFrequencies(){
        return view('frequency.assigned',
            [
                'frequencies'=>$this->frequencyassignment->getAllCompanyFrequencies()
            ]);
    }

    public function readFrequency($id){
        $frequency = $this->frequencyassignment->getFrequencyById($id);
        if(!empty($frequency)){
            return view('frequency.view',['frequency'=>$frequency]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }
    }


}
