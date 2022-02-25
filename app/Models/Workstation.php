<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Workstation extends Model
{
    use HasFactory;

    public function getWorkStationState(){
        return $this->belongsTo(State::class, 'state_id');
    }


    public function getCompanyWorkStations($company_id){
        return Workstation::where('company_id', $company_id)->get();
    }

    public function getCompanyWorkStationBySlug($slug){
        return Workstation::where('slug', $slug)->first();
    }

    public function addWorkStation(Request $request){
        $station = new Workstation();
        $station->work_station_name = $request->work_station_name;
        $station->state_id = $request->state;
        $station->slug = Str::slug($request->work_station_name).'-'.substr(sha1(time()),32,40);
        $station->company_id = Auth::user()->id;
        $station->address = $request->address;
        $station->mobile_no = $request->mobile_no ?? '';
        //$station->capacity = $request->capacity ?? '';
        $station->long = $request->long;
        $station->lat = $request->lat;
        $station->status = $request->status;
        $station->save();
        return $station;
    }

     public function updateWorkStation(Request $request){
        $station =  Workstation::find($request->station);
        $station->work_station_name = $request->work_station_name;
        $station->state_id = $request->state;
         $station->slug = Str::slug($request->work_station_name).'-'.substr(sha1(time()),32,40);
        $station->address = $request->address;
        $station->mobile_no = $request->mobile_no ?? '';
        //$station->capacity = $request->capacity ?? '';
        $station->long = $request->long;
        $station->lat = $request->lat;
        $station->status = $request->status;
        $station->save();
        return $station;
    }


}
