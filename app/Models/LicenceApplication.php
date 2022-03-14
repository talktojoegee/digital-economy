<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenceApplication extends Model
{
    use HasFactory;



    public function getWorkStation(){
        return $this->belongsTo(Workstation::class, 'company_id');
    }

    public function getLicenceCategory(){
        return $this->belongsTo(LicenceCategory::class, 'licence_category');
    }

    public function getWorkflowProcess(){
        return $this->hasMany(WorkflowProcess::class, 'post_id');
    }


    public function getLicenceApplicationBySlug($slug){
        return LicenceApplication::where('slug', $slug)->first();
    }


    public function addLicenceApplication(Request $request){

        $app = new LicenceApplication();
        $app->company_id = Auth::user()->id;
        $app->content = $request->compose_letter ?? '';
        $app->licence_category = 1; //$request->licence_category;
        $app->workstation = 1;//$request->workstation;
        $app->slug = substr(sha1(time()),11,40);
        $app->save();
        return $app;
    }

    public function getLicenceApplicationById($id){
        return LicenceApplication::find($id);
    }
    public function getLicenceApplicationByCompanyId($companyId){
        return LicenceApplication::where('company_id', $companyId)->orderBy('DESC')->get();
    }

    public function getLicenceApplicationByCompanySlug($slug){
        return LicenceApplication::where('slug', $slug)->first();
    }

   /* public function updateLicenceApplicationStatus($companyId){
        $app =  LicenceApplication::where('company_id', $companyId)->orderBy('DESC')->first();
        if($app){
            $app->status
        }
    }*/


}
