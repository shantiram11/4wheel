@extends('layouts.customer-dashboard')
@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bookings</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('customer-bookings.index')}}" class=""><button class="btn btn-sm bg-gradient-secondary">Back</button></a>
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
                        <div class="card-header">Booking Details</h3>

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
                                       Book date
                                    </th>
                                    <td>
                                        {{$booking->book_date}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Return Date
                                    </th>
                                    <td>
                                        {{$booking->return_date}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Pickup Location
                                    </th>
                                    <td>
                                        {{$booking->pickup_location}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Return Location
                                    </th>
                                    <td>
                                        {{$booking->return_location}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Transaction Id
                                    </th>
                                    <td>
                                        {{$booking->transaction_id}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Total Cost
                                    </th>
                                    <td>
                                        {{$booking->total_cost}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                       Duration
                                    </th>
                                    <td>
                                        {{$booking->duration}} Days
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Vehicle owner
                                    </th>
                                    <td>
                                        {{$booking->vehicle->user->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                      Booked By
                                    </th>
                                    <td>
                                        {{$booking->user->name}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

