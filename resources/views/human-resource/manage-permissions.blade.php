@extends('layouts.master-layout')
@section('title')
    Manage Permissions
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
    Manage Permissions
@endsection

@section('main-content')

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Manage Permissions</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#directorModal" class="btn btn-sm btn-primary float-right"> <i class="ti-lock mr-2"></i> Add New Permission</a>
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
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    {!! session()->get('success') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                   <div class="row">
                       <div class="col-md-12">
                           <div class="table-responsive">
                               <table id="example3" class="display table-responsive-lg">
                                   <thead>
                                   <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php $serial = 1; @endphp
                                   @foreach($permissions as $permission)
                                       <tr>
                                           <td>{{$serial++}}</td>
                                           <td>{{$permission->name ?? '' }}</td>
                                           <td>No Action</td>
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
    <div class="modal fade" id="directorModal">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="ti-lock mr-3"></i> Add New Permission</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{route('create-permission')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Permission Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="Permission Name" class="form-control">
                                    @error('name')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger light btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
@endsection

