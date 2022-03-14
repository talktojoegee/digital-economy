<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\CompanyDirector;
use App\Models\Country;
use App\Models\LicenceApplication;
use App\Models\LicenceCategory;
use App\Models\LocalGovernment;
use App\Models\State;
use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->company = new Company();
        $this->state = new State();
        $this->lga = new LocalGovernment();
        $this->letter = new LicenceApplication();
        $this->licencecategory = new LicenceCategory();
        $this->director = new CompanyDirector();
        $this->country = new Country();
        $this->auditlog = new AuditLog();
        $this->contactperson = new CompanyContactPerson();
        $this->workstation = new Workstation();
    }


    public function dashboard(){
        return view('operators.dashboard');
    }

    public function licenceCertificates(){
        return view('operators.licence-certificate');
    }

    public function getCompanyProfile(){
        return view('operators.profile',[
            'states'=>$this->state->getAllStates()
        ]);
    }


    public function updateCompanyProfile(Request $request){
        $this->validate($request,[
            'company_name'=>'required',
            'rc_number'=>'required',
            'mobile_no'=>'required',
            'ceo_name'=>'required',
            'year_incorporation'=>'required',
            'company_type'=>'required',
            'state'=>'required',
            'local_gov'=>'required',
            'address'=>'required'
        ],[
            'company_name.required'=>'Enter your company name in the field provided',
            'rc_number.required'=>"Enter your company's RC number",
            'mobile_no.required'=>"Enter your company's official phone number",
            'ceo_name.required'=>"Who's is the CEO of the company?",
            'year_incorporation.required'=>"When was your company registered with CAC?",
            'company_type.required'=>"What's the category of your company?",
            'state.required'=>"In which state is the company located?",
            'local_gov.required'=>"Select local government area"
        ]);
        $logo = Auth::user()->logo;
        if(empty($logo)){
           $this->validate($request, [
               'logo'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
           ],[
               'logo.required'=>"Upload your company logo",
               'logo.mimes'=>"Invalid file format",
               'logo.max'=>"The file size is more than 2MB"
           ]);
        }
        $this->company->updateCompanyProfile($request);
        session()->flash("success", "Your company profile was updated successfully!");
        return back();
    }

    public function showNewLicenceApplicationForm(){
        return view('operators.new-application', [
            'licence_categories'=>$this->licencecategory->getLicenceCategories(),
            'work_stations'=>$this->workstation->getCompanyWorkStations(Auth::user()->id)
        ]);
    }

    public function previewLetter(Request $request){
        return view('operators.preview-letter',
            ['handler'=>$request]);
    }

    public function submitLetter(Request $request){
        $this->validate($request,[
            'compose_letter'=>'required',
            //'workstation'=>'required',
            //'licence_category'=>'required'
        ]);
        $this->letter->addLicenceApplication($request);
        session()->flash("success", "A licence is assigned within one month (four weeks) from the date of submission of the request under normal circumstances.");
        return back();


    }

    public function showNewEquipmentForm(){
        return view('operators.new-equipment');
    }

    public function showDirectors(){
        return view('operators.directors',
            [
                'directors'=>$this->director->getCompanyDirectors(Auth::user()->id),
                'countries'=>$this->country->getCountries()
            ]);
    }

    public function addDirector(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile_no'=>'required',
            'address'=>'required',
            'nationality'=>'required',
            'director_status'=>'required'
        ],[
            'full_name.required'=>"Enter director's full name",
            'email.required'=>"Enter email address",
            'email.email'=>"Enter a valid email address",
            'mobile_no.required'=>"Enter director's mobile number",
            'address.required'=>"Enter address",
            'nationality.required'=>'Select country from the list provided',
            'director_status.required'=>'Select status'
        ]);
        $director = $this->director->addCompanyDirector($request);
        $message = Auth::user()->first_name." added a new director(".$director->full_name.")";
        $subject = "New Director ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return back();
    }
    public function updateDirector(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile_no'=>'required',
            'address'=>'required',
            'nationality'=>'required',
            'director'=>'required',
            'director_status'=>'required'
        ],[
            'full_name.required'=>"Enter director's full name",
            'email.required'=>"Enter email address",
            'email.email'=>"Enter a valid email address",
            'mobile_no.required'=>"Enter director's mobile number",
            'address.required'=>"Enter address",
            'nationality.required'=>'Select country from the list provided',
            'director_status.required'=>'Select status'
        ]);
        $director = $this->director->updateCompanyDirector($request);
        $message = Auth::user()->first_name." updated director(".$director->full_name.") record";
        $subject = "Director record edited ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return back();
    }

    public function showContactPersons(){
        return view('operators.contact-persons',
            [
                'persons'=>$this->contactperson->getCompanyContactPersons(Auth::user()->id),
            ]);
    }

    public function addContactPersons(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile_no'=>'required',
            'address'=>'required',
            'person_status'=>'required'
        ],[
            'full_name.required'=>"Enter full name",
            'email.required'=>"Enter email address",
            'email.email'=>"Enter a valid email address",
            'mobile_no.required'=>"Enter mobile number",
            'address.required'=>"Enter address",
            'person_status.required'=>'Select status'
        ]);
        $person = $this->contactperson->addCompanyContactPerson($request);
        $message = Auth::user()->first_name." added a new contact person(".$person->full_name.")";
        $subject = "New Contact Person ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return back();
    }
    public function updateContactPersons(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile_no'=>'required',
            'address'=>'required',
            'person'=>'required',
            'person_status'=>'required'
        ],[
            'full_name.required'=>"Enter full name",
            'email.required'=>"Enter email address",
            'email.email'=>"Enter a valid email address",
            'mobile_no.required'=>"Enter mobile number",
            'address.required'=>"Enter address",
            'person_status.required'=>'Select status'
        ]);
        $person = $this->contactperson->updateCompanyContactPerson($request);
        $message = Auth::user()->first_name." updated contact person(".$person->full_name.") record";
        $subject = "Contact person record edited ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return back();
    }

    public function showRadioWorkStation(){
        return view('operators.work-stations',[
            'work_stations'=>$this->workstation->getCompanyWorkStations(Auth::user()->id),
            'states'=>$this->state->getAllStates()
        ]);
    }

    public function addRadioWorkStation(Request $request){
        $this->validate($request,[
            'work_station_name'=>'required',
            'state'=>'required',
            'address'=>'required',
            'mobile_no'=>'required',
            'long'=>'required',
            'lat'=>'required',
            'status'=>'required',

            'station_class'=>'required',
            'schedule_of_operation'=>'required',
            'frequency_usage'=>'required',
            'transmitting_location'=>'required',
        ],[
            'work_station_name.required'=>'What do you call this work station?',
            'state.required'=>'Select the state in which the radio work station is located',
            'address.required'=>'Enter the address',
            'mobile_no.required'=>'Enter radio work station contact number',
            'capacity.required'=>"What's the capacity of this radio work station?",
            'long.required'=>'Enter radio work station longitude',
            'lat.required'=>'Enter radio work station latitude',
            'status.required'=>'Is this radio work station still active?',
            'station_class.required'=>"What's the class of this radio station?",
            'schedule_of_operation.required'=>"What's schedule of operation?",
            'frequency_usage.required'=>"What will this frequency be used for?",
        ]);
        $station = $this->workstation->addWorkStation($request);
        $message = Auth::user()->first_name." added a new radio work station(".$station->work_station_name.") record";
        $subject = "New radio work station ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return back();
    }

    public function updateRadioWorkStation(Request $request){
        $this->validate($request,[
            'work_station_name'=>'required',
            'state'=>'required',
            'address'=>'required',
            'mobile_no'=>'required',
            'station'=>'required',
            'long'=>'required',
            'lat'=>'required',
            'status'=>'required'
        ],[
            'work_station_name.required'=>'What do you call this work station?',
            'state.required'=>'Select the state in which the radio work station is located',
            'address.required'=>'Enter the address',
            'mobile_no.required'=>'Enter radio work station contact number',
            'capacity.required'=>"What's the capacity of this radio work station?",
            'long.required'=>'Enter radio work station longitude',
            'lat.required'=>'Enter radio work station latitude',
            'status.required'=>'Is this radio work station still active?'
        ]);
        $station = $this->workstation->updateWorkStation($request);
        $message = Auth::user()->first_name." updated radio work station(".$station->work_station_name.") record";
        $subject = "Updated radio work station ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your action was carried out successfully.");
        return redirect()->route('radio-work-station');
    }

    public function viewRadioWorkStation($slug){
        $station = $this->workstation->getCompanyWorkStationBySlug($slug);
        if(!empty($station)){
            return view('operators.work-station-details',
                [
                    'station'=>$station,
                    'states'=>$this->state->getAllStates()
                ]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }
    }
}
