@extends('layouts.master-layout')
@section('title')
    Invoice Details
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Invoice Details
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3 d-flex  justify-content-end">
            <div class="btn-group ">
                <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                @if($invoice->status == 0)
                <a href="javascript:void(0);" data-toggle="modal" data-target="#discardTransaction" class="btn btn-sm btn-danger float-right mr-1"> <i class="ti-close mr-2"></i> Discard Transaction</a>
                @endif
                @if($invoice->status == 1)
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#verifyPayment" class="btn btn-sm btn-primary float-right mr-1"> <i class="ti-check mr-2"></i> Verify Payment</a>
                @endif

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
                <div class="card-header"> Invoice <strong></strong> <span class="float-right"></span> </div>
                <div class="card-body" id="invoiceWrapper">
                    <div class="row mb-5">
                        <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <h6>From:</h6>
                            <img src="/images/logo-1.jpeg" class="img-fluid width110">
                            <div><strong>Address: </strong>{!! env('APP_ADDRESS') !!}</div>
                            <div><strong>Email: </strong> {{env('APP_EMAIL')}}</div>
                            <div><strong>Phone: </strong> {{env('APP_PHONE')}}</div>
                        </div>
                        <div class="mt-4 col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 text-left align-content-end">
                            <h6>To:</h6>
                            <img src="/assets/drive/logos/{{$invoice->getCompany->logo ?? 'logo.png'}}" class="img-fluid width110">
                            <div class="">
                                <div> <strong>{{$invoice->getCompany->company_name ?? ''}}</strong> </div>
                                <div><strong>Address: </strong>{{$invoice->getCompany->office_address ?? ''}}</div>
                                <div><strong>Email: </strong> {{$invoice->getCompany->email ?? ''}}</div>
                                <div><strong>Phone: </strong> {{$invoice->getCompany->mobile_no ?? ''}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td class=""><strong>Issued By: </strong> {{$invoice->getIssuedBy->first_name ?? ''}} {{$invoice->getIssuedBy->last_name ?? ''}}</td>
                                        <td class=""><strong>Date: </strong> {{date('d M, Y', strtotime($invoice->date_issued))}}</td>
                                        <td class=""><strong>Status: </strong>
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
                                        </td>
                                        <td class="right"><strong>Invoice No.: </strong> {{$invoice->invoice_no ?? '' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap mb-0 invoice-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase"> Station</th>
                                        <th class="text-uppercase">Category</th>
                                        <th class="text-uppercase">Device</th>
                                        <th class="text-uppercase">Mode</th>
                                        <th class="text-uppercase">Freq. Band</th>
                                        <th class="text-uppercase">Quantity</th>
                                        <th class="text-uppercase">Amount(₦)</th>
                                    </tr>
                                    </thead>
                                    <tbody id="products">
                                    @foreach($invoice->getInvoiceItems as $app)
                                        <tr class="item">
                                            <td style="width: 20px;">
                                                <p  class="text-muted text-wrap">{{$app->getRadioDetailApplication->getWorkstation->work_station_name ?? '' }}</p>
                                                <input type="hidden" name="detailHandle[]" value="{{$app->id}}">
                                            </td>
                                            <td style="width: 20px;">
                                                <p class="text-muted text-wrap">{{$app->getRadioDetailApplication->getLicenseCategory->category_name ?? ''}}</p>
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
                                                <p class="text-muted">{{$app->getRadioDetailApplication->operation_mode == 1 ? 'Simplex' : 'Duplex'}}</p>
                                            </td>

                                            <td>
                                                <p class="text-muted">
                                                    @switch($app->getRadioDetailApplication->frequency_band)
                                                        @case(1)
                                                        MF/HF
                                                        @break
                                                        @case(2)
                                                        VHF
                                                        @break
                                                        @case(3)
                                                        UHF
                                                        @break
                                                        @case(4)
                                                        SHF
                                                        @break
                                                    @endswitch
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-muted">{{number_format($app->getRadioDetailApplication->no_of_devices)}}</p>
                                            </td>
                                            <td>
                                                <p class="text-muted">{{number_format($app->sub_total,2)}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <input type="hidden" name="company" value="{{$application->company_id}}">
                                        <td colspan="6" class="text-right"><strong>Total</strong></td>
                                        <td colspan="1" class="right text-right">
                                            <strong>₦{{number_format($invoice->total,2)}}</strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12 col-sm-12 d-flex justify-content-center">
                        <div class="btn-group">
                            <a class="btn btn-light"> <i class="ti-control-backward mr-2"></i> Go Back</a>
                            <button class="btn btn-secondary" onclick="generatePDF()" type="button"> <i class="ti-printer text-white mr-2"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal  fade" id="verifyPayment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success ">
                    <h5 class="modal-title text-white"> <i class="ti-check mr-3"></i> Verify Payment</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{route('update-invoice-status')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comment <sup class="text-danger">*</sup></label>
                                    <textarea rows="5" style="resize: none;" name="comment"  placeholder="Type comment here..." class="form-control"></textarea>
                                    @error('comment')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                    <input type="hidden" value="{{$invoice->id}}" name="invoiceId">
                                    <input type="hidden" value="2" name="status">
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
    <div class="modal  fade" id="discardTransaction">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white"> <i class="ti-close mr-3"></i> Discard Transaction</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{route('update-invoice-status')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comment <sup class="text-danger">*</sup></label>
                                    <textarea rows="5" style="resize: none;" name="comment"  placeholder="Why would you want to discard this transaction? Leave a comment here..." class="form-control"></textarea>
                                    @error('comment')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                    <input type="hidden" value="{{$invoice->id}}" name="invoiceId">
                                    <input type="hidden" value="3" name="status">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF(){
            var element = document.getElementById('invoiceWrapper');
            html2pdf(element,{
                margin:       10,
                filename:     "Invoice_No_{{$invoice->invoice_no}}"+".pdf",
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            });
        }
    </script>
@endsection

