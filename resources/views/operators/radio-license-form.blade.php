@extends('layouts.operator-layout')
@section('title')
    New Radio License Application
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    New Radio Licence Application
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
                    <h4 class="card-title">Submit A New Radio Licence Application</h4>
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
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('new-radio-license-application')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Purpose of Application</label>
                                            <textarea name="purpose" id="purpose" placeholder="Type the purpose of your application here..." style="resize: none;" class="form-control content">{{old('purpose')}}</textarea>
                                            @error('purpose')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="container" id="products">
                                        <div class="row mb-3 item">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href="javascript:void(0);" class="remove-line"><i class="ti-trash text-danger " style="cursor: pointer;"></i> Remove Item</a>
                                            </div>
                                            <div class="col-md-8">
                                                <h4>Device</h4>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Radio Station</label>
                                                            <select name="workstation[]" id="workstationa" class="form-control js-example-theme-single select-workstation">
                                                                <option selected disabled>Select workstation</option>
                                                                @foreach($work_stations as $station)
                                                                    <option value="{{$station->id}}">{{$station->work_station_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Category</label>
                                                            <select name="licence_category[]" id="licence_category1" class="form-control js-example-theme-single select-license-category">
                                                                <option selected disabled>Select Licence Category</option>
                                                                @foreach($licence_categories as $cat)
                                                                    <option value="{{$cat->id}}">{{$cat->category_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">If Others</label>
                                                            <input type="text" name="other_category[]" placeholder="Type other category" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Type of Device</label>
                                                            <select name="type_of_device[]" id="type_of_device1"  class="form-control js-example-theme-single select-device-type">
                                                                <option selected disabled>Select type of device</option>
                                                                <option value="1">Hand held</option>
                                                                <option value="2">Base station</option>
                                                                <option value="3">Repeaters station</option>
                                                                <option value="4">Vehicular station</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">No. of Device</label>
                                                            <input name="no_of_devices[]"  class="form-control" placeholder="No. of Devices">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Frequency</h4>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Mode of Operation</label>
                                                            <select name="operation_mode[]" id="modeOfOperation" class="form-control js-example-theme-single select-operation-mode">
                                                                <option value="1">Simplex</option>
                                                                <option value="2">Duplex</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Frequency Band</label>
                                                            <select name="frequency_band[]" id="frequencyBand" class="form-control js-example-theme-single select-frequency-band">
                                                                <option value="1">MF/HF</option>
                                                                <option value="2">VHF</option>
                                                                <option value="3">UHF</option>
                                                                <option value="4">SHF</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <button class="btn btn-sm btn-primary add-line" type="button"> <i class="ti-plus mr-2"></i> Add Another Equipment</button>
                                        </div>
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
    <script>
        $(document).ready(function(){
            let counter = 1;
            $('.contact-wrapper').hide();
            var grand_total = 0;
            $('.invoice-detail-table').on('mouseup keyup', 'input[type=number]', ()=> calculateTotals());

            $(document).on('click', '.add-line', function(e){
                e.preventDefault();
                var new_selection = $('.item').first().clone();
                $('#products').append(new_selection);

                $(".js-example-theme-single").select2({
                    placeholder: "Select product or service"
                });
                $(".select-workstation").last().next().next().remove();
                $(".select-device-type").last().next().next().remove();
                $(".select-license-category").last().next().next().remove();
                $(".select-operation-mode").last().next().next().remove();
                $(".select-frequency-band").last().next().next().remove();
            });

            $(document).on('click', '.remove-line', function(e){
                e.preventDefault();
                $(this).closest('.item').remove();
            });

        });

    </script>
@endsection

