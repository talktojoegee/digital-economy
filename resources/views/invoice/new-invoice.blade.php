@extends('layouts.master-layout')
@section('title')
    Invoice Customer
@endsection
@section('extra-styles')
    <link href="/vendor/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Invoice Customer
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header"> Invoice <strong>{{date('d M, Y', strtotime(now()))}}</strong> <span class="float-right"></span> </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>From:</h6>
                            <div> <strong>{{config('app.name')}}</strong> </div>
                            <div>{{config('app.address')}}</div>
                            <div>Email: {{config('app.email')}}</div>
                            <div>Phone: {{config('app.phone')}}</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>To:</h6>
                            <div> <strong>{{$customer->company_name ?? ''}}</strong> </div>
                            <div>{{$customer->office_address ?? ''}}</div>
                            <div>Email: {{$customer->email ?? ''}}</div>
                            <div>Phone: {{$customer->mobile_no ?? ''}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{route('store-invoice')}}" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap mb-0 invoice-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Radio Station</th>
                                        <th class="text-uppercase">Category</th>
                                        <th class="text-uppercase">Type of Device</th>
                                        <th class="text-uppercase">Quantity</th>
                                        <th class="text-uppercase">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody id="products">
                                    @foreach($application->getRadioLicenseDetails as $app)
                                        <tr class="item">
                                            <td >
                                                <p  class="text-muted">{{$app->getWorkstation->work_station_name ?? '' }}</p>
                                                <input type="hidden" name="detailHandle[]" value="{{$app->id}}">
                                            </td>
                                            <td>
                                                <p class="text-muted">{{$app->getLicenseCategory->category_name ?? ''}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted">
                                                    @switch($app->type_of_device)
                                                        @case(1)
                                                        Handheld
                                                        @break
                                                        @case(2)
                                                        Base Station
                                                        @break
                                                        @case(3)
                                                        Repeaters Station
                                                        @break
                                                        @case(4)
                                                        Vehicular Station
                                                        @break
                                                    @endswitch
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-muted">{{number_format($app->no_of_devices)}}</p>
                                                <input type="hidden"  name="quantity[]" value="{{$app->no_of_devices}}" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" step="0.01" placeholder="Amount" name="amount[]" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <input type="hidden" name="company" value="{{$application->company_id}}">
                                        <input type="hidden" name="appId" value="{{$application->id}}">
                                        <table class="table table-clear">
                                            <tbody>
                                            <tr>
                                                <td class="left"><strong>Subtotal</strong></td>
                                                <td class="right">$8.497,00</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>VAT (10%)</strong></td>
                                                <td class="right">
                                                    <input type="number" class="form-control" step="0.01" name="vat" placeholder="VAT">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Total</strong></td>
                                                <td class="right"><strong>$7.477,36</strong><br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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

