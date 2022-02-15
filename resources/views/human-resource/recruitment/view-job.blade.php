@extends('layouts.master-layout')
@section('title')
    Job Details
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Job Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <div class="dropdown ml-auto float-right">
                            <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(40px, 40px, 0px);">
                                <li class="dropdown-item">
                                    <a href="{{route('edit-job', $job->slug)}}"><i class="ti-pencil text-primary mr-2"></i> Edit Job</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href=""><i class="ti-alarm-clock text-primary mr-2"></i> Status</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="mb-2 text-black">{{$job->job_title ?? '' }}</h3>
                        <ul class="mb-4 post-meta">
                            <li class="post-author"><span class="text-primary">Posted By:</span> {{$job->getPostedBy->first_name ?? '' }} {{$job->getPostedBy->last_name ?? '' }}</li>
                            <li class="post-date"><span class="text-info">Date Posted:</span> {{date('d M, Y', strtotime($job->created_at))}}</li>
                            <li class="post-comment"><span class="text-danger">Deadline:</span> {{date('d M, Y', strtotime($job->deadline))}}</li>
                        </ul>
                        <img src="public/images/profile/8.jpg" alt="" class="img-fluid mb-3">
                        {!! $job->job_details !!}
                        <hr>
                        <div class="bootstrap-badge">
                            <span><strong>Department</strong>: <a href="javascript:void()" class="badge badge-rounded badge-primary">{{$job->getDepartment->department_name ?? '' }}</a></span>
                            <span><strong>Job Role</strong>: <a href="javascript:void()" class="badge badge-rounded badge-success">{{$job->getJobRole->role_name ?? '' }}</a></span>
                            <span><strong>Location</strong>: <a href="javascript:void()" class="badge badge-rounded badge-danger">{{$job->getState->state_name ?? '' }}</a></span>
                            <span><strong>Job Type</strong>: <a href="javascript:void()" class="badge badge-rounded text-white badge-secondary">{{$job->getJobType->status ?? '' }}</a></span>
                            <span><strong>Salary</strong>: <a href="javascript:void()" class="badge badge-rounded badge-warning text-white">₦{{number_format($job->salary,2) ?? 0 }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection

