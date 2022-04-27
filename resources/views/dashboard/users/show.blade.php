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
            <a href="{{route('users.index')}}" class=""><button class="btn btn-block bg-gradient-secondary">Back</button></a>
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
                                    {{$user->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Email
                                </th>
                                <td>
                                    {{$user->email}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Role
                                </th>
                                <td>
                                    {{$user->role->label}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Created At
                                </th>
                                <td>
                                    {{$user->created_at}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Verify
                                </th>
                                <td>
                                <form action="{{route('user.verify',$user)}}" method="POST">
                                        {{ method_field('PUT') }}
                                        @csrf
                                        <select class="form-select" name="user_verified">
                                            @foreach (\App\Models\User::VERIFY as $k => $v)
                                                <?php
                                                if (old('user_verified', $user->verify) == $v) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>
                                                <option value="{{ $v }}" {{ $selected }}>{{ ucwords($v) }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">
                                            submit
                                              </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
          <!-- /.card -->
@endsection
