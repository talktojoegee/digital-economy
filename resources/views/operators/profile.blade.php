@extends('layouts.operator-layout')
@section('title')
    Company Profile
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .input-changes{
            height:20px !important; padding-left:5px !important; padding-bottom:20px !important;
        }
    </style>
@endsection
@section('active-page')
    Company Profile
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home8">
                                <span>
                                    <i class="ti-desktop mr-2"></i>
                                </span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#message9">
                                <span>
                                    <i class="ti-briefcase mr-2"></i>
                                </span>
                                Documentation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages8">
                                <span>
                                    <i class="ti-settings mr-2"></i>
                                </span>
                                Settings
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane fade show active" id="home8" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-9 col-xxl-8 col-lg-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card profile-card">
                                                    <div class="card-header flex-wrap border-0 pb-0">
                                                        <h3 class="fs-24 text-black font-w600 mr-auto mb-2 pr-3">{{Auth::user()->company_name ?? '' }}</h3>
                                                        <a href="#change-password" class="btn btn-info btn-rounded mr-3 mb-2">Change Password</a>

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
                                                        @if(session()->has('error'))
                                                            <div class="alert alert-warning alert-dismissible fade show">
                                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                                {!! session()->get('error') !!}
                                                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                        <form action="">
                                                            <div class="mb-5">
                                                                <div class="title mb-4"><span class="fs-18 text-black font-w600">Company Information</span></div>
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Company Name</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->company_name ?? ''}}" class="input-changes form-control" placeholder="Company Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>CEO Name</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->ceo_name ?? '' }}" class="input-changes form-control" placeholder="CEO name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Mobile No.</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->mobile_no ?? ''}}" class="input-changes form-control" placeholder="Mobile No.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->email ?? '' }}" class="input-changes form-control" placeholder="Enter name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Mobile No.</label>
                                                                            <input type="text" disabled value="{{Auth::user()->mobile_no ?? '' }}" class="input-changes form-control" placeholder="Enter name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>RC Number</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->rc_number ?? '' }}" class="input-changes form-control" placeholder="RC Number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Year of Incorporation</label>
                                                                            <input  type="text" disabled value="{{ date('d M, Y', strtotime(Auth::user()->incorporation_year)) ?? '' }}" class="input-changes form-control" placeholder="Year of Incorporation">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Company Type</label>
                                                                            <input  type="text" disabled value="" class="form-control input-changes" placeholder="Company Type">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->getState->state_name ?? ''}}" class="input-changes form-control" placeholder="State">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>LGA</label>
                                                                            <input  type="text" disabled value="{{Auth::user()->getLocalGovernment->local_name ?? '' }}" class="input-changes form-control" placeholder="LGA">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <textarea name="address" disabled
                                                                                      class="form-control input-changes" style="resize: none;">{{Auth::user()->office_address ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-xxl-4 col-lg-12">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="card  flex-lg-column flex-md-row ">
                                                    <div class="card-body card-body  text-center border-bottom profile-bx">
                                                        <div class="profile-image mb-4">
                                                            <img  src="/assets/drive/logos/{{Auth::user()->logo ?? 'logo.png'}}" class="rounded-circle" alt="" id="avatar-preview">
                                                        </div>
                                                        <h4 class="fs-22 text-black mb-1">{{Auth::user()->company_name ?? '' }} </h4>
                                                    </div>
                                                    <div class="card-body  border-left">
                                                        <div class="d-flex mb-3 align-items-center">
                                                            <a class="contact-icon mr-3" href="tel:{{Auth::user()->mobile_no ?? '' }}">
                                                                <i class="fa fa-phone" aria-hidden="true"></i></a>
                                                            <span class="text-black">{{Auth::user()->mobile_no ?? '' }}</span>
                                                        </div>
                                                        <div class="d-flex mb-3 align-items-center">
                                                            <a class="contact-icon mr-3" href="mailto:{{Auth::user()->email ?? '' }}"><i class="las la-envelope"></i></a>
                                                            <span class="text-black">{{Auth::user()->email ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="change-password">
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="card  flex-lg-column flex-md-row ">
                                                    <div class="card-body  border-left">
                                                        <h4>Change Password</h4>
                                                        <form action="{{route('change-password')}}" method="post" autocomplete="off">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Current Password</label>
                                                                <input type="password" name="current_password" placeholder="Current Password" class="form-control">
                                                                @error('current_password') <i class="text-danger mt-2">{{$message}}</i> @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">New Password</label>
                                                                <input type="password" name="password" placeholder="New Password" class="form-control">
                                                                @error('password') <i class="text-danger mt-2">{{$message}}</i> @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Re-type Password</label>
                                                                <input type="password" name="password_confirmation" placeholder="Re-type Password" class="form-control">
                                                            </div>
                                                            <div class="form-group d-flex justify-content-center">
                                                                <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile8" role="tabpanel">
                            <div class="pt-4">
                                <h4>This is icon title</h4>
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                </p>
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="messages8" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                                        <div class="card profile-card">
                                            <div class="card-body">
                                                <h4>Company Information</h4>
                                                <p> <strong class="text-danger">Note:</strong> You can only edit the fields ticked with ( <i class="ti-check text-success"></i> )</p>
                                                <form action="{{route('update-company-profile')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Company Name</label>
                                                                <input type="text" name="company_name" value="{{old('company_name', Auth::user()->company_name) }}"  placeholder="Company Name" class="input-changes form-control">
                                                                @error('company_name')
                                                                    <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">RC Number</label>
                                                                <input type="text" value="{{ old('rc_number', Auth::user()->rc_number ) }}" placeholder="RC Number" name="rc_number" class="input-changes form-control">
                                                                @error('rc_number')
                                                                <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">CEO Name</label>
                                                                <input type="text" value="{{old('ceo_name', Auth::user()->ceo_name) }}" placeholder="CEO Name" name="ceo_name" class="input-changes form-control">
                                                                @error('ceo_name')
                                                                <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="text" value="{{ old('email', Auth::user()->email)  }}" readonly class="input-changes form-control">
                                                                @error('email')
                                                                <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Mobile No. <sup><i class="ti-check text-success"></i></sup> </label>
                                                                <input type="text" placeholder="Mobile No." value=" {{old('mobile_no',Auth::user()->mobile_no) }}" name="mobile_no" class="input-changes form-control">
                                                                @error('mobile_no')
                                                                <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Year of Incorporation</label>
                                                                <input type="date" name="year_incorporation" placeholder="Year of Incorporation" class="input-changes form-control">
                                                                @error('year_incorporation')
                                                                <i class="text-danger m-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Type of Company</label>
                                                                <select name="company_type" id="company_type" class="form-control">
                                                                    <option disabled selected>-- Select type of company --</option>

                                                                </select>
                                                                @error('company_type')
                                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Upload Logo</label>
                                                                <input type="file" name="logo" class="form-control-file">
                                                                @error('logo')
                                                                <i class="text-danger">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">State</label>
                                                                <select name="state" id="state" class="form-control js-example-theme-single">
                                                                    @foreach($states as $state)
                                                                        <option value="{{ $state->id}}" {{Auth::user()->state == $state->id ? 'selected' : '' }}>{{$state->state_name ?? '' }} </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('state') <i class="text-danger">{{$message}}</i> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Local Government</label>
                                                                <div id="local-wrapper"></div>
                                                                @error('local') <i class="text-danger">{{$message}}</i> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Address <sup><i class="ti-check text-success"></i></sup> </label>
                                                                <textarea placeholder="Address..." name="address" style="resize:none;"
                                                                          class="form-control">{{old('address', Auth::user()->office_address)}}</textarea>
                                                                @error('address') <i class="text-danger">{{$message}}</i> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group d-flex justify-content-center">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-secondary btn-sm text-white" data-dismiss="modal" type="button">Cancel</button>
                                                                    <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="message9" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                                        <div class="card profile-card">
                                            <div class="card-body">
                                                <h4>Upload Documents</h4>
                                                <p>Upload the various documents required to process and obtain your licence</p>
                                                <form action="">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">CAC Certificate <sup class="text-danger">*</sup></label>
                                                                <input type="file" name="cac" class="form-control-file">
                                                                @error('cac')
                                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Current Tax Clearance Certificate <sup class="text-danger">*</sup></label>
                                                                <input type="file" name="tax" class="form-control-file">
                                                                @error('tax')
                                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extra-scripts')
    <script src="/js/parsley.min.js"></script>
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

        });
    </script>
@endsection

