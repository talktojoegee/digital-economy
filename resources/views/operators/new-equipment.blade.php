@extends('layouts.operator-layout')
@section('title')
    Add New Equipment
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
    Add New Equipment
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Equipment</h4>
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-primary float-right"> <i class="ti-plus mr-2"></i> New Licence Application</a>
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
                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    {!! session()->get('success') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif

                                <form action="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option selected disabled>-- Select category --</option>
                                                    <option value="1">Ship</option>
                                                    <option value="2">Aircraft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ship">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name of Ship <sup class="text-danger">*</sup></label>
                                                <input type="text" name="ship_name" value="{{old('ship_name')}}" placeholder="Ship Name" class="form-control">
                                                @error('ship_name')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Registered Port <abbr title="The port in which/at which the Ship is registered ">?</abbr><sup class="text-danger">*</sup></label>
                                                <input type="text" name="port" value="{{old('port')}}" placeholder="Registered Port" class="form-control">
                                                @error('port')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gross Tonnage <sup class="text-danger">*</sup></label>
                                                <input type="text" name="gross_tonnage" value="{{old('gross_tonnage')}}" placeholder="Gross Tonnage" class="form-control">
                                                @error('gross_tonnage')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ship">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Engaged Route <abbr title="The route or service in which the Ship will be engaged">?</abbr> <sup class="text-danger">*</sup></label>
                                                <input type="text" name="engaged_route" value="{{old('engaged_route')}}" placeholder="Engaged Route" class="form-control">
                                                @error('engaged_route')
                                                <i class="text-danger mt-2">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Normal Crew Carried <abbr title="Number of normal Crew carried ">?</abbr><sup class="text-danger">*</sup></label>
                                                <input type="number" name="no_crew_carried" value="{{old('no_crew_carried')}}" placeholder="Normal Crew Carried" class="form-control">
                                                @error('no_crew_carried')
                                                <i class="text-danger mt-2">{{$message}}</i>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Per Passenger Certificate <abbr title="Number of Passengers as per Passenger Certificate">?</abbr> <sup class="text-danger">*</sup></label>
                                                <input type="text" name="per_passenger_certificate" value="{{old('per_passenger_certificate')}}" placeholder="Per Passenger Certificate" class="form-control">
                                                @error('per_passenger_certificate')
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
@endsection

@section('extra-scripts')

@endsection

