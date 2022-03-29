@extends('layouts.master-layout')
@section('title')
    Assign Frequency
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Assign Frequency
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Compose Message</h4>
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
                        </div>
                        <div class="col-md-12">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    {!! session()->get('success') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('send-customer-message')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Customer <sup class="text-danger">*</sup></label>
                                        <input type="text" value="{{$customer->company_name ?? ''}}" readonly class="form-control" placeholder="To:">
                                        <input type="hidden" name="customer" value="{{$customer->id}}">
                                        <input type="hidden" name="message_type" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Frequency <sup class="text-danger">*</sup></label>
                                        <input type="text"  class="form-control" name="frequency" placeholder="Frequency">
                                        @error('frequency')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>

                                </div>

                                <hr>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="btn-group">
                                        <a href="{{url()->previous()}}" class="btn-light btn-sm btn">Cancel</a>
                                        <button class="btn btn-primary btn-sm">Submit</button>
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

