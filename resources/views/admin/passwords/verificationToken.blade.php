{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please Verify OTP') }}</div>

                <div class="card-body">
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('admin.postVerifyToken') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    	<div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <form class="d-inline" method="POST" action="{{ route('verify') }}">
			                        @csrf
                                    <input type="hidden" name="phone" value="{{ request()->phone }}">
			                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Request another code') }}</button>.
			                    </form>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag -->
    <title>First Rays - Online Shopping in Bangladesh</title>


    {{-- css links --}}
    @include('partials.assets-link.css-links')

</head>
<body>
    <div class="overlay"></div>

    {{-- verify OTP start --}}
    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row" style="justify-content: center;">
                {{-- <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <a href="{{ url('/') }}">
                                <img src="{{asset('public/assets/images/logo-white.png')}}" style="width: 170px; margin-bottom: 100px">
                            </a>
                            <h4>New to First Rays?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="button button-account" href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>OTP Verification</h3>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('admin.postVerifyToken') }}" class="row login_form" id="contactForm">
                            @csrf

                            <div class="col-md-12 form-group">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <!-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div> -->
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn btn-primary w-100 btn-login-reg">Verify</button>
                            </div>
                        </form>
                        <div class="col-md-12 form-group">
                                <form class="d-inline" method="POST" action="{{ route('verify') }}">
                                    @csrf
                                    <input type="hidden" name="phone" value="{{ request()->phone }}">
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Request another code') }}</button>.
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- verify OTP end --}}

    {{-- javascript links --}}
    @include('partials.assets-link.js-links')
</body>
</html>