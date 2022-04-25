@extends('layouts.master-layout')
@section('title')
    Add New Employee
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Add New Employee
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Employee</h4>
                    <div class="btn-group">
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Personal Information</h4>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            {!! session()->get('success') !!}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    <form action="{{route('add-new-employee')}}" autocomplete="off" method="post" class="new-employee-form form-valide">
                        @csrf
                        <div class="form-section row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Title</label>
                                    <input type="text" id="" name="title" value="{{old('title')}}" placeholder="Title"  class="form-control">
                                    @error('title') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="" name="first_name" value="{{old('first_name')}}" placeholder="First Name"  class="form-control">
                                    @error('first_name') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Surname</label>
                                    <input type="text" name="surname" value="{{old('surname')}}" placeholder="Surname"   class="form-control">
                                    @error('surname') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Other Names</label>
                                    <input type="text" name="other_names" value="{{old('other_names')}}" placeholder="Other Names"   class="form-control">
                                    @error('other_names') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email Address"   class="form-control">
                                    @error('email') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile No.</label>
                                    <input type="text" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No."   class="form-control">
                                    @error('mobile_no') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select name="department" id="department" class="form-control js-example-theme-single">
                                        <option selected disabled>--Select department--</option>
                                        @foreach($departments as $depart)
                                            <option value="{{$depart->id}}">{{$depart->department_name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('department') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Position</label>
                                    <select name="job_role" id="position" class="form-control js-example-theme-single">
                                        <option selected disabled>--Select position--</option>
                                        @foreach($job_roles as $job_role)
                                            <option value="{{$job_role->id}}">{{$job_role->role_name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('job_role') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" id="address" style="resize: none;" placeholder="Address" class="form-control">{{old('address')}}</textarea>
                                    @error('address') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control ">
                                        <option selected disabled>--Select gender--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    @error('gender') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">State of Origin</label>
                                    <select name="state" id="state" class="form-control js-example-theme-single">
                                        <option selected disabled>--Select state--</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Local Government</label>
                                    <div id="local-wrapper"></div>
                                    @error('local') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Marital Status</label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option selected disabled>--Select marital status--</option>
                                        @foreach($marital_statuses as $m_status)
                                            <option value="{{$m_status->id}}">{{$m_status->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('marital_status') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary ">Submit</button>
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
    <script type="text/javascript">
        $(function () {
            $('#state').on('change', function(e){
                e.preventDefault();
                axios.post('/load-local-governments', {state:$(this).val()})
                .then(response=>{
                    $('#local-wrapper').html(response.data);
                    $('#local').select2();
                });
            });
           /* $('#department').on('change', function(e){
                e.preventDefault();
                axios.post('/load-job-roles', {department:$(this).val()})
                    .then(response=>{
                        $('#job-role-wrapper').html(response.data);
                        $('#job-role').select2();
                    });
            });*/
        });
    </script>
@endsection

