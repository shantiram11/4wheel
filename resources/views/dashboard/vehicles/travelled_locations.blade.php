@extends('layouts.dashboard')
@section('content')
    <style>
        .map-container{
            height: 400px;
            position: relative;
        }
        #map_canvas {
            height: 100%;
            width: 100%;
        }

    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Vehicle</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('vehicles.index')}}" class=""><button class="btn btn-block bg-gradient-secondary">Back</button></a>
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
                        <div class="card-header"><h3>Travelled Route</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">


                            <div class="map-container my-3">
                                <div id="map_canvas"></div>
                            </div>



                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
@section('page_level_script')
    <script>
        // function initMap() {
        //     console.log('zz');
        //     const map = new google.maps.Map(document.getElementById("map"), {
        //         zoom: 3,
        //         center: { lat: 0, lng: -180 },
        //         mapTypeId: "terrain",
        //     });
        //     const vehiclePathCoordinates = [
        //         { lat: 37.772, lng: -122.214 },
        //         { lat: 21.291, lng: -157.821 },
        //         { lat: -18.142, lng: 178.431 },
        //         { lat: -27.467, lng: 153.027 },
        //     ];
        //     const vehiclePath = new google.maps.Polyline({
        //         path: vehiclePathCoordinates,
        //         geodesic: true,
        //         strokeColor: "#FF0000",
        //         strokeOpacity: 1.0,
        //         strokeWeight: 2,
        //     });
        //
        //     vehiclePath.setMap(map);
        // }
        // window.initMap = initMap;


        var geocoder;
        var map;
        var marker;
        var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 50)
        });
        function initialize() {
            var latlng = new google.maps.LatLng(26.66666670, 87.28333330);
            const map = new google.maps.Map(document.getElementById("map_canvas"), {
                zoom: 12,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            });
            // const vehiclePathCoordinates = [
            //     { lat: 26.663552, lng: 87.273414 },
            //     { lat: 26.643884, lng: 87.275220 },
            //     { lat: 26.630995, lng: 87.273503 },
            //     { lat: 26.607883, lng: 87.275039 },
            // ];
            const vehiclePathCoordinates = {!! json_encode($locations) !!};
            const vehiclePath = new google.maps.Polyline({
                path: vehiclePathCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
                icons: [{
                    icon: {path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW},
                    offset: '100%',
                    repeat: '40px'
                }]
            });

            vehiclePath.setMap(map);
            vehiclePath.push(polyline);
        }
        google.maps.event.addDomListener(window, "load", initialize);

    </script>
@endsection

