@extends('layouts.master-layout')
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
                                                                <div class="col-xl-12 col-sm-12 text-center text-black">
                                                                    <p class="text-uppercase ">Wireless Telegraphy Act, 1961</p>
                                                                    <a href="#" class="brand-logo">
                                                                        <img style="width: 92px; height: 92px; margin: 0px auto" class="logo-abbr" src="/images/arm_.png" alt="">
                                                                    </a>
                                                                    <p class="text-uppercase mt-2">Federal Republic of Nigeria</p>
                                                                </div>
                                                                <div class="col-xl-12 col-sm-12 text-black">
                                                                    <p class="text-right mb-1"><strong>No</strong> <u><span class="fs-22">004739</span></u></p>
                                                                    <p class="text-center mb-2"><span class="text-uppercase font-w800">Private Fixed </span>(Very High Frequency) <span class="text-uppercase font-w800">Radio Station Licence</span></p>
                                                                    <p class="text-center font-w800">Form No. 19(B)</p>
                                                                    <p class="mb-0"><strong>Date:</strong> {{ date('d M, Y', strtotime($frequency->created_at))}}</p>
                                                                    <p class="mb-0"><strong>Renewal:</strong> {{env('APP_CURRENCY')}}{{number_format(400,2)}}</p>
                                                                    <p class="mb-0"><strong>Fee on Issue:</strong> {{env('APP_CURRENCY')}}{{number_format(400,2)}}</p>

                                                                    <ol class="mt-4">
                                                                        <li> Licensee <u>{{$frequency->getCompany->company_name ?? '' }}</u> of <u>statement</u></li>
                                                                        <li> The special conditions governing the licence are Regulations 8, 10, 11, 15, 19, 20 and 21 ______</li>
                                                                    </ol>
                                                                </div>
                                                                <div class="col-xl-6 col-sm-6">
                                                                    <div class="profile-personal-info">
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Company Name:
                                                                                    <span class="text-muted">{{$frequency->getCompany->company_name ?? '' }}</span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Frequency:
                                                                                    <span class="text-muted">{{$frequency->assigned_frequency ?? '' }}</span>
                                                                                </h5>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Valid From:
                                                                                     <span class="text-muted">{{ date('d M, Y', strtotime($frequency->valid_from))}}</span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Expires:
                                                                                    <span class="text-danger">{{ date('d M, Y', strtotime($frequency->valid_to))}}</span>
                                                                                </h5>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Status:
                                                                                    <span class="text-danger">
                                                                                    @switch($frequency->status)
                                                                                            @case(0)
                                                                                            <label for="" class="badge badge-warning text-white">Inactive</label>
                                                                                            @break
                                                                                            @case(1)
                                                                                            <label for="" class="badge text-white badge-success text-white">Active</label>
                                                                                            @break
                                                                                            @case(2)
                                                                                            <label for="" class="badge badge-warning text-white">Expired</label>
                                                                                            @break
                                                                                                @case(3)
                                                                                                <label for="" class="badge badge-danger text-white">Withdrawn</label>
                                                                                                @break
                                                                                        @endswitch
                                                                                    </span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Type of Device:
                                                                                    <span class="text-muted">
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
                                                                                </h5>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Assigned By: <span class="text-muted">{{$frequency->getAssignedBy->first_name ?? '' }} {{$frequency->getAssignedBy->last_name ?? '' }}</span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4 mb-sm-2">
                                                                            <div class="col-sm-12">
                                                                                <h5 class="f-w-500">Date Issued:
                                                                                    <span class="text-muted">{{ date('d M, Y', strtotime($frequency->created_at))}}</span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-sm-6">
                                                                    <div class="card bg-light">
                                                                        <div class="card-header">
                                                                            Update Licence Status
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <p></p>
                                                                            <form action="{{route('update-radio-status')}}" method="post">
                                                                                @csrf
                                                                                @php
                                                                                    $statuses = ["Inactive", "Active", "Expired", "Withdrawn"];
                                                                                @endphp
                                                                                <div class="form-group">
                                                                                    <input type="hidden" name="frequency_id" value="{{$frequency->id}}">
                                                                                    <label for="">Subject</label>
                                                                                    <input type="text"
                                                                                           class="form-control" placeholder="Subject" name="subject" value="{{old('subject')}}">
                                                                                    @error('subject')
                                                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="">Licence Status</label>
                                                                                    <select name="status" id="status"
                                                                                            class="form-control">
                                                                                        @for($i = 0; $i<count($statuses); $i++)
                                                                                            <option value="{{$i}}" {{$i == $frequency->status ? 'selected' : '' }}>{{$statuses[$i]}}</option>
                                                                                        @endfor
                                                                                    </select>
                                                                                    @error('status')
                                                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="">Narration</label>
                                                                                    <textarea name="narration" id="narration" placeholder="Narration"
                                                                                              class="form-control" rows="5  " style="resize: none;">{{old('narration')}}</textarea>
                                                                                    @error('narration')
                                                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group d-flex justify-content-center">
                                                                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                                                                </div>
                                                                            </form>
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
                                    <h4 class="text-primary mb-3">Renewed: <small class="text-danger" style="font-weight: 700">{{$frequency->getFrequencyRenewalLog->count()}} <span class="text-muted">time(s)</span></small> </h4>
                                    <div class="table-responsive">
                                        <table class="table header-border table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Ref. Code</th>
                                                <th>Valid From</th>
                                                <th>Expires</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $serial = 1; @endphp
                                            @foreach($frequency->getFrequencyRenewalLog as $renew)
                                                <tr>
                                                    <td>{{$serial++}}</td>
                                                    <td>{{date('d M, Y h:ia', strtotime($renew->created_at))}}</td>
                                                    <td>{{$renew->ref_no ?? '' }}</td>
                                                    <td>{{date('d M, Y', strtotime($renew->valid_from))}}</td>
                                                    <td class="text-danger">{{date('d M, Y', strtotime($renew->valid_to))}}</td>
                                                    <td>{{number_format($renew->amount ?? 0, 2)}}</td>
                                                </tr>
                                            @endforeach
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
                                                    <td>{{$log->getLoggedBy->first_name ?? '' }} {{$log->getLoggedBy->last_name ?? '' }}</td>
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

