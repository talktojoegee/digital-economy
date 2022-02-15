<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{config('app.name')}} | Reset Password</title>
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
                                    <a href="#"><img src="/images/logo-full.png"  alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Reset Password</h4>
                                @if(session()->has('error'))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                        {!! session()->get('error') !!}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                                <form action="{{route('password.update')}}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>New Password</strong></label>
                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                        @error('password') <i class="text-danger">{{$message}}</i> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Re-type Password</strong></label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type Password">
                                        @error('password_confirmation') <i class="text-danger">{{$message}}</i> @enderror
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <a class="text-white" href="{{route('login')}}">Take me to Login page.</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Reset Password</button>
                                    </div>
                                </form>
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
