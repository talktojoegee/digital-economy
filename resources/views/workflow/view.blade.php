@extends('layouts.master-layout')
@section('title')
    Radio License Application Details
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
    Radio License Application Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-group">
                                <a href="{{route('message-customer', $application->getCompany->slug)}}" class="btn btn-primary mr-1 btn-sm">Message Customer</a>
                                <a href="" class="btn btn-warning mr-1 text-white btn-sm">Issue Invoice</a>
                                <a href="" class="btn btn-success mr-1 btn-sm">Assign Frequency</a>
                                <a href="" class="btn btn-light mr-1 btn-sm">Ministerial Memo</a>
                            </div>
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#application">
                                <span>
                                    <i class="ti-briefcase mr-2"></i>
                                </span>
                                Application
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#log">
                                <span>
                                    <i class="ti-briefcase mr-2"></i>
                                </span>
                                Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home8">
                                <span>
                                    <i class="ti-desktop mr-2"></i>
                                </span>
                                Company Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#directors">
                                <span>
                                    <i class="ti-user mr-2"></i>
                                </span>
                                Directors
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane fade active show" id="application" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-9 col-xxl-8 col-lg-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card profile-card">
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
                                                                <div class="title mb-4"><span class="fs-18 text-black font-w600">Details</span></div>
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            @switch($application->status)
                                                                                @case(0)
                                                                                <label for="" class="badge badge-light float-right">Received</label>
                                                                                @break
                                                                                @case(1)
                                                                                <label for="" class="badge text-white badge-secondary float-right">Acknowledged</label>
                                                                                @break
                                                                                @case(2)
                                                                                <label for="" class="badge badge-primary float-right">Processing...</label>
                                                                                @break
                                                                                @case(3)
                                                                                <label for="" class="badge badge-danger float-right">Discarded</label>
                                                                                @break
                                                                                @case(4)
                                                                                <label for="" class="badge badge-success float-right">Closed</label>
                                                                                @break
                                                                            @endswitch
                                                                            <h4 class="text-uppercase">Purpose</h4>
                                                                            {!! $application->purpose !!}
                                                                        </div>
                                                                        <h4 class="text-uppercase">Radio Station, License Category, Device,...</h4>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped">
                                                                                <thead>
                                                                                <th>#</th>
                                                                                <th>Radio Station</th>
                                                                                <th> Category</th>
                                                                                <th>Device</th>
                                                                                <th># of Devices</th>
                                                                                </thead>
                                                                                @php $serial = 1; @endphp
                                                                                @foreach($application->getRadioLicenseDetails as $detail)
                                                                                    <tr>
                                                                                        <td>{{$serial++}}</td>
                                                                                        <td>{{$detail->getWorkstation->work_station_name  ?? ''}}</td>
                                                                                        <td>{{$detail->getLicenseCategory->category_name ?? '' }}</td>
                                                                                        <td>
                                                                                            @switch($detail->type_of_device)
                                                                                                @case(1)
                                                                                                Handheld
                                                                                                @break
                                                                                                @case(2)
                                                                                                Base Station
                                                                                                @break
                                                                                                @case(3)
                                                                                                Repeaters Station
                                                                                                @break
                                                                                                @case(4)
                                                                                                Vehicular Station
                                                                                                @break
                                                                                            @endswitch
                                                                                        </td>
                                                                                        <td>{{number_format($detail->no_of_devices ?? 0)}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </table>
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
                                        @if($form)
                                        <div class="row" id="process">
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="card  flex-lg-column flex-md-row ">
                                                    <div class="card-body  border-left">
                                                        <h4 class="text-uppercase">Process Application</h4>
                                                        <form action="{{route('process-radio-license-application')}}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="">Leave Comment</label>
                                                                    <textarea name="comment" id="comment" rows="8" placeholder="Leave Comment" style="resize: none;"
                                                                              class="form-control">{{old('comment')}}</textarea>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="">Action Type</label>
                                                                    <select name="action_type" id="action_type"
                                                                            class="form-control js-example-theme-single">
                                                                        <option disabled selected>--Select action type--</option>
                                                                        <option value="1">Forward</option>
                                                                        <option value="2">Mark As Final</option>
                                                                    </select>
                                                                    @error('action_type')
                                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="">Status</label>
                                                                    <select name="status" id="status"
                                                                            class="form-control js-example-theme-single">
                                                                        <option disabled selected>--Select status--</option>
                                                                        <option value="1">Approve</option>
                                                                        <option value="2">Decline</option>
                                                                    </select>
                                                                    @error('status')
                                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="">Section/Unit</label>
                                                                    <select name="section" id="section"
                                                                            class="form-control js-example-theme-single">
                                                                        <option disabled selected>--Select Section--</option>
                                                                        @foreach($sections as $section)
                                                                        <option value="{{$section->id}}">{{$section->department_name ?? ''}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('section')
                                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                                    @enderror
                                                                    <input type="hidden" name="appId" value="{{$application->id}}">
                                                                    <input type="hidden" name="processId" value="{{$processId}}">
                                                                </div>
                                                                <div class="col-md-12 mt-3 d-flex justify-content-center">
                                                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row" id="timeline">
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="card  flex-lg-column flex-md-row ">
                                                    <div class="card-body  border-left">
                                                        <h4 class="text-uppercase">Timeline</h4>
                                                        <div id="DZ_W_TimeLine12" class="widget-timeline dz-scroll style-1 height370">
                                                            <ul class="timeline">
                                                                @foreach($application->getWorkflowRequest as $request)
                                                                    <li>
                                                                        <div class="timeline-badge {{$request->status == 0 ? 'primary': ($request->status == 1 ? 'success' : 'danger') }}"></div>
                                                                        <a class="timeline-panel text-muted" href="#">
                                                                            <span>{{date('d M, Y h:ia', strtotime($request->created_at))}}</span>
                                                                            <h6 class="mb-0">
                                                                                {{$request->getOfficer->first_name ?? ''}} {{$request->getOfficer->last_name ?? ''}}
                                                                                ({{$request->getSection->department_name ?? ''}})
                                                                                @switch($request->status)
                                                                                    @case(0)
                                                                                    <small class="text-primary">Received</small>
                                                                                    @break
                                                                                    @case(1)
                                                                                    <small class="text-success">Approved</small>
                                                                                    @break
                                                                                    @case(2)
                                                                                    <small class="text-danger">Declined</small>
                                                                                    @break
                                                                                @endswitch
                                                                            </h6>
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="directors" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                                        <div class="card profile-card">
                                            <div class="card-body">
                                                <h4>directors</h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="home8" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-9 col-xxl-8 col-lg-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card profile-card">
                                                    <div class="card-header flex-wrap border-0 pb-0">
                                                        <h3 class="fs-24 text-black font-w600 mr-auto mb-2 pr-3">{{$application->getCompany->company_name ?? '' }}</h3>

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
                                                                            <input  type="text" disabled value="{{$application->getCompany->company_name ?? ''}}" class="input-changes form-control" placeholder="Company Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>CEO Name</label>
                                                                            <input  type="text" disabled value="{{$application->getCompany->ceo_name ?? '' }}" class="input-changes form-control" placeholder="CEO name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Mobile No.</label>
                                                                            <input  type="text" disabled value="{{$application->getCompany->mobile_no ?? ''}}" class="input-changes form-control" placeholder="Mobile No.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input  type="text" disabled value="{{$application->getCompany->email ?? '' }}" class="input-changes form-control" placeholder="Enter name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Mobile No.</label>
                                                                            <input type="text" disabled value="{{$application->getCompany->mobile_no ?? '' }}" class="input-changes form-control" placeholder="Enter name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>RC Number</label>
                                                                            <input  type="text" disabled value="{{$application->getCompany->rc_number ?? '' }}" class="input-changes form-control" placeholder="RC Number">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Year of Incorporation</label>
                                                                            <input  type="text" disabled value="{{ date('d M, Y', strtotime($application->getCompany->incorporation_year)) ?? '' }}" class="input-changes form-control" placeholder="Year of Incorporation">
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
                                                                            <input  type="text" disabled value="{{$application->getCompany->getState->state_name ?? ''}}" class="input-changes form-control" placeholder="State">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>LGA</label>
                                                                            <input  type="text" disabled value="{{$application->getCompany->getLocalGovernment->local_name ?? '' }}" class="input-changes form-control" placeholder="LGA">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <textarea name="address" disabled
                                                                                      class="form-control input-changes" style="resize: none;">{{$application->getCompany->office_address ?? '' }}</textarea>
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
                                                            <img  src="/assets/drive/logos/{{$application->getCompany->logo ?? 'logo.png'}}" class="rounded-circle" alt="" id="avatar-preview">
                                                        </div>
                                                        <h4 class="fs-22 text-black mb-1">{{$application->getCompany->company_name ?? '' }} </h4>
                                                    </div>
                                                    <div class="card-body  border-left">
                                                        <div class="d-flex mb-3 align-items-center">
                                                            <a class="contact-icon mr-3" href="tel:{{$application->getCompany->mobile_no ?? '' }}">
                                                                <i class="fa fa-phone" aria-hidden="true"></i></a>
                                                            <span class="text-black">{{$application->getCompany->mobile_no ?? '' }}</span>
                                                        </div>
                                                        <div class="d-flex mb-3 align-items-center">
                                                            <a class="contact-icon mr-3" href="mailto:{{$application->getCompany->email ?? '' }}"><i class="las la-envelope"></i></a>
                                                            <span class="text-black">{{$application->getCompany->email ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="log" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                                        <div class="card profile-card">
                                            <div class="card-body">
                                                <h4>log</h4>

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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-uppercase">Workflow Log</h4>
                    <div class="table-responsive">
                        <table class="table header-border table-responsive-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($workflow_processes as $flow)
                            <tr>
                                <td>{{$serial++}}
                                </td>
                                <td>{{$flow->getOfficer->first_name ?? '' }} {{$flow->getOfficer->last_name ?? ''}}</td>
                                <td><span class="text-muted">{{$flow->getSection->department_name ?? ''}}</span>
                                </td>
                                <td>
                                    @switch($flow->status)
                                        @case(0)
                                        <small class="text-primary">Received</small>
                                        @break
                                        @case(1)
                                        <small class="text-success">Approved</small>
                                        @break
                                        @case(2)
                                        <small class="text-danger">Declined</small>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    {{date('d M, Y h:ia', strtotime($flow->created_at))}}
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-target="#flow_{{$flow->id}}" class="btn btn-info btn-sm" data-toggle="modal"><i class="ti-eye mr-2"></i> View</a>
                                    <div class="modal fade" id="flow_{{$flow->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase">Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-stripped">
                                                        <tr>
                                                            <td><strong>User</strong></td>
                                                            <td>{{$flow->getOfficer->first_name ?? '' }} {{$flow->getOfficer->last_name ?? ''}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Section</strong></td>
                                                            <td>{{$flow->getSection->department_name ?? ''}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Date</strong></td>
                                                            <td>{{date('d M, Y h:ia', strtotime($flow->created_at))}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Status</strong></td>
                                                            <td>
                                                                @switch($flow->status)
                                                                    @case(0)
                                                                    <small class="text-primary">Received</small>
                                                                    @break
                                                                    @case(1)
                                                                    <small class="text-success">Approved</small>
                                                                    @break
                                                                    @case(2)
                                                                    <small class="text-danger">Declined</small>
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Comment</strong></td>
                                                            <td>{{$flow->comment ?? ''}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light btn-sm" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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

@endsection

