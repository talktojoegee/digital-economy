@extends('layouts.operator-layout')
@section('title')
    {{$station->work_station_name ?? '' }} Station
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
            color: #ffffff;
        }
    </style>
@endsection
@section('active-page')
    {{$station->work_station_name ?? '' }} Station
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$station->work_station_name ?? '' }} Location</h4>
                    <div class="btn-group">
                        <a href="{{route('radio-work-station')}}"  class="btn btn-sm btn-primary float-right"> <i class="ti-flag mr-2"></i> All Radio Stations</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div id="map_canvas">
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCRRkKFlMtq2u3XoglN_1nQP6X62lewbJc&q={{$station->lat ?? '' }},{{$station->long ?? ''}}" width="100%" height="750" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Details</div>
                </div>
                <div class="card-body">
                    <form action="{{route('edit-radio-work-station')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Work Station Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="work_station_name" value="{{old('work_station_name', $station->work_station_name)}}" placeholder="Work Station Name" class="form-control">
                                        @error('work_station_name')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Mobile No. <sup class="text-danger">*</sup></label>
                                        <input type="text" name="mobile_no" value="{{old('mobile_no', $station->mobile_no)}}" placeholder="Mobile No." class="form-control">
                                        @error('mobile_no')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                        <input type="hidden" name="station" value="{{$station->id}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Longitude. <sup class="text-danger">*</sup></label>
                                        <input type="text" name="long" value="{{old('long', $station->long)}}" placeholder="Work Station Longitude" class="form-control">
                                        @error('long')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Latitude. <sup class="text-danger">*</sup></label>
                                        <input type="text" name="lat" value="{{old('lat', $station->lat)}}" placeholder="Work Station Latitude" class="form-control">
                                        @error('lat')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Where is this radio work station located? <sup class="text-danger">*</sup></label>
                                        <select name="state" id="state" class="form-control js-example-theme-single">
                                            <option selected disabled>-- Select state --</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}" {{$station->state_id == $state->id ? 'selected' : '' }}>{{$state->state_name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Is this radio work station still active? <sup class="text-danger">*</sup></label>
                                        <select name="status" id="status" class="form-control js-example-theme-single">
                                            <option selected disabled>-- Select --</option>
                                            <option value="1" {{$station->status == 1 ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{$station->status == 1 ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('status')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Address <sup class="text-danger">*</sup></label>
                                        <textarea class="form-control" name="address" placeholder="Type address here..." id="address" style="resize:none;">{{old('address', $station->address)}}</textarea>
                                        @error('address')
                                        <i class="text-danger">{{$message}}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger light btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-scripts')
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script>
      /*  var long = "{{$station->long}}";
        var lat = "$station->lat}}";
        //console.log(`Long: ${long} Lat:${lat}`)
        function initialize() {
            var myLatlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom: 8,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        }

        function loadScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
            document.body.appendChild(script);
        }

        window.onload = loadScript;
*/

    </script>

@endsection

