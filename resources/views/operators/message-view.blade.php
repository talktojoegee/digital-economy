@extends('layouts.operator-layout')
@section('title')
    Message Details
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Message Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-8 col-xxl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Message</h4>
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
                            <h5 class="text-uppercase">{{$message->subject ?? '' }}</h5>
                            {!! $message->message !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Details</h4>
                    <div class="btn-group">
                        <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="profile-personal-info">
                                <div class="row mb-4 mb-sm-2">
                                    <div class="col-sm-3">
                                        <h6 class="f-w-500">Sent By:
                                        </h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <span>{{$message->getSentBy->first_name ?? '' }} {{$message->getSentBy->last_name ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4 mb-sm-2">
                                    <div class="col-sm-3">
                                        <h6 class="f-w-500">Email
                                            <span class="pull-right d-none d-sm-block">:</span>
                                        </h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <span>{{$message->getSentBy->email ?? '' }} </span>
                                    </div>
                                </div>
                                <div class="row mb-4 mb-sm-2">
                                    <div class="col-sm-3">
                                        <h5 class="f-w-500">Date
                                            <span class="pull-right d-none d-sm-block">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-9">
                                        <span>{{ date('d M, Y h:ia', strtotime($message->created_at))}}</span>
                                    </div>
                                </div>
                                <div class="row mb-4 mb-sm-2">
                                    <div class="col-sm-3">
                                        <h5 class="f-w-500">Ref. No.
                                            <span class="pull-right d-none d-sm-block">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-9">
                                        <span>{{strtoupper($message->ref_code ?? '')}}</span>
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

@endsection

