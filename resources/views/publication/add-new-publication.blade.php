@extends('layouts.master-layout')
@section('title')
    Post A Publication
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Post A Publication
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Post A Publication</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            {!! session()->get('success') !!}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    <form action="{{route('post-job')}}" method="post" autocomplete="off" class="post-job">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <input type="text" name="job_title" placeholder="Job title" value="{{old('job_title')}}" class="form-control">
                                    @error('job_title') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Job Type</label>
                                    <select name="job_type" id="" class="form-control js-example-theme-single">
                                        <option disabled selected>--Select job type--</option>

                                    </select>
                                    @error('job_type') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">State/Location</label>
                                    <select name="location" id="" class="form-control js-example-theme-single">
                                        <option disabled selected>--Select state--</option>

                                    </select>
                                    @error('location') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select name="department" id="department" class="form-control js-example-theme-single">
                                        <option disabled selected>--Select department--</option>

                                    </select>
                                    @error('department') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Job Role</label>
                                    <div id="job-role-wrapper"></div>
                                    @error('job_role') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <input type="date" name="deadline" class="form-control">
                                    @error('deadline') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Salary</label>
                                    <input type="number" step="0.01" placeholder="Expected salary (optional)" name="salary" class="form-control">
                                    @error('salary') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Job Details</label>
                                    <textarea name="job_details" placeholder="Type job details like responsibility, skills, experience, etc here..." class="content">{{old('job_details')}}</textarea>
                                    @error('job_details') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center col-md-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/jquery.validate-init.js" type="text/javascript"></script>
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script src="/js/axios.min.js"></script>
    <script type="text/javascript" src="/js/bower_components/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/bower_components/tinymce.js"></script>
    <script>
        $(document).ready(function(){

            $('#department').on('change', function(e){
                e.preventDefault();
                axios.post('/load-job-roles', {department:$(this).val()})
                    .then(response=>{
                        $('#job-role-wrapper').html(response.data);
                        $('#job-role').select2();
                    });
            });
        });
    </script>
@endsection

