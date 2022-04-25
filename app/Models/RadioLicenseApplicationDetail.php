<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RadioLicenseApplicationDetail extends Model
{
    use HasFactory;


    public function getWorkstation(){
        return $this->belongsTo(Workstation::class, 'workstation_id');
    }


    public function getLicenseCategory(){
        return $this->belongsTo(LicenceCategory::class, 'lc_id');
    }

    public function setRadioLicenseApplicationDetails(Request  $request, $appId){
        for($i = 0; $i < count($request->workstation); $i++){
            $details = new RadioLicenseApplicationDetail();
            $details->workstation_id = $request->workstation[$i];
            $details->lc_id = $request->licence_category[$i];
            $details->type_of_device = $request->type_of_device[$i];
            $details->no_of_devices = $request->no_of_devices[$i];
            $details->radio_la_id = $appId;
            $details->save();
        }

    }
    public function getDetailsByRadioLicenseAppId($id){
        return RadioLicenseApplicationDetail::where('radio_la_id', $id)->get();
    }
    public function getSingleDetailByRadioLicenseAppId($id){
        return RadioLicenseApplicationDetail::where('radio_la_id', $id)->first();
    }
    public function getSingleDetailByRadioLicenseAppIdDeviceType($id, $type){
        return RadioLicenseApplicationDetail::where('radio_la_id', $id)->where('type_of_device',$type)->first();
    }

    public function sumNumberOfDevicesByParam($appId, $type_of_device){
        return RadioLicenseApplicationDetail::where('radio_la_id', $appId)
            ->where('type_of_device', $type_of_device)->sum('no_of_devices');
    }

}
