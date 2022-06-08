@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
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
                <div class="col-md-3 mt-4 mb-4">
                    <!-- general form elements -->
                </div>
                <div class="col-md-12">
                    <form class="form" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.settings._form',['show' => true, 'buttonText' => 'Update'])
                    </form>
                </div>
            </div>
        </div>
    </section>

                    <!-- /.card -->
@endsection
