<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyDirector extends Model
{
    use HasFactory;

    public function getCountry(){
        return $this->belongsTo(Country::class, 'nationality');
    }



    public function getCompanyDirectors($company_id){
        return CompanyDirector::where('company_id', $company_id)->get();
    }

    public function addCompanyDirector(Request $request){
        //$date = strtotime($request->birth_date);

        $director = new CompanyDirector();
        $director->company_id = Auth::user()->id;
        $director->full_name = $request->full_name ?? '';
        $director->address = $request->address ?? '';
        $director->email = $request->email ?? '';
        $director->mobile_no = $request->mobile_no ?? '';
        //$director->birth_date = $request->birth_date ?? '';
        //$director->birth_month = date("m", $date);
        //$director->birth_year = date("Y", $date);
        $director->nationality = $request->nationality ?? '';
        $director->status = $request->director_status ?? 0;
        //$director->marital_status = $request->marital_status ?? '';
        $director->save();
        return $director;
    }

    public function updateCompanyDirector(Request $request){
        //$date = strtotime($request->birth_date);

        $director =  CompanyDirector::find($request->director);
        $director->full_name = $request->full_name ?? '';
        $director->address = $request->address ?? '';
        $director->email = $request->email ?? '';
        $director->mobile_no = $request->mobile_no ?? '';
        $director->status = $request->director_status ?? 0;
        //$director->birth_date = $request->birth_date ?? '';
        //$director->birth_month = date("m", $date);
        //$director->birth_year = date("Y", $date);
        $director->nationality = $request->nationality ?? '';
        //$director->marital_status = $request->marital_status ?? '';
        $director->save();
        return $director;
    }
}
