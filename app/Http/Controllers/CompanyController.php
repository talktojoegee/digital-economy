<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LicenceApplication;
use App\Models\LicenceCategory;
use App\Models\LocalGovernment;
use App\Models\State;
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
            'licence_categories'=>$this->licencecategory->getLicenceCategories()
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
}
