<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class Company extends Authenticatable
{
    use HasFactory;

    public function getUserNotifications(){
        return $this->hasMany(UserNotification::class, 'user_id')->orderBy('id', 'DESC');
    }
    public function getUnreadUserNotifications(){
        return $this->hasMany(UserNotification::class, 'user_id')->where('is_read', 0)->count();
    }
    public function getCompanyApplications(){
        return $this->hasMany(LicenceApplication::class, 'company_id')->orderBy('id', 'DESC');
    }

    public function getAssignedFrequencies(){
        return $this->hasMany(FrequencyAssignment::class, 'company_id')->orderBy('id', 'DESC');
    }

    public function getDirectors(){
        return $this->hasMany(CompanyDirector::class, 'company_id');
    }

    public function getCompanyContactPersons(){
        return $this->hasMany(CompanyContactPerson::class, 'company_id');
    }

    public function getLicenceCertificates(){
        return $this->hasMany(LicenceCertificate::class, 'company_id');
    }

    public function getLocalGovernment(){
        return $this->belongsTo(LocalGovernment::class, 'lga');
    }

    public function getState(){
        return $this->belongsTo(State::class, 'state');
    }



    public function basicSetup(Request $request){
        $company = new Company();
        $company->company_name = $request->company_name ?? '';
        $company->password = bcrypt($request->password);
        $company->email = $request->email ?? '';
        $company->slug = Str::slug($request->company_name).'-'.substr(sha1(time()),32,40);
        $company->save();
    }

    public function updateCompanyProfile(Request $request){
        $logo = Auth::user()->logo;
        $filename = null;
        if ($request->hasFile('logo')) {
            $extension = $request->logo->getClientOriginalExtension();
            $filename = '_' . uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;
            $dir = 'assets/drive/logos/';
            $request->logo->move(public_path($dir), $filename);
            //Delete old file
            if(\File::exists(public_path('assets/drive/logo/'.$filename))){
                \File::delete(public_path('assets/drive/logo/'.$filename));
            }
        }
        if(!empty($logo)){
           $logo = $filename;
        }else{
            $logo = $filename;
        }
        $com =  Company::find(Auth::user()->id);
        $com->company_name = $request->company_name ?? '';
        $com->mobile_no = $request->mobile_no ?? '';
        $com->rc_number = $request->rc_number ?? '';
        $com->ceo_name = $request->ceo_name ?? '';
        $com->incorporation_year = $request->year_incorporation ?? '';
        $com->company_type = 1; //$request->company_type ?? '';
        $com->state = $request->state ?? '';
        $com->lga = $request->local_gov ?? '';
        $com->office_address = $request->address ?? '';
        $com->logo = $logo;
        $com->save();
    }

    public function getCompanyBySlug($slug){
        return Company::where('slug', $slug)->first();
    }

    public function getCompanyById($id){
        return Company::find($id);
    }
    public function getCompanyByEmail($email){
        return Company::where('email', $email)->first();
    }

    public function getAllCompanies(){
        return Company::orderBy('company_name', 'ASC')->get();
    }

    public function getListOfCompaniesById($ids){
        return Company::whereIn('id', $ids)->get();
    }
}
