
{{--@include('utils._error')--}}
{{--@dd("adsfadsf");--}}
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
                  <div class="form-group"><label for="vehicle_type">Fuel Type</label>
                      <select class="form-control form-control-solid @error('fuel_type') is-invalid @enderror" name="fuel_type">fuel_type
                          <option value="">{{ __('-- Select --') }}</option>
                          @foreach($fuel_options as $options)
                              <?php
                              if( old('fuel_type', $vehicle->fuel_type) == $options){
                                  $selected = "selected";
                              }else{
                                  $selected = '';
                              }
                              ?>
                              <option value="{{$options}}" {{ $selected }}>{{ Str::title(str_replace('_', ' ', $options)) }}</option>
                          @endforeach
                      </select>
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
                  <div class="form-group"><label for="brand">Brand</label>
                    <input type="text"
                                 class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{ old('brand', $vehicle->brand) }}">
                                 @error('brand')
                                 <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                                 @enderror
                  </div>
                  <div class="form-group"><label for="brand">Model</label>
                      <input type="text"
                             class="form-control @error('model') is-invalid @enderror" type="text" name="model" value="{{ old('model', $vehicle->model) }}">
                      @error('model')
                      <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="category">Role</label>
                      <select class="form-control @error('category_id') is-invalid @enderror" name="vehicle_type">
                          <option value="">{{ __('-- Select Role --') }}</option>
                          @foreach ($vehicle_options as $k => $v)
                              <?php
                              if (old('category_id', $vehicle->category_id) == $k) {
                                  $selected = 'selected';
                              } else {
                                  $selected = '';
                              }
                              ?>
                              <option value="{{ $k }}" {{ $selected }}>{{ ucwords($v) }}</option>
                          @endforeach
                      </select>
                      @error('category_id')
                      <span class="invalid-feedback" role="alert">
            {{ $message }}
            </span>
                      @enderror
                  </div>
                    <div class="form-group"><label for="input-images">Images</label>
                        <div class="input-images @error('product_photo') is-invalid @enderror"></div>
                        @error('vehicle_photo')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                  <div class="form-group"><label for="seat_count">Seat Count</label>
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
                      <select class="form-control  @error('active_status') is-invalid @enderror" name="active_status">
                          @foreach (\App\Models\Vehicle::STATUS as $k => $v)
                              <?php
                              if (old('status', $vehicle->active_status) == $v) {
                                  $selected = 'selected';
                              } else {
                                  $selected = '';
                              }
                              ?>
                              <option value="{{ $v }}" {{ $selected }}>{{ ucwords($v) }}</option>
                          @endforeach
                      </select>    @error('status')
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
{{--              <!-- /.card-body -->--}}

              <div class="card-footer">
                <button type="submit"
                class="btn btn-info">{{$buttonText}}</button>
              </div>
            </form>
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

