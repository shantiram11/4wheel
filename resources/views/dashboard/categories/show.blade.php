@extends('layouts.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('categories.index')}}" class=""><button class="btn btn-block bg-gradient-secondary">Back</button></a>
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
                        <div class="card-header">Category Details</h3>

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
                                        Name
                                    </th>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {{$category->description}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{\App\Helpers\AppHelper::datetime_on_user_timezone($category->created_at)}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    <!-- /.card -->
                    <!-- /.card -->
@endsection
