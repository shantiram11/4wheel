@extends('layouts.dashboard')
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
                <div class="col-sm-3">
                    <a href="{{route('profile.changePassword')}}" class=""><button class="btn btn-block btn btn-secondary">Change Password</button></a>
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
                    <div class="card card-primary" style="padding: 20px;">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('profile.store')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('', $errors->all(':message')) }}
                                </div>
                            @endif
                            @csrf
                            <div class="form-group mt-4">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
@endsection
