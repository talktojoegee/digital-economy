@extends('layouts.operator-layout')
@section('title')
    Licence Certificates
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
    Licence Certificates
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Radio Licence Stations</h4>
                    <div class="btn-group">
                        <a href="{{route('new-licence-application')}}" class="btn btn-sm btn-primary float-right"> <i class="ti-plus mr-2"></i> New Licence Application</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
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
                                <th>Date</th>
                                <th>Category</th>
                                <th>Workstation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach(Auth::user()->getCompanyApplications as $app)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{date('d M, Y', strtotime($app->created_at))}}</td>
                                    <td>{{$app->getLicenceCategory->category_name ?? '' }}</td>
                                    <td>{{$app->getWorkStation->work_station_name ?? '' }}</td>
                                    <td>
                                        @switch($app->status)
                                            @case(0)
                                            <label for="" class="text-secondary">Received</label>
                                            @break
                                            @case(1)
                                            <label for="" class="text-primary">Acknowledged</label>
                                            @break
                                            @case(2)
                                            <label for="" class="text-warning">Processing</label>
                                            @break
                                            @case(3)
                                            <label for="" class="text-danger">Declined</label>
                                            @break
                                            @case(4)
                                            <label for="" class="text-success">Approved/Closed</label>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{route('view-memo', $app->slug)}}" class=""><i class="ti-eye mr-2 text-primary"></i></a>
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

