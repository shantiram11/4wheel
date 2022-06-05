@extends('layouts.customer-dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documents</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('customer-dashboard.index')}}" class=""><button class="btn btn-sm bg-gradient-secondary">Back</button></a>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.card-header -->
            <!-- form start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><p><b>Your Documents</b></p>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <th>
                                        Identity Front
                                    </th>
                                        <td>
                                            <img class='img-fluid ks-mw-250' src="{{ asset('storage/uploads/users/'.$user->identity_front) }}" />
                                        </td>
                                </tr>
                                <tr>
                                    <th>
                                        Identity Back
                                    </th>
                                    <td>
                                        <img class='img-fluid ks-mw-250' src="{{ asset('storage/uploads/users/'.$user->identity_back) }}" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->

                    @endsection
                    @section('page_level_script')
                        <script>

                        </script>
@endsection
