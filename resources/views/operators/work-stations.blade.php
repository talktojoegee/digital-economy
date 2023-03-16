@extends('layouts.operator-layout')
@section('title')
    {{Auth::user()->company_name ?? ''}}'s Work Stations
@endsection
@section('extra-styles')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
            color: #ffffff;
        }
    </style>
@endsection
@section('active-page')
    {{Auth::user()->company_name ?? ''}}'s Work Stations
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Work Stations</h4>
                    <div class="btn-group">
                        <button data-toggle="modal" data-target="#directorModal" class="btn btn-sm btn-primary float-right"> <i class="ti-flag mr-2"></i> Add New Radio Work Station</button>
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
                                @if($errors->any())
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <p>All your radio stations listed here will be available for licence application or anywhere needed within the application. This does not mean it is licenced yet.</p>
                    <div class="table-responsive">
                        <table id="example3" class="display table-responsive-lg">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Long.</th>
                                <th>Lat.</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($work_stations as $station)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$station->work_station_name ?? '' }}</td>
                                    <td>{{$station->long ?? ''}}</td>
                                    <td>{{$station->lat ?? ''}}</td>
                                    <td>{{$station->getWorkStationState->state_name ?? ''}}</td>
                                    <td>{!! $station->status == 1 ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>Inactive</span>"!!}</td>
                                    <td>
                                        <a href="{{route('view-radio-work-station', $station->slug)}}"  class="btn btn-primary shadow btn-xs sharp mr-1"><i class="ti-eye"></i></a>
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
    <div class="modal fade" id="directorModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="ti-flag mr-3"></i> Add New Radio Station</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{route('radio-work-station')}}" method="post" autocomplete="off">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong class="text-danger">Note:</strong> The radio stations you'll here are not considered licensed till the application process is done.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Work Station Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="work_station_name" value="{{old('work_station_name')}}" placeholder="Work Station Name" class="form-control">
                                    @error('work_station_name')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile No. <sup class="text-danger">*</sup></label>
                                    <input type="text" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No." class="form-control">
                                    @error('mobile_no')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Longitude. <sup class="text-danger">*</sup></label>
                                    <input type="text" name="long" value="{{old('long')}}" placeholder="Work Station Longitude" class="form-control">
                                    @error('long')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Latitude. <sup class="text-danger">*</sup></label>
                                    <input type="text" name="lat" value="{{old('lat')}}" placeholder="Work Station Latitude" class="form-control">
                                    @error('lat')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Class of Station</label>
                                    <select name="station_class" id="station_class" class="form-control">
                                        <option selected disabled>Select Class of Station</option>
                                        <option value="1">First Class</option>
                                        <option value="2">Second Class</option>
                                        <option value="3">Third Class</option>
                                    </select>
                                    @error('station_class')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Schedule of Operation</label>
                                    <select name="schedule_of_operation" id="schedule_of_operation" class="form-control">
                                        <option selected disabled>Select Operation Schedule</option>
                                        <option value="1">Day</option>
                                        <option value="2">Night</option>
                                        <option value="3">Both Day & Night</option>
                                    </select>
                                    @error('schedule_of_operation')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Frequency Usage</label>
                                    <input type="text" name="frequency_usage" class="form-control" placeholder="Fequency Usage">
                                    @error('frequency_usage')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Transmitting Location</label>
                                    <input type="text" name="transmitting_location" class="form-control" placeholder="Transmitting Location">
                                    @error('transmitting_location')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Where is this radio work station located? <sup class="text-danger">*</sup></label>
                                    <select name="state" id="state" class="form-control js-example-theme-single">
                                        <option selected disabled>-- Select state --</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->state_name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Is this radio work station still active? <sup class="text-danger">*</sup></label>
                                    <select name="status" id="status" class="form-control js-example-theme-single">
                                        <option selected disabled>-- Select --</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('status')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Address <sup class="text-danger">*</sup></label>
                                    <textarea class="form-control" name="address" placeholder="Type address here..." id="address" style="resize:none;">{{old('address')}}</textarea>
                                    @error('address')
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
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
@endsection

