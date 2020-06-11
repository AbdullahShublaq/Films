{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">{{ __('Login') }}</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--@csrf--}}

{{--<div class="form-group row">--}}
{{--<label for="email"--}}
{{--class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email"--}}
{{--class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--@error('email')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password"--}}
{{--class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password"--}}
{{--class="form-control @error('password') is-invalid @enderror" name="password"--}}
{{--required autocomplete="current-password">--}}

{{--@error('password')--}}
{{--<span class="invalid-feedback" role="alert">--}}
{{--<strong>{{ $message }}</strong>--}}
{{--</span>--}}
{{--@enderror--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<div class="form-check">--}}
{{--<input class="form-check-input" type="checkbox" name="remember"--}}
{{--id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--<label class="form-check-label" for="remember">--}}
{{--{{ __('Remember Me') }}--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-8 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--{{ __('Login') }}--}}
{{--</button>--}}

{{--@if (Route::has('password.request'))--}}
{{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--{{ __('Forgot Your Password?') }}--}}
{{--</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

        <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" lang="en">

<!-- landing14:04-->
<head>
    <!-- Basic need -->
    <title>Films::Login</title>
    <meta charset="UTF-8">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <link href="#" rel="profile">

    <!--Google Font-->
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' rel="stylesheet"/>
    <!-- Mobile specific meta -->
    <meta content="width=device-width, initial-scale=1" name=viewport>
    <meta content="telephone-no" name="format-detection">

    <!-- CSS files -->
    <link href="{{asset('web_files/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('web_files/css/style.css')}}" rel="stylesheet">

</head>
<body>
<!--preloading-->
<div id="preloader">
    <img alt="" class="logo" height="58" src="{{asset('web_files/images/logo1.png')}}" width="119">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>

<div class="landing-hero" style="padding-top: 50px">

    <div style="margin-bottom: 50px">
        <img alt="Logo" src="{{asset('web_files/images/logo1.png')}}">
    </div>
    <div class="container">
        <div class="login-content">
            <h3>Login</h3>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row">
                    <label for="email ">
                        Email:
                        <input id="email" name="email"
                               placeholder="Email"
                               required="required" type="email" value="{{old('email', '')}}"/>
                        @error('email')
                        <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="row">
                    <label for="password">
                        Password:
                        <input id="password" name="password"
                               placeholder="Password"
                               required="required"
                               type="password"/>
                        @error('password')
                        <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                </div>
                <div class="row">
                    <div class="remember">
                        <div>
                            <input name="remember" type="checkbox"
                                   value="Remember me" {{ old('remember') ? 'checked' : '' }}><span>Remember me</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- end of footer v3 section-->

<script src="{{asset('web_files/js/jquery.js')}}"></script>
<script src="{{asset('web_files/js/plugins.js')}}"></script>
<script src="{{asset('web_files/js/plugins2.js')}}"></script>
<script src="{{asset('web_files/js/custom.js')}}"></script>
</body>

<!-- landing14:38-->
</html>
