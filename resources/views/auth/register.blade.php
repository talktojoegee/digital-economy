<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{config('app.name')}} | Register</title>
    <meta name="description" content="Some description for the page"/>
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">

                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="#"><img src="/images/logo.jpg"  alt=""></a>
                                </div>
                                @if(session()->has('success'))
                                    <h4 class="text-center mb-4 text-white">Congratulations!</h4>
                                    <h6 class="text-center text-white mb-4">You're one step away to completion.</h6>
                                @else
                                    <h4 class="text-center mb-4 text-white">Start Your Registration</h4>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                        {!! session()->get('error') !!}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                        </svg>
                                        {!! session()->get('success') !!}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="/" class="btn btn-primary btn-sm">Go Back Home</a>
                                    </div>
                                @endif
                                @if(!session()->has('success'))
                                <form action="{{route('e-registration')}}" method="post" autocomplete="off">
                                    @php $securityCode = substr(sha1(time()),34,40) @endphp
                                    <input type="hidden" name="validScode" value="{{$securityCode ?? '' }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email Address</strong></label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email Address">
                                        @error('email') <i class="text-danger">{{$message}}</i> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-white">Security Code </label>
                                        <h3 class="text-danger text-center" style="font-weight: 700">{{$securityCode ?? '' }}</h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Enter Security Code</strong></label>
                                        <input type="text" name="security_code" class="form-control" placeholder="Enter the Security Code shown above here...">
                                        @error('security_code') <i class="text-danger">{{$message}}</i> @enderror
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <a class="text-white" href="{{route('login')}}">Already Have An Account? Login here</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Verify Email</button>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/vendor/global/global.min.js" type="text/javascript"></script>
<script src="public/js/custom.min.js" type="text/javascript"></script>
<script src="public/js/deznav-init.js" type="text/javascript"></script>
</body>
</html>
