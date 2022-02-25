@extends('layouts.operator-layout')
@section('title')
    {{Auth::user()->company_name ?? ''}}'s Contact Persons
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
    {{Auth::user()->company_name ?? ''}}'s Contact Persons
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Contact Persons</h4>
                    <div class="btn-group">
                        <button data-toggle="modal" data-target="#directorModal" class="btn btn-sm btn-primary float-right"> <i class="ti-user mr-2"></i> Add New Contact Person</button>
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($persons as $director)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{$director->full_name ?? '' }}</td>
                                    <td>{{$director->email ?? ''}}</td>
                                    <td>{{$director->mobile_no ?? ''}}</td>
                                    <td>{!! $director->status == 1 ? "<span class='text-success'>Active</span>" : "<span class='text-danger'>Inactive</span>"!!}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" data-toggle="modal" data-target="#directorModal_{{$director->id}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="ti-eye"></i></button>
                                            <div class="modal  fade" id="directorModal_{{$director->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"> <i class="ti-user mr-3"></i> Edit Record</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('edit-person-record')}}" method="post" autocomplete="off">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Full Name <sup class="text-danger">*</sup></label>
                                                                            <input type="text" name="full_name" value="{{old('full_name', $director->full_name)}}" placeholder="Full Name" class="form-control">
                                                                            @error('full_name')
                                                                            <i class="text-danger">{{$message}}</i>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Email Address <sup class="text-danger">*</sup></label>
                                                                            <input type="text" name="email" value="{{old('email', $director->email)}}" placeholder="Email Address" class="form-control">
                                                                            @error('email')
                                                                            <i class="text-danger">{{$message}}</i>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Mobile No. <sup class="text-danger">*</sup></label>
                                                                            <input type="text" name="mobile_no" value="{{old('mobile_no', $director->mobile_no)}}" placeholder="Mobile No." class="form-control">
                                                                            @error('mobile_no')
                                                                            <i class="text-danger">{{$message}}</i>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Is this person currently still working with you? <sup class="text-danger">*</sup></label>
                                                                            <select name="person_status" id="person_status_1" class="form-control js-example-theme-single">
                                                                                <option selected disabled>-- Select status --</option>
                                                                                <option value="1">Yes</option>
                                                                                <option value="0">No</option>
                                                                            </select>
                                                                            @error('person_status')
                                                                            <i class="text-danger">{{$message}}</i>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Address <sup class="text-danger">*</sup></label>
                                                                            <textarea class="form-control" name="address" placeholder="Type address here..." id="address" style="resize:none;">{{old('address', $director->address)}}</textarea>
                                                                            @error('address')
                                                                            <i class="text-danger">{{$message}}</i>
                                                                            @enderror
                                                                        </div>
                                                                        <input type="hidden" name="person" value="{{$director->id}}">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="ti-user mr-3"></i> Add New Contact Person</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{route('show-contact-persons')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Full Name <sup class="text-danger">*</sup></label>
                                    <input type="text" name="full_name" value="{{old('full_name')}}" placeholder="Full Name" class="form-control">
                                    @error('full_name')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email Address <sup class="text-danger">*</sup></label>
                                    <input type="text" name="email" value="{{old('email')}}" placeholder="Email Address" class="form-control">
                                    @error('email')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Mobile No. <sup class="text-danger">*</sup></label>
                                    <input type="text" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No." class="form-control">
                                    @error('mobile_no')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Is this person still working with you? <sup class="text-danger">*</sup></label>
                                    <select name="person_status" id="person_status" class="form-control js-example-theme-single">
                                        <option selected disabled>-- Select status --</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('person_status')
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

