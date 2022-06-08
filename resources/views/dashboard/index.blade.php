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
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <i class="fas fa-users text-danger" style="font-size:100px"></i>
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
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <i class="fas fa-car-side text-success" style="font-size: 100px"></i>
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
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <i class="fas fa-calendar-check text-info" style="font-size: 100px"></i>
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
                <div class="card mt-5 px-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold">Total number vehicles category wise</h6>
                    </div>
                    <canvas id="barChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('page_level_script')
    <script>
        $(function() {
            let vehicleCategories = {!! json_encode(array_keys($vehicleCountByCategories)) !!};
            let vehicleCounts = {!! json_encode(array_values($vehicleCountByCategories)) !!};
            console.log(vehicleCategories);
            console.log(vehicleCounts);

            var ctx = document.getElementById("barChart2").getContext('2d');
            var barChart2 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: vehicleCategories,
                    datasets: [{
                        label: 'Total number vehicles category wise',
                        data: vehicleCounts,
                        backgroundColor: dynamicColors,
                        barThickness: 35,
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
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
