@extends('layouts.master-layout')
@section('title')
    Audit Trail
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
    Audit Trail
@endsection

@section('main-content')
   <div class="row">
       <div class="col-xl-12 col-xxl-12 col-md-12">
           <div class="card">
               <div class="row">
                   <div class="col-xl-6 col-xxl-6 col-md-6 offset-xl-3 offset-xxl-3 offset-md-3">
                       <div class="card">
                           <div class="card-header">
                               <h4 class="card-title">Audit Report</h4>
                           </div>
                           <div class="card-body">
                               <form action="{{route('filter-audit-trail')}}" method="get">
                                   @csrf
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="">Starting From:</label>
                                               <input type="date" class="form-control" placeholder="Starting From:" name="start">
                                               @error('start')
                                               <i class="text-danger mt-2">{{$message}}</i>
                                               @enderror
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="">To:</label>
                                               <input type="date" class="form-control" placeholder="To:" name="end">
                                               @error('end')
                                               <i class="text-danger mt-2">{{$message}}</i>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                                   <hr>
                                   <div class="row">
                                       <div class="col-md-12 d-flex justify-content-center">
                                           <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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

   <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Audit log</h4>
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
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>Narration</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $serial = 1; @endphp
                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td>{{date('d M, Y', strtotime($log->created_at))}}</td>
                                        <td>{{$log->getOfficer->first_name ?? '' }} {{$log->getOfficer->surname ?? ''}}</td>
                                        <td>{{$log->subject ?? ''}}</td>
                                        <td>{{$log->activity ?? ''}}</td>
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

