@extends('layouts.master-layout')
@section('title')
    Message Customer
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Message Customer
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{route('messages')}}" class="btn btn-sm btn-primary float-right"> <i class="ti-email mr-2"></i> Manage Messages</a>
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
                                        <label for="">To <sup class="text-danger">*</sup></label>
                                        <input type="text" value="{{$customer->company_name ?? ''}}" readonly class="form-control" placeholder="To:">
                                        <input type="hidden" name="customer" value="{{$customer->id}}">
                                        <input type="hidden" name="message_type" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Subject <sup class="text-danger">*</sup></label>
                                        <input type="text"  class="form-control" name="subject" placeholder="Subject">
                                        @error('subject')
                                        <i class="text-danger mt-2">{{$message}}</i>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Message <sup class="text-danger">*</sup></label>
                                        <textarea name="compose_message" id="compose_message" placeholder="Type message here..." style="resize: none;" class="form-control content">{{old('compose_message')}}</textarea>
                                        @error('compose_message')
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
    <script type="text/javascript" src="/bower_components/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/bower_components/tinymce.js"></script>
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
@endsection

