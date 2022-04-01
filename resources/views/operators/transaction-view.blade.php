@extends('layouts.operator-layout')
@section('title')
    Transaction Details
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Transaction Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3 d-flex  justify-content-end">
            <div class="btn-group ">
                <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    {!! session()->get('success') !!}
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
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
            <div class="card">
                <div class="card-header"> Invoice  <span class="float-right"></span> </div>
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
                            <div> <strong>{{$invoice->getCompany->company_name ?? ''}}</strong> </div>
                            <div>{{$invoice->getCompany->office_address ?? ''}}</div>
                            <div>Email: {{$invoice->getCompany->email ?? ''}}</div>
                            <div>Phone: {{$invoice->getCompany->mobile_no ?? ''}}</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>Other Details:</h6>
                            <div> <span class="text-uppercase">Issued By:</span> {{$invoice->getIssuedBy->first_name ?? ''}} {{$invoice->getIssuedBy->last_name ?? ''}}</div>
                            <div><span class="text-uppercase">Date:</span> {{date('d M, Y', strtotime($invoice->date_issued))}}</div>
                            <div><span class="text-uppercase"> Status:</span>
                                @switch($invoice->status)
                                    @case(0)
                                    <label for="" class="label label-warning text-white">Unpaid</label>
                                    @break
                                    @case(1)
                                    <label for="" class="label label-primary text-white">Paid</label>
                                    @break
                                    @case(2)
                                    <label for="" class="label label-success text-white">Verified</label>
                                    @break
                                    @case(3)
                                    <label for="" class="label label-danger text-white">Discarded</label>
                                    @break
                                @endswitch

                            </div>
                            <div><span class="text-uppercase">Invoice No.</span> {{$invoice->invoice_no ?? '' }}</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>...:</h6>
                            <div><span class="text-uppercase">Date Paid:</span></div>
                        </div>
                    </div>
                    <div class="row">

                            @csrf
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap mb-0 invoice-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Radio Station</th>
                                        <th class="text-uppercase">Category</th>
                                        <th class="text-uppercase">Type of Device</th>
                                        <th class="text-uppercase">Quantity</th>
                                        <th class="text-uppercase">Amount(₦)</th>
                                    </tr>
                                    </thead>
                                    <tbody id="products">
                                    @foreach($invoice->getInvoiceItems as $app)
                                        <tr class="item">
                                            <td >
                                                <p  class="text-muted">{{$app->getRadioDetailApplication->getWorkstation->work_station_name ?? '' }}</p>
                                                <input type="hidden" name="detailHandle[]" value="{{$app->id}}">
                                            </td>
                                            <td>
                                                <p class="text-muted">{{$app->getRadioDetailApplication->getLicenseCategory->category_name ?? ''}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted">
                                                    @switch($app->getRadioDetailApplication->type_of_device)
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
                                                <p class="text-muted text-right">{{number_format($app->getRadioDetailApplication->no_of_devices)}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted text-right">{{number_format($app->sub_total,2)}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-5"> </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <input type="hidden" name="company" value="{{$application->company_id}}">
                                    <table class="table table-clear">
                                        <tbody>
                                        <tr>
                                            <td class="left"><strong>Subtotal</strong></td>
                                            <td class="right text-right">{{number_format($invoice->sub_total,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>VAT (10%)</strong></td>
                                            <td class="right">
                                                <p class="text-muted text-right">{{number_format($invoice->total - $invoice->sub_total)}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right text-right"><strong>₦{{number_format($invoice->total,2)}}</strong><br>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    @if($invoice->total > $invoice->paid_amount)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a class="btn btn-sm btn-primary" href="{{route('make-payment', $invoice->slug)}}">Pay Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection

