<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RadioLicenseApplication extends Model
{
    public function getCompany(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getRadioLicenseDetails(){
        return $this->hasMany(RadioLicenseApplicationDetail::class, 'radio_la_id');
    }

    public function getWorkflowRequest(){
        return $this->hasMany(WorkflowProcess::class, 'post_id')->orderBy('id', 'DESC');
    }



    use HasFactory;


    public function setRadioLicenseApplication(Request  $request){
        $app = new RadioLicenseApplication();
        $app->company_id = Auth::user()->id;
        $app->purpose = $request->purpose;
        $app->slug = Str::slug(substr(sha1(time()),11,40));
        $app->save();
        return $app;
    }

    public function getAllCompanyRadioLicenseApplications($company_id){
        return RadioLicenseApplication::where('company_id', $company_id)->orderBy('id', 'DESC')->get();
    }
    public function getRadioLicenseApplicationById($id){
        return RadioLicenseApplication::find( $id);
    }

    public function getRadioLicenseApplicationBySlug($slug){
        return RadioLicenseApplication::where('slug', $slug)->first();
    }

    public function updateRadioLicenseApplicationStatus($slug, $status){
        $app = RadioLicenseApplication::where('slug', $slug)->first();
        $app->status = $status;
        $app->actioned_by = Auth::user()->id;
        $app->date_actioned = now();
        $app->save();
    }

    public function getAllRadioLicenseApplications(){
        return RadioLicenseApplication::orderBy('id', 'DESC')->get();
    }

    public function updateRadioLicenceApplicationStatus($appId, $status){
        $app = RadioLicenseApplication::find($appId);
        $app->status = $status;
        $app->actioned_by = Auth::user()->id;
        $app->date_actioned = now();
        $app->save();
        return $app;
    }
}
