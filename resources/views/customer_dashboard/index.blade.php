@extends('layouts.customer-dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="gx-header-row">
                        <div class="card-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="ks-dash-box">
                                <div class="d-flex justify-content-space-between" style="justify-content: space-between;">
                                    <div>
                                        <i class="fas fa-toolbox text-success" style="font-size:100px"></i>
                                    </div>
                                    <div class="right-col">
                                        <strong class="stat-title">Bookings</strong>
                                        <p class="stat-count">{{$total_bookings}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ks-dash-box">
                                <div class="d-flex justify-content-space-between">
                                    <div>
                                        <i class="fas fa-car-side text-danger" style="font-size: 100px"></i>
                                    </div>
                                    <div class="right-col">
                                        <strong class="stat-title">vehicles</strong>
                                        <p class="stat-count">{{$total_vehicles}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="ks-dash-box">
                                <div class="d-flex justify-content-space-between">
                                    <div>
                                        <i class="fas fa-comment-dollar text-info" style="font-size: 100px"></i>
                                    </div>
                                    <div class="right-col">
                                        <strong class="stat-title">Total Earnings</strong>
                                        <p class="stat-count">{{$total_earning}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

