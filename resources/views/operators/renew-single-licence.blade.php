@extends('layouts.operator-layout')
@section('title')
    Renew Licence
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Renew Licence
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
        <div class="col-lg-6">
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
        </div>
        <div class="col-lg-6 col-xl-6 col-sm-12 col-md-6 offset-lg-3 offset-xl-3 offset-md-3">
            <p><strong class="text-danger">NOTE:</strong> You'll be charged <code>service fee</code> by Remita for handling this transaction.</p>
            <div class="card">
                <div class="card-header  text-white bg-primary text-uppercase"> Renew Licence <span class="float-right"></span> </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form onsubmit="makePayment()" id="makePaymentForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Company Name</label>
                                            <input type="text" placeholder="Company Name" value="{{$frequency->getCompany->company_name}}" readonly name="company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Frequency</label>
                                            <input type="text" placeholder="Frequency" readonly value="{{$frequency->assigned_frequency ?? ''}}" name="frequency" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <input type="text" placeholder="Category" value="{{$detail->getLicenseCategory->category_name ?? '' }}" readonly name="category" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Sub-category</label>
                                            <input name="narration" class="form-control" readonly placeholder="Narration" value="{$transaction->invoice_no ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Radio Station</label>
                                            <input name="work_station" class="form-control" readonly placeholder="Radio Workstation" value="{{$detail->getWorkstation->work_station_name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="text"  placeholder="Amount" value="{number_format($transaction->total)}}" readonly class="form-control">
                                            <input type="hidden" step="0.01" placeholder="Amount" value="{$transaction->total}}" id="amount" name="amount" class="form-control">
                                        </div>
                                    </div>
                                    <p id="inWords" class="ml-2 text-muted"></p>
                                    <div class="col-md-12 d-flex justify-content-center">

                                        <button class="btn btn-primary" type="button" onclick="makePayment()">Pay ₦{ number_format($transaction->total) }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js">/script>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/js/axios.min.js"></script>
    <script>
        function makePayment() {
            var form = document.querySelector("#makePaymentForm");
            var paymentEngine = RmPaymentEngine.init({
                key: 'QzAwMDAyNzEyNTl8MTEwNjE4NjF8OWZjOWYwNmMyZDk3MDRhYWM3YThiOThlNTNjZTE3ZjYxOTY5NDdmZWE1YzU3NDc0ZjE2ZDZjNTg1YWYxNWY3NWM4ZjMzNzZhNjNhZWZlOWQwNmJhNTFkMjIxYTRiMjYzZDkzNGQ3NTUxNDIxYWNlOGY4ZWEyODY3ZjlhNGUwYTY=',
                transactionId: Math.floor(Math.random()*1101233), // Replace with a reference you generated or remove the entire field for us to auto-generate a reference for you. Note that you will be able to check the status of this transaction using this transaction Id
                customerId: form.querySelector('input[name="email"]').value,
                firstName: form.querySelector('input[name="firstName"]').value,
                lastName: form.querySelector('input[name="lastName"]').value,
                email: form.querySelector('input[name="email"]').value,
                amount: form.querySelector('input[name="amount"]').value,
                narration: form.querySelector('input[name="narration"]').value,
                onSuccess: function (response) {
                    //console.log('callback Successful Response', response);
                    const data = {
                        amount:response.amount,
                        paymentReference:response.paymentReference,
                        transactionId:response.transactionId,
                        invoice:"{$transaction->id}}",
                    }
                    axios.post('/company/transaction-payment-handler', data)
                        .then(res=>{
                            console.log(res);
                        });
                    console.log({data});
                },
                onError: function (response) {
                    console.log('callback Error Response', response);

                },
                onClose: function () {
                    console.log("closed");
                }
            });
            paymentEngine.showPaymentWidget();
        }
        function numberToEnglish( n ) {

            var string = n.toString(), units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words, and = 'and';

            /* Remove spaces and commas */
            string = string.replace(/[, ]/g,"");

            /* Is number zero? */
            if( parseInt( string ) === 0 ) {
                return 'zero';
            }

            /* Array of units as words */
            units = [ '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen' ];

            /* Array of tens as words */
            tens = [ '', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety' ];

            /* Array of scales as words */
            scales = [ '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quatttuor-decillion', 'quindecillion', 'sexdecillion', 'septen-decillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'centillion' ];

            /* Split user argument into 3 digit chunks from right to left */
            start = string.length;
            chunks = [];
            while( start > 0 ) {
                end = start;
                chunks.push( string.slice( ( start = Math.max( 0, start - 3 ) ), end ) );
            }

            /* Check if function has enough scale words to be able to stringify the user argument */
            chunksLen = chunks.length;
            if( chunksLen > scales.length ) {
                return '';
            }

            /* Stringify each integer in each chunk */
            words = [];
            for( i = 0; i < chunksLen; i++ ) {

                chunk = parseInt( chunks[i] );

                if( chunk ) {

                    /* Split chunk into array of individual integers */
                    ints = chunks[i].split( '' ).reverse().map( parseFloat );

                    /* If tens integer is 1, i.e. 10, then add 10 to units integer */
                    if( ints[1] === 1 ) {
                        ints[0] += 10;
                    }

                    /* Add scale word if chunk is not zero and array item exists */
                    if( ( word = scales[i] ) ) {
                        words.push( word );
                    }

                    /* Add unit word if array item exists */
                    if( ( word = units[ ints[0] ] ) ) {
                        words.push( word );
                    }

                    /* Add tens word if array item exists */
                    if( ( word = tens[ ints[1] ] ) ) {
                        words.push( word );
                    }

                    /* Add 'and' string after units or tens integer if: */
                    if( ints[0] || ints[1] ) {

                        /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                        if( ints[2] || ! i && chunksLen ) {
                            words.push( and );
                        }

                    }

                    /* Add hundreds word if array item exists */
                    if( ( word = units[ ints[2] ] ) ) {
                        words.push( word + ' hundred' );
                    }

                }

            }

            return words.reverse().join( ' ' );

        }

        window.onload = function () {
            var amount = document.getElementById('amount').value;
            document.getElementById('inWords').innerHTML = numberToEnglish(parseInt(amount))+' naira only';
            //setDemoData();
        };
    </script>
@endsection

