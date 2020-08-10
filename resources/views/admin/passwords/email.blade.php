{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Reset Password') }}</div>

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

                    <form method="POST" action="{{ route('admin.postForgot') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send OTP') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
                        <h3>Reset Password</h3>
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
                        <form method="POST" action="{{ route('admin.postForgot') }}" class="row login_form" id="contactForm">
                            @csrf

                            <div class="col-md-12 form-group">
                                <input type="text" id="phone" name="phone" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">

                                @error('phone')
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
                                <button type="submit" value="submit" class="btn btn-primary w-100 btn-login-reg">Send OTP</button>
                            </div>
                        </form>
                        
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