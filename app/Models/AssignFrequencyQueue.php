<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignFrequencyQueue extends Model
{
    use HasFactory;


    public function getCompany(){
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function queueFrequency($company_id, $slug, $type){
        $freq = new AssignFrequencyQueue();
        $freq->company_id = $company_id;
        $freq->invoice_slug = $slug;
        $freq->queue_type = $type;
        $freq->save();
    }

    public function getAllQueuedFrequencyAssignments(){
        return AssignFrequencyQueue::orderBy('id', 'DESC')->get();
    }

    public function getQueuedFrequencyAssignmentBySlug($slug){
        return AssignFrequencyQueue::where('slug', $slug)->first();
    }
    public function updateQueuedFrequencyAssignmentBySlug($slug, $status){
        $update =  AssignFrequencyQueue::where('invoice_slug', $slug)->first();
        $update->status = $status;
        $update->save();
        return $update;
    }
}
