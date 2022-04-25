@extends('layouts.master-layout')
@section('title')
    Company Profile
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
    Company Profile
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Profile</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home1"><i class="la la-home mr-2"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile1"><i class="flaticon-381-user-9 mr-2"></i> Director(s)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact1"><i class="la la-phone mr-2"></i>  Contact Person(s)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message1"><i class="ti-signal mr-2"></i> Radio Licenses</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                <div class="pt-4">
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Company Information</h4>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Name
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$company->company_name ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Email
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{$company->email ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Mobile No.
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$company->mobile_no ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">CEO
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>{{$company->ceo_name ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">RC Number
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-9">
                                                <span>
                                                    {{$company->rc_number ?? '' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Year of Incorporation
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{ !is_null($company->incorporation_year) ? date('Y',strtotime($company->incorporation_year)) : '-'}}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">Address
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{ $company->office_address ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">State
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{ $company->getState->state_name ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-4 mb-sm-2">
                                            <div class="col-sm-3">
                                                <h5 class="f-w-500">LGA
                                                    <span class="pull-right d-none d-sm-block">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <span>{{ $company->getLocalGovernment->local_name ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1">
                                <div class="pt-4">
                                    <h4 class="text-primary mb-4">Company Directors</h4>
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th class="width80"><strong>#</strong></th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong>EMAIL</strong></th>
                                                <th><strong>MOBILE NO.</strong></th>
                                                <th><strong>COUNTRY</strong></th>
                                                <th><strong>STATUS</strong></th>
                                                <th><strong>ACTION</strong></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $serial = 1; @endphp
                                            @foreach($company->getDirectors as $director)
                                                <tr>
                                                    <td><strong>{{$serial++}}</strong></td>
                                                    <td>{{$director->full_name ?? '' }}</td>
                                                    <td>{{$director->email ?? '' }}</td>
                                                    <td>{{$director->mobile_no ?? ''}}</td>
                                                    <td>{{$director->getCountry->nicename ?? ''}}</td>
                                                    <td>{{$director->status == 1 ? 'Active' : 'Not Active'}}</td>
                                                    <td>Action</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact1">
                                <div class="pt-4">
                                    <h4 class="text-primary mb-4">Company Contact Person(s)</h4>
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th class="width80"><strong>#</strong></th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong>EMAIL</strong></th>
                                                <th><strong>MOBILE NO.</strong></th>
                                                <th><strong>STATUS</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $c = 1; @endphp
                                            @foreach($company->getCompanyContactPersons as $contact)
                                                <tr>
                                                    <td><strong>{{$c++}}</strong></td>
                                                    <td>{{$contact->full_name ?? '' }}</td>
                                                    <td>{{$contact->email ?? '' }}</td>
                                                    <td>{{$contact->mobile_no ?? ''}}</td>
                                                    <td>{{$contact->status == 1 ? 'Active' : 'Not Active'}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message1">
                                <div class="pt-4">
                                    <h4 class="text-primary mb-4">Radio License(s)</h4>
                                    <div class="table-responsive">
                                        <table id="example3" class="display table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Device</th>
                                                <th>Frequency</th>
                                                <th>Start</th>
                                                <th style="width: 100px;">End</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $f = 1; @endphp
                                            @foreach($company->getAssignedFrequencies as $freq)
                                                <tr>
                                                    <td>{{$f++}}</td>
                                                    <td>
                                                        @switch($freq->type_of_device)
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
                                                    </td>
                                                    <td>{{$freq->assigned_frequency ?? '' }}</td>
                                                    <td class="text-success">{{date('d M, Y', strtotime($freq->valid_from))}}</td>
                                                    <td class="text-danger">{{date('d M, Y', strtotime($freq->valid_to))}}</td>
                                                    <td>
                                                        @switch($freq->status)
                                                            @case(0)
                                                            <label for="" class="badge badge-warning text-white">Inactive</label>
                                                            @break
                                                            @case(1)
                                                            <label for="" class="badge text-white badge-success text-white">Active</label>
                                                            @break
                                                            @case(2)
                                                            <label for="" class="badge badge-danger text-white">Expired</label>
                                                            @break
                                                            @case(3)
                                                            <label for="" class="badge badge-danger text-white">Withdrawn</label>
                                                            @break
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <a href="{{route('read-frequencies', $freq->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="ti-eye"></i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
@endsection

