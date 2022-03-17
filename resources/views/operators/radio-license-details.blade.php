@extends('layouts.operator-layout')
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
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
            color: #ffffff;
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
                                                                                <label for="" class="badge badge-secondary float-right">Acknowledged</label>
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
                                        <div class="row" id="change-password">
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="card  flex-lg-column flex-md-row ">
                                                    <div class="card-body  border-left">
                                                        <h4>Timeline</h4>
                                                        <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1 height370">
                                                            <ul class="timeline">
                                                                @php
                                                                    $color = 'primary';
                                                                @endphp

                                                                @foreach($application->getWorkflowRequest as $request)
                                                                    <li>
                                                                        <div class="timeline-badge {{$request->status == 0 ? 'primary': ($request->status == 1 ? 'success' : 'danger') }}"></div>
                                                                        <a class="timeline-panel text-muted" href="#">
                                                                            <span>{{date('d M, Y h:ia', strtotime($request->created_at))}}</span>
                                                                            <h6 class="mb-0">{{$request->getSection->department_name ?? ''}}
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

                        <div class="tab-pane fade" id="log" role="tabpanel">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-xl-12 col-xxl-12 col-lg-12">
                                        <div class="card profile-card">
                                            <div class="card-body">
                                                <h4 class="text-uppercase">History</h4>
                                                <div class="table-responsive">
                                                    <table id="example3" class="display table-responsive-lg">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>License No.</th>
                                                            <th>Start Date</th>
                                                            <th>Expires On</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php $serial = 1; @endphp

                                                        </tbody>
                                                    </table>
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
    </div>


@endsection

@section('extra-scripts')
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>

@endsection

