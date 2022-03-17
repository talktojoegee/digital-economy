<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AppDefaultSetting;
use App\Models\LicenceCategory;
use App\Models\RadioLicenseApplication;
use App\Models\RadioLicenseApplicationDetail;
use App\Models\Supervisor;
use App\Models\UserNotification;
use App\Models\WorkflowProcess;
use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RadioLicenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth:web');
        $this->workstation = new Workstation();
        $this->licencecategory = new LicenceCategory();
        $this->radiolicenseapplication = new RadioLicenseApplication();
        $this->radiolicenseapplicationdetails = new RadioLicenseApplicationDetail();
        $this->appdefaultsetting = new AppDefaultSetting();
        $this->supervisor = new Supervisor();
        $this->workflowprocess = new WorkflowProcess();
        $this->adminnotification = new AdminNotification();
        $this->usernotification = new UserNotification();
    }

    public function showAllMyRadioLicenseApplications(){
        return view('operators.all-radio-license-applications',[
            'applications'=>$this->radiolicenseapplication->getAllCompanyRadioLicenseApplications(Auth::user()->id)
        ]);
    }

    public function showRadioLicenseApplicationForm(){
        $default_settings = $this->appdefaultsetting->getAppDefaultSettings();
        if(empty($default_settings)){
            session()->flash("error", "Whoops! We can't process new applications at the moment. Try again later.");
            return redirect()->route('all-radio-license-applications');
        }
        return view('operators.radio-license-form', [
        'licence_categories'=>$this->licencecategory->getLicenceCategories(),
            'work_stations'=>$this->workstation->getCompanyWorkStations(Auth::user()->id)
        ]);
    }

    public function addRadioLicenseApplication(Request  $request){
        $this->validate($request,[
            'purpose'=>'required',
            'type_of_device'=>'required|array',
            'type_of_device.*'=>'required',
            'workstation'=>'required|array',
            'workstation.*'=>'required',
            'licence_category'=>'required|array',
            'licence_category.*'=>'required',
            'no_of_devices'=>'required|array',
            'no_of_devices.*'=>'required'
        ],[
            'purpose.required'=>"Type the purpose of this application in the space provided.",
            'type_of_device.required'=>'Select type of device from the options provided',
            'workstation.required'=>'Select from your list of workstations',
            'licence_category.required'=>'Select the category of licence',
            'no_of_devices.required'=>'Enter the number of devices'
        ]);
        $defaultSettings = $this->appdefaultsetting->getAppDefaultSettings();
        if(!empty($defaultSettings)){
            if(!empty($defaultSettings->new_app_section_handler)){
                $department = $defaultSettings->new_app_section_handler;
                $supervisor = $this->supervisor->getActiveSupervisorByDepartmentId($department);
                if(!empty($supervisor)){

                    $application = $this->radiolicenseapplication->setRadioLicenseApplication($request);
                    if($application){
                        $this->radiolicenseapplicationdetails->setRadioLicenseApplicationDetails($request, $application->id);
                        #Register new workflow process
                        #$company, $request, $officer, $is_seen, $status, $type
                        $this->workflowprocess->addWorkflowProcess(Auth::user()->id, $application->id, $supervisor->user_id, $supervisor->department_id, 0, 0, 1, 'Workflow process initiated');
                        #$subject, $body, $route_name, $route_param, $route_type, $user_id
                        #Admin notification
                        $subject = "New Radio license application";
                        $body = Auth::user()->company_name." just submitted a new radio license application";
                        $this->adminnotification->addAdminNotification($subject, $body, "read-radio-license-application", $application->slug, 1, $supervisor->user_id);

                        #User notification
                        $subject = "New Radio license application";
                        $body = "Here's an acknowledgement of your radio license application.";
                        $this->usernotification->addUserNotification($subject, $body, "view-radio-license-application", $application->slug, 1, Auth::user()->id);


                        session()->flash("success", "Your radio license application was received. You can monitor your application process by logging into your account.");
                        return redirect()->route('all-radio-license-applications');
                    }else{
                        session()->flash("error", "Whoops! Something went wrong. Try again later.");
                        return back();
                    }

                }else{
                    session()->flash("error", "We can't process new applications at the moment. Try again later.");
                    return redirect()->route('all-radio-license-applications');
                }

            }else{
                session()->flash("error", "We can't process new applications at the moment. Try again later.");
                return redirect()->route('all-radio-license-applications');
            }
        }else{
            session()->flash("error", "We can't process new applications at the moment. Try again later.");
            return redirect()->route('all-radio-license-applications');
        }

    }

    public function showRadioLicenseApplication($slug){
        $application = $this->radiolicenseapplication->getRadioLicenseApplicationBySlug($slug);
        if($application){
            return view('operators.radio-license-details',['application'=>$application]);
        }else{
            session()->flash("error", "Whoops! No record found.");
            return redirect()->route('all-radio-license-applications');
        }
    }
}
