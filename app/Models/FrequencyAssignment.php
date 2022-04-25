<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FrequencyAssignment extends Model
{
    use HasFactory;

    public function getCompany(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getAssignedBy(){
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function getFrequencyRenewalLog(){
        return $this->hasMany(FrequencyAssignmentRenewal::class, 'fa_id')->orderBy('id', 'DESC');
    }

    public function addFrequency($companyId, $applicationId, $device, $frequency, $from, $batch_code){
        $current = new Carbon();
        $end_date = $current->addDays(365);

        $assignment = new FrequencyAssignment();
        $assignment->company_id = $companyId;
        $assignment->rla_id = $applicationId;
        $assignment->type_of_device = $device;
        $assignment->assigned_frequency = $frequency;
        $assignment->valid_from = $from;
        $assignment->valid_to = $end_date;
        $assignment->batch_code = $batch_code;
        $assignment->assigned_by = Auth::user()->id;
        $assignment->save();
        return $assignment;
    }

    public function getCompanyFrequenciesByCompanyId($companyId){
        return FrequencyAssignment::where('company_id', $companyId)->orderBy('id', 'DESC')->get();
    }

    public function getAllCompanyFrequencies(){
        return FrequencyAssignment::orderBy('id', 'DESC')->get();
    }

    public function getAllCompanyFrequencyCounter(){
        return FrequencyAssignment::count();
    }
    public function getAllCompanyFrequenciesByStatus($status){
        return FrequencyAssignment::where('status', $status)->orderBy('id', 'DESC')->get();
    }
    public function updateFrequenciesStatus($id, $status){
        $freq =  FrequencyAssignment::find($id);
        $freq->status = $status;
        $freq->save();
        return $freq;

    }

    public function getFrequencyById($id){
        return FrequencyAssignment::find($id);
    }

    public function getFrequencyByBatchCode($batch_code){
        return FrequencyAssignment::where('batch_code',$batch_code)->get();
    }

    public function updateFrequencyValidityPeriod($frequencyId){
        $current = Carbon::now();
        $annual = 365;
        $frequency = $this->getFrequencyById($frequencyId);
        #Start & end date parameters
        $daysLeft = strtotime($frequency->valid_to)  > strtotime(now())  ? $current->diffInDays($frequency->valid_to) : 0;
        $daysPass = strtotime($frequency->valid_to)  < strtotime(now())  ? $current->diffInDays($frequency->valid_to) : 0;
        $end_date =  strtotime($frequency->valid_to)  > strtotime(now())
            ? $current->parse($frequency->valid_to)->addDays( $daysLeft + $annual )
            : $current->addDays( $annual - $daysPass) ;
        $frequency->valid_to = $end_date;
        $frequency->valid_from = now();
        $frequency->status = 1;//active
        $frequency->save();
        return $frequency;
    }
}
