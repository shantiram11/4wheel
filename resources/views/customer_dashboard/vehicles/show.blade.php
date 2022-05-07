@extends('layouts.customer-dashboard')
@section('content')

    <?php
        $featured_image = $vehicle->photos->where('featured','yes')->first();
        $images = $vehicle->photos->where('featured','no');
    ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">vehicle</h1>
            </div>
            <div class="col-sm-6 text-right">
            <a href="{{route('customerVehicles.index')}}" class=""><button class="btn btn-sm bg-gradient-secondary">Back</button></a>
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
                    <div class="card-header">vehicle Details</h3>

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
                                 Company Name
                                </th>
                                <td>
                                    {{$vehicle->company_name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Fuel type
                                </th>
                                <td>
                                    {{$vehicle->fuel_type}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Brand Name
                                </th>
                                <td>
                                    {{$vehicle->brand}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   Vehicle Number plate
                                </th>
                                <td>
                                    {{$vehicle->vehicle_number}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                   Rate
                                </th>
                                <td>
                                    {{$vehicle->rate}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                 Description
                                </th>
                                <td>
                                    {{$vehicle->description}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                Location
                                </th>
                                <td>
                                    {{$vehicle->location}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Vehicle owner
                                </th>
                                <td>
                                    {{$vehicle->user->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Total seat count
                                </th>
                                <td>
                                    {{$vehicle->seat_count}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Profile Image
                                </th>
                                <td>
                                    <img class='img-fluid ks-mw-250' src="{{ asset('storage/photos/'.$featured_image->image) }}" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Images
                                </th>
                                @foreach ($images as $image)
                                    <td>
                                        <img class='img-fluid ks-mw-250' src="{{ asset('storage/photos/'.$image->image) }}" />
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>
                                    Status
                                </th>
                                <td>
                                    {{$vehicle->status}}
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
{{--                      <form class="form-horizontal poststars" action="{{route('vehicleStar', $vehicle->id)}}" id="addStar" method="POST">--}}
{{--                          @csrf--}}
{{--                          <div class="form-group required">--}}
{{--                              <div class="col-sm-12">--}}
{{--                                  <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>--}}
{{--                                  <label class="star star-5" for="star-5"></label>--}}
{{--                                  <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>--}}
{{--                                  <label class="star star-4" for="star-4"></label>--}}
{{--                                  <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>--}}
{{--                                  <label class="star star-3" for="star-3"></label>--}}
{{--                                  <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>--}}
{{--                                  <label class="star star-2" for="star-2"></label>--}}
{{--                                  <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>--}}
{{--                                  <label class="star star-1" for="star-1"></label>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                          <div class="form-group card-body required">--}}
{{--                              <div class="col-sm-12">--}}
{{--                                  <div class="d-flex justify-content-center mt-5">--}}
{{--                                      <div class="rating-card text-center mb-5">--}}
{{--                                              <h6 class="mb-0">Rate vehicle</h6>--}}
{{--                                              <div class="rating"> <input type="radio" name="star" value="5" id="5" ><label for="5">☆</label> <input type="radio" name="star" value="4" id="4"><label for="4">☆</label> <input type="radio" name="star" value="3" id="3"><label for="3">☆</label> <input type="radio" name="star" value="2" id="2"><label for="2">☆</label> <input type="radio" name="star" value="1" id="1"><label for="1">☆</label> </div>--}}
{{--                                              <div class="buttons px-4 mt-0"> <button class="btn btn-warning btn-block rating-submit">Submit</button> </div>--}}
{{--                                      </div>--}}
{{--                                  </div>--}}
{{--                              </div>--}}
{{--                          </div>--}}
{{--                      </form>--}}
                  </div>
                  <!-- /.card -->
          <!-- /.card -->

@endsection
@section('page_level_script')
                    <script>
                        $('#addStar').change('.star', function(e) {
                            $(this).submit();
                        });
                    </script>
@endsection
