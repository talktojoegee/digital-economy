<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyContactPerson extends Model
{
    use HasFactory;





    public function getCompanyContactPersons($company_id){
        return CompanyContactPerson::where('company_id', $company_id)->get();
    }

    public function addCompanyContactPerson(Request $request){

        $person = new CompanyContactPerson();
        $person->company_id = Auth::user()->id;
        $person->full_name = $request->full_name ?? '';
        $person->address = $request->address ?? '';
        $person->email = $request->email ?? '';
        $person->mobile_no = $request->mobile_no ?? '';
        $person->status = $request->person_status ?? 0;
        $person->save();
        return $person;
    }

    public function updateCompanyContactPerson(Request $request){

        $person =  CompanyContactPerson::find($request->person);
        $person->full_name = $request->full_name ?? '';
        $person->address = $request->address ?? '';
        $person->email = $request->email ?? '';
        $person->mobile_no = $request->mobile_no ?? '';
        $person->status = $request->person_status ?? 0;
        $person->save();
        return $person;
    }
}
