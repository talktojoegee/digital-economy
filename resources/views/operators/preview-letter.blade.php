@extends('layouts.operator-layout')
@section('title')
    Preview Your Letter
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Preview Your Letter
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Preview</h4>

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
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <img class="logo-abbr mr-2" src="/assets/drive/logos/{{Auth::user()->logo ?? 'logo.png'}}" alt="">
                                            </div>
                                            <span><strong class="d-block">RC No. <small>{{Auth::user()->rc_number ?? '' }}</small></strong>
                                            </span>
                                        </div>
                                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                            <div> <i class="ti-map-alt text-primary mr-2"></i> <strong>Address</strong><br>
                                                {{Auth::user()->office_address ?? ''}}</div>
                                            <div><i class="ti-email text-primary mr-2"></i> <strong>Email</strong> <br>
                                                {{Auth::user()->email ?? '' }}
                                            </div>
                                            <div><i class="ti-mobile text-primary mr-2"></i> <strong>Phone</strong> <br>
                                                {{Auth::user()->mobile_no ?? ''}}</div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! $handler->compose_letter ?? '' !!}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <form action="{{route('submit-letter')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="letter" value="{{$handler->compose_letter}}">
                                                <a href="{{url()->previous()}}" class="btn btn-light btn-sm">Cancel</a>
                                                <button class="btn btn-sm btn-warning text-white">Print</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
@endsection

@section('extra-scripts')

@endsection

