@extends('layouts.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Roles</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('roles.index')}}" class=""><button class="btn btn-block bg-gradient-primary">Back</button></a>
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
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form" action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('dashboard.roles._form',['show' => true, 'buttonText' => 'Create'])
                        </form>
                    </div>
                    <!-- /.card -->
@endsection
