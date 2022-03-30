@extends('layouts.master-layout')
@section('title')
    Companies
@endsection
@section('extra-styles')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
            color: #ffffff;
        }
    </style>
@endsection
@section('active-page')
    Companies
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-black mb-0">Active Licenses</p>
                            <span class="fs-20 text-black font-w600 mb-3 d-block">456,000,000</span>
                            <div class="d-flex align-items-center">
                                <i class="ti-check-box mr-2 text-success" style="font-size: 24px; display: block" ></i>
                                <div>
                                    <span class="fs-12">A total of active licenses</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-black mb-0">Expired Licenses</p>
                            <span class="fs-20 text-black font-w600 mb-3 d-block">28</span>
                            <div class="d-flex align-items-center">
                                <i class="ti-close text-danger mr-2" style="font-size: 24px; display: block" ></i>
                                <div>
                                    <span class="fs-12">A total of expired licenses</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-black mb-0">Expiring Soon...</p>
                            <span class="fs-20 text-black font-w600 mb-5 d-block">651</span>
                            <div class="d-flex align-items-center">
                                <i class="ti-reload text-warning mr-2" style="font-size: 24px; display: block" ></i>
                                <div>
                                    <span class="fs-12">A total of expired licenses</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-black mb-0">No. Companies</p>
                            <span class="fs-20 text-black font-w600 mb-5 d-block">{{number_format($companies->count())}}</span>
                            <div class="d-flex align-items-center">
                                <i class="ti-briefcase text-primary mr-2" style="font-size: 24px; display: block" ></i>
                                <div>
                                    <span class="fs-12">A total of registered companies</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Companies</h4>
                    <div class="btn-group">
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
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
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    {!! session()->get('error') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example3" class="display table-responsive-lg">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>CEO</th>
                                <th>State</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($companies as $app)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$app->company_name ?? '' }}</td>
                                    <td>{{$app->ceo_name}}</td>
                                    <td>
                                        {{$app->getState->state_name ?? ''}}
                                    </td>
                                    <td>{{$app->email ?? ''}}</td>
                                    <td>{{$app->mobile_no ?? ''}}</td>
                                    <td>
                                        <a href="{{route('read-company-profile', $app->slug)}}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="ti-eye"></i></a>
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
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
@endsection

