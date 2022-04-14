@extends('layouts.dashboard')
@section('content')

    <?php
        $featured_image = $vehicle->photos->where('featured','yes')->first();\

    ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">vehicle</h1>
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
                                    {{$vehicle->owner_id}}
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
                            @dd($featured_image)
                            <tr>
                                <th>
                                    Profile Image
                                </th>
                                <td>
                                    <img class='img-fluid ks-mw-250' src="{{ asset('storage/photos/'.$featured_image->image) }}" />
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
          <!-- /.card -->
            </div>
    </div>
</section>
@endsection

