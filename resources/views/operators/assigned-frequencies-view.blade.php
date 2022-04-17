@extends('layouts.operator-layout')
@section('title')
    Frequency Details
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
    Frequency Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Frequency Details</h4>
                    <div class="btn-group">
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                    </div>
                </div>
                <div class="">
                    <div class="card-body">

                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane fade active show" id="application" role="tabpanel">
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-xl-12 col-xxl-12 col-lg-12">
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
                                                            <div class="mb-5">
                                                                <div class="title mb-4"><span class="fs-18 text-black font-w600">Details</span></div>
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-sm-12">
                                                                        <div class="profile-personal-info">
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Company Name
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-sm-9">
                                                                                    <span>{{$frequency->getCompany->company_name ?? '' }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Frequency
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-sm-9">
                                                                                    <span>{{$frequency->status == 1 ? $frequency->assigned_frequency : '****'}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Valid From.
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-9">
                                                                                    <span>{{ date('d M, Y', strtotime($frequency->valid_from))}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Expires
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-9">
                                                                                    <span class="text-danger">{{ date('d M, Y', strtotime($frequency->valid_to))}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Status
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-9">
                                                                                <span class="text-danger">

                                                                                    @switch($frequency->status)
                                                                                        @case(0)
                                                                                        <label for="" class="badge badge-warning text-white">Inactive</label>
                                                                                        @break
                                                                                        @case(1)
                                                                                        <label for="" class="badge text-white badge-success text-white">Active</label>
                                                                                        @break
                                                                                        @case(2)
                                                                                        <label for="" class="badge badge-warning text-muted">Expired</label>
                                                                                        @break
                                                                                        @case(3)
                                                                                        <label for="" class="badge badge-danger text-white">Withdrawn</label>
                                                                                        @break
                                                                                    @endswitch
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Type of Device
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-9">
                                                                                <span>
                                                                                    @switch($frequency->type_of_device)
                                                                                        @case(1)
                                                                                        Handheld
                                                                                        @break
                                                                                        @case(2)
                                                                                        Base
                                                                                        @break
                                                                                        @case(3)
                                                                                        Repeaters
                                                                                        @break
                                                                                        @case(1)
                                                                                        Vehicular
                                                                                        @break
                                                                                    @endswitch
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Assigned By
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-sm-9">
                                                                                    <span>{{$frequency->getAssignedBy->first_name ?? '' }} {{$frequency->getAssignedBy->surname ?? '' }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-4 mb-sm-2">
                                                                                <div class="col-sm-3">
                                                                                    <h5 class="f-w-500">Date Issued
                                                                                        <span class="pull-right d-none d-sm-block">:</span>
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-sm-9">
                                                                                    <span>{{ date('d M, Y', strtotime($frequency->created_at))}}</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Radio Licence Details</h4>
                </div>
                <div class="card-body">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-redo-alt mr-2"></i> Renewal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile1"><i class="la la-folder-open mr-2"></i> Log</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                <div class="pt-4 mt-3">
                                    <div class="table-responsive">
                                        <table class="table header-border table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Valid From</th>
                                                <th>Expires</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $serial = 1; @endphp

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1">
                                <div class="pt-4 mt-3">
                                    <div class="table-responsive">
                                        <table class="table header-border table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="width: 150px !important;">Logged By</th>
                                                <th>Subject</th>
                                                <th>Narration</th>
                                                <th style="width: 150px !important;">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $index = 1; @endphp
                                            @foreach($logs as $log)
                                                <tr>
                                                    <td>{{$index++}}</td>
                                                    <td>{{$log->getLoggedBy->first_name ?? '' }} {{$log->getLoggedBy->surname ?? '' }}</td>
                                                    <td>{{$log->subject ?? '' }}</td>
                                                    <td>{{$log->narration ?? '' }}</td>
                                                    <td>{{date('d M, Y', strtotime($log->created_at))}}</td>
                                                </tr>
                                            @endforeach
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


@endsection

@section('extra-scripts')
    <script src="/js/parsley.min.js"></script>
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
@endsection

