@extends('layouts.dashboard')
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
                                <div class="d-flex justify-content-space-between">
                                    <div>
                                        <i class="mdi mdi-school text-primary"></i>
                                    </div>
                                    <div class="right-col">
                                        <strong class="stat-title">Users</strong>
                                        <p class="stat-count">{{$total_users}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ks-dash-box">
                                <div class="d-flex justify-content-space-between">
                                    <div>
                                        <i class="mdi mdi-account-multiple-outline text-danger"></i>
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
                                        <i class="mdi mdi-chemical-weapon text-success"></i>
                                    </div>
                                    <div class="right-col">
                                        <strong class="stat-title">Bookings</strong>
                                        <p class="stat-count">{{$total_bookings}}</p>
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
