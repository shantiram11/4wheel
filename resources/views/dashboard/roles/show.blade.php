@extends('layouts.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('roles.index')}}" class=""><button class="btn btn-block bg-gradient-secondary">Back</button></a>
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
                        <div class="card-header">User Details</h3>

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
                                        {{$role->label}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {{$role->description}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Created At
                                    </th>
                                    <td>
                                        {{\App\Helpers\AppHelper::datetime_on_user_timezone($role->created_at)}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card">
                            <div class="card-header pt-6">
                                <div class="card-title">
                                    <h3>Permissions</h3>
                                </div>
                            </div>
                            <br>
                            <div class="card-body">
                                <?php $i = 0; ?>
                                @foreach($permissions as $pk => $pv)
                                    <div class="col-lg-12">
                                        <div class="card individual-permission">
                                            <div class="card-title">
                                                <strong>{{$pk}}</strong>
                                            </div>
                                            <div class="card-body pb-0 bg-soft-primary rounded">
                                                <div class="row">
                                                    @foreach($pv as $pvk => $pvv)
                                                        <div class="col-md-3 {{ (count($pv) === 1)?'':'mx-auto' }}">
                                                            <div class="form-group">

                                                                <div class="form-check form-check-custom form-check-solid">
                                                                    <input name="permissions[]" type="checkbox" value="{{$pvv['id']}}" id="{{$pvv['name']}}" {{(in_array($pvv['id'],$role_permission))?'checked':''}} disabled />
                                                                    <label class="form-check-label" for="{{$pvv['name']}}">
                                                                        {{$pvv['label']}}
                                                                    </label>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
@endsection
