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
                                        <i class="fas fa-users" style="font-size:100px"></i>
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
                                        <i class="fas fa-car-side" style="font-size: 100px"></i>
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
                                        <i class="fas fa-calendar-check" style="font-size: 100px"></i>
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
                <div class="card mt-5">
                    <div class="card-header">
                        <h6>Total number vehicles category wise</h6>
                    </div>

                    <canvas id="barChart"></canvas>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    <script>
        $(function(){
            var ctx = document.getElementById("barChart").getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($categories) !!},
                    datasets: [{
                        // label: 'students',
                        data: {!! json_encode($vehicles_count_arr) !!},
                        backgroundColor: dynamicColors,
                        barThickness: 35,
                        // maxBarThickness: 8,
                    }]
                },
                options: {
                    plugins:{
                        legend: {
                            display: false
                        },
                    },
                }
            });
        });
        function dynamicColors() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgba(" + r + "," + g + "," + b + ", 0.5)";
        }
    </script>
@endsection
