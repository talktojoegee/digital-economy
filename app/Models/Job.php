<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    public function getDepartment(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function getState(){
        return $this->belongsTo(State::class, 'location_id');
    }
    public function getJobRole(){
        return $this->belongsTo(JobRole::class, 'job_role_id');
    }

    public function getPostedBy(){
        return $this->belongsTo(User::class, 'posted_by');
    }
    public function getJobType(){
        return $this->belongsTo(EmploymentStatus::class, 'job_type_id');
    }





    /*
     * Use-case methods
     */
    public function setNewJob(Request $request){
        $job = new Job();
        $job->posted_by = Auth::user()->id;
        $job->job_title = $request->job_title;
        $job->job_details = $request->job_details;
        $job->job_type_id = $request->job_type;
        $job->location_id = $request->location;
        $job->department_id = $request->department;
        $job->job_role_id = $request->job_role;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary ?? 0;
        $job->slug = Str::slug($request->job_title).'-'.substr(sha1(time()),34,40);
        $job->save();
    }

    public function updateJob(Request $request){
        $job =  Job::find($request->job);
        $job->job_title = $request->job_title;
        $job->job_details = $request->job_details;
        $job->job_type_id = $request->job_type;
        $job->location_id = $request->location;
        $job->department_id = $request->department;
        $job->job_role_id = $request->job_role;
        $job->deadline = $request->deadline;
        $job->salary = $request->salary;
        $job->save();
    }

    public function getJobsByStatus($status){
        return Job::where('status', $status)->orderBy('id', 'DESC')->get();
    }
    public function getAllJobs(){
        return Job::orderBy('id', 'DESC')->get();
    }

    public function getJobsBySlug($slug){
        return Job::where('slug', $slug)->first();
    }

}
