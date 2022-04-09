@extends('layouts.customer-dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Details</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('dashboard.index')}}" class=""><button class="btn btn-block bg-gradient-primary">Back</button></a>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('profile.changePassword')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('', $errors->all(':message')) }}
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="current_password">current password</label>
                                <input type="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">   @error('current_password')
                                <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                            </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" name="current_password" class="form-control @error('password') is-invalid @enderror">   @error('name')
                                    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">password_confirmation</label>
                                    <input type="password" name="current_password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">   @error('name')
                                    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                    @enderror
                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
@endsection
