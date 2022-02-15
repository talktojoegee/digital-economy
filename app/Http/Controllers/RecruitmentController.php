<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmploymentStatus;
use App\Models\Job;
use App\Models\State;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->state = new State();
        $this->department = new Department();
        $this->employmenttype = new EmploymentStatus();
        $this->job = new Job();
    }

    public function index(){
        return view('human-resource.recruitment.all-jobs',[
            'jobs'=>$this->job->getAllJobs()
        ]);
    }

    public function showPostJobForm(){
        return view('human-resource.recruitment.post-job',[
            'states'=>$this->state->getAllStates(),
            'departments'=>$this->department->getAllDepartments(),
            'employmenttypes'=>$this->employmenttype->getAllEmploymentStatuses()
        ]);
    }

    public function postJob(Request $request){

        $this->validate($request,[
           'job_title'=>'required',
           'job_details'=>'required',
           'job_type'=>'required',
           'department'=>'required',
           'job_role'=>'required',
           'location'=>'required',
            'deadline'=>'required'
        ],[
            'job_title.required'=>'Enter job title for this post',
            'job_details.required'=>'Type job details like responsibility, skills, experience, etc here...',
            'department.required'=>'Select department for this job post',
            'job_role.required'=>'Select job role',
            'location.required'=>'Select job location',
            'deadline.required'=>'When is the closing date for application?',
            'job_type.required'=>'Select mode of employment'
        ]);
        $this->job->setNewJob($request);
       session()->flash("success", "<strong>Great! </strong> Your job was posted successfully.");
        return back();
    }

    public function viewJob($slug){
        $job = $this->job->getJobsBySlug($slug);
        if(!empty($job)){
            return view('human-resource.recruitment.view-job',['job'=>$job]);
        }else{
            session()->flash("error", "<strong>Whoops!</strong> No record found.");
            return back();
        }
    }
    public function showEditJobForm($slug){
        $job = $this->job->getJobsBySlug($slug);
        if(!empty($job)){
            return view('human-resource.recruitment.edit-job',[
                'job'=>$job,
                'states'=>$this->state->getAllStates(),
                'departments'=>$this->department->getAllDepartments(),
                'employmenttypes'=>$this->employmenttype->getAllEmploymentStatuses()
                ]);
        }else{
            session()->flash("error", "<strong>Whoops!</strong> No record found.");
            return back();
        }
    }

    public function updateJob(Request $request){
        $this->validate($request,[
            'job_title'=>'required',
            'job_details'=>'required',
            'job_type'=>'required',
            'department'=>'required',
            'job_role'=>'required',
            'location'=>'required',
            'deadline'=>'required',
            'job'=>'required'
        ],[
            'job_title.required'=>'Enter job title for this post',
            'job_details.required'=>'Type job details like responsibility, skills, experience, etc here...',
            'department.required'=>'Select department for this job post',
            'job_role.required'=>'Select job role',
            'location.required'=>'Select job location',
            'deadline.required'=>'When is the closing date for application?',
            'job_type.required'=>'Select mode of employment'
        ]);
        $this->job->updateJob($request);
        session()->flash("success", "<strong>Great! </strong> Your changes were saved successfully.");
        return back();
    }
}
