@extends('layouts.auth')
@section('content')
    {{-- //@include('utils._error') --}}

    <body class="layout-login">

        <div class="layout-login__overlay"></div>
        <div class="layout-login__form bg-white" data-perfect-scrollbar>
            <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
                {{-- <img class="navbar-brand-icon" src="assets/images/stack-logo-blue.svg" width="25" alt="FlowDash"> --}}
                <a href="{{ route('front.index') }}" class="navbar-brand" style="min-width: 0"> <span>4Wheel</span></a>
            </div>

            <h4 class="m-0">Sign up!</h4>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label class="text-label" for="name_2">Name:</label>
                    <div class="input-group input-group-merge">
                        <input name="name" id="name" type="text" required=""
                            class="form-control form-control-prepended @error('email') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="off" autofocus="false" placeholder="Enter Your Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{-- <span class="far fa-user"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="email">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input name="email" id="email" type="email" required=""
                            class="form-control form-control-prepended  @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="off" autofocus="false"
                            placeholder="Example@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{-- <span class="far fa-envelope"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password">Password:</label>
                    <div class="input-group input-group-merge">
                        <input name="password" id="password" type="password" required=""
                            class="form-control form-control-prepended @error('password') is-invalid @enderror"
                            name="password" value="{{ old('email') }}" autocomplete="off" autofocus="false"
                            placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{-- <span class="far fa-key"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label name="password_confirmation" class="text-label" for="password">Confirm Password:</label>
                    <div class="input-group input-group-merge">
                        <input name="password_confirmation" id="password_confirmation" type="password" required=""
                            class="form-control form-control-prepended  @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="off"
                            autofocus="false" placeholder="Confirm your password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{-- <span class="far fa-key"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" checked="" class="custom-control-input" id="terms" />
                        <label class="custom-control-label" for="terms">I accept <a href="#">Terms and
                                Conditions</a></label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary mb-2" type="submit">Create Account</button><br>
                    <a class="text-body text-underline" href="{{ route('login') }}">Have an account? Login</a>
                </div>
            </form>
        </div>
    </body>
@endsection
