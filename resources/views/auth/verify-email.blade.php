
@extends('layouts.auth')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ route('front.index') }}" class="h1"><b>4</b>Wheel</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">You're just a step behind your registration!!!</p>

          <form class="form w-100" novalidate="novalidate" method="POST" action="{{route('verification.send')}}">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Status-->
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <!--end::Status-->
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Verify Email</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">
                    <p>
                        You must verify your email. Please check your inbox to verify it.
                    </p>
                    <p>
                        Haven't received a mail?
                    </p>
                </div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Action-->
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                    <span class="indicator-label">Resend</span>
{{--                            <span class="indicator-progress">Please wait...--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>--}}
{{--                            </span>--}}
                </button>
            </div>
            <!--end::Action-->
        </form>
          <p class="mb-4 mt-4">
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
    @endsection
