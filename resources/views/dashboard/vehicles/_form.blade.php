@include('utils._error')
            <form>
                @csrf
              <div class="card-body">
                {{-- <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                    class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $vehicle->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                  </div> --}}
                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text"
                               class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ old('company_name', $vehicle->company_name) }}">
                               @error('company_name')
                               <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
                               @enderror
                </div>
                  <div class="form-group">
                      <label for="rate">Rate Per Hour </label>
                      <input type="text"
                             class="form-control @error('rate') is-invalid @enderror" type="text" name="rate" value="{{ old('rate', $vehicle->rate) }}">
                      @error('rate')
                      <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                      @enderror
                  </div>
                <div class="form-group">
                    <label for="fuel_type">Fuel Type </label>
                    <input type="text"
                                 class="form-control @error('fuel_type') is-invalid @enderror" type="text" name="fuel_type" value="{{ old('fuel_type', $vehicle->fuel_type) }}">
                                 @error('fuel_type')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="vehicle_number">Vehicle Number </label>
                    <input type="text"
                                 class="form-control @error('vehicle_number') is-invalid @enderror" type="text" name="vehicle_number" value="{{ old('vehicle_number', $vehicle->vehicle_number) }}">
                                 @error('vehicle_number')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text"
                                 class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{ old('brand', $vehicle->brand) }}">
                                 @error('brand')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                    <div class="form-group">
                        <label for="input-images">Images</label>
                        <div class="input-images @error('product_photo') is-invalid @enderror"></div>
                        @error('vehicle_photo')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="seat_count">Seat Count</label>
                    <input type="text"
                                 class="form-control @error('seat_count') is-invalid @enderror" type="text" name="seat_count" value="{{ old('seat_count', $vehicle->seat_count) }}">
                                 @error('seat_count')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">description </label>
                    <input type="text"
                                 class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description', $vehicle->description) }}">
                                 @error('description')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="location">location </label>
                    <input type="text"
                                 class="form-control @error('location') is-invalid @enderror" type="text" name="location" value="{{ old('location', $vehicle->location) }}">
                                 @error('location')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                    <label for="status">status</label>
                    <input type="text"
                                 class="form-control @error('status') is-invalid @enderror" type="text" name="status" value="{{ old('status', $vehicle->status) }}">
                                 @error('status')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group">
                      <!--begin::Col-->

                          <label class="required fs-6 fw-bold mb-2" for="file">
                              Profile Image
                          </label>
                          <input type="hidden" name="image_hidden_value" class="image_hidden_value"
                                 value="{{ old('image', $vehicle->image) }}">

                          <input type="file" name="featured_image" onchange="loadPreview(this);"
                                 class="form-control form-control-solid @error('image') is-invalid @enderror" id="image"
                                 value="{{ old('image', $vehicle->image) }}" />
                          <div class="kt_preview_image_container {{ empty($vehicle->image) ? 'd-none' : '' }}">
                              <img id="kt_preview_img"
                                   src="{{ empty($vehicle->image) ? '' : asset('public/uploads/vehicles/' . $vehicle->image) }}"
                                   class="img-fluid " />
                              <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
                          </div>
                          @error('image')
                          <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                          @enderror
                      <!--end::Col-->
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"
                class="btn btn-info">{{$buttonText}}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
@section('page_level_script')
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                $('.kt_preview_image_container').removeClass('d-none');
            });
        });
        $(function(){
            $('.input-images').imageUploader();
        });
    </script>
@endsection

