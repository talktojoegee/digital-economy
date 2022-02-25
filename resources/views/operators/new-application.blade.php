@extends('layouts.operator-layout')
@section('title')
    New Licence Application
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    New Licence Application
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{route('licence-certificates')}}" class="btn btn-sm btn-primary float-right"> <i class="ti-tag mr-2"></i> All Licence Certificates</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Apply For A New Licence</h4>
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
                        <div class="col-md-12">
                            <form action="{{route('preview-letter')}}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Compose Ministerial Memo</label>
                                            <textarea name="compose_letter" id="compose_letter" placeholder="Type letter here..." style="resize: none;" class="form-control content">{{old('compose_letter')}}</textarea>
                                            @error('compose_letter')
                                                <i class="text-danger mt-2">{{$message}}</i>
                                            @enderror
                                        </div>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Equipment</label>
                                                    <select name="equipment" id="equipment" class="form-control js-example-theme-single">
                                                        <option selected disabled>-- Select equipment --</option>
                                                    </select>
                                                    @error('equipment')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Workstation</label>
                                                    <select name="workstation" id="workstation" class="form-control js-example-theme-single">
                                                        <option selected disabled>-- Select workstation --</option>
                                                        @foreach($work_stations as $station)
                                                            <option value="{{$station->id}}">{{$station->work_station_name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('workstation')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Licence Category</label>
                                                    <select name="licence_category" id="licence_category" class="form-control js-example-theme-single">
                                                        <option selected disabled>-- Select Licence Category --</option>
                                                        @foreach($licence_categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->category_name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('licence_category')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table card-table table-vcenter text-nowrap mb-0 invoice-detail-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Equipment</th>
                                                        <th>Work Station</th>
                                                        <th>Licence Category</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="products">
                                                    <tr class="item">
                                                        <td >
                                                            <select name="equipment[]"  class="form-control js-example-theme-single">
                                                                <option selected disabled>-- Select equipment --</option>
                                                            </select>
                                                            @error('equipment')
                                                            <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select name="workstation[]" class="form-control js-example-theme-single">
                                                                <option selected disabled>-- Select workstation --</option>
                                                                @foreach($work_stations as $station)
                                                                    <option value="{{$station->id}}">{{$station->work_station_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('workstation')
                                                            <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select name="licence_category[]" id="licence_category" class="form-control js-example-theme-single">
                                                                <option selected disabled>-- Select Licence Category --</option>
                                                                @foreach($licence_categories as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->category_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('licence_category')
                                                            <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity[]" placeholder="Quantity" class="form-control total_amount">
                                                        </td>
                                                        <td>
                                                            <i class="ti-trash text-danger remove-line" style="cursor: pointer;"></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <button class="btn btn-sm btn-primary add-line" type="button"> <i class="ti-plus mr-2"></i> Add Another Equipment</button>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="btn-group">
                                            <a href="{{url()->previous()}}" class="btn-light btn-sm btn">Cancel</a>
                                            <button class="btn btn-primary btn-sm">Preview</button>
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

