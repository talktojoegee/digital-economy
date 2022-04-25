@extends('layouts.master-layout')
@section('title')
    Frequency Assignment(Pending)
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
    Frequency Assignment <small class="text-warning">(Pending)</small>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Frequency Assignment <small class="text-warning">(Pending)</small></h4>
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
                                <th>Date</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($queue as $app)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{date('d M, Y h:ia', strtotime($app->created_at))}}</td>
                                    <td>{{$app->getCompany->company_name ?? '' }}</td>
                                    <td>
                                        @switch($app->status)
                                            @case(0)
                                            <label for="" class="badge badge-warning text-white">Pending</label>
                                            @break
                                            @case(1)
                                            <label for="" class="badge text-white badge-success text-white">Assigned</label>
                                            @break
                                            @case(2)
                                            <label for="" class="badge badge-danger text-muted">Discarded</label>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($app->status == 0)
                                        <a href="{{route('assign-frequency', ['slug'=>$app->getCompany->slug, 'invoice_slug'=>$app->invoice_slug])}}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="ti-eye"></i></a>
                                        @else
                                            <a href="javascript:void(0);" class="btn btn-light shadow btn-xs" disabled>No Action</a>
                                        @endif
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

