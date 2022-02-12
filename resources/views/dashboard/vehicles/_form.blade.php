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
                        @error('product_photo')
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

                {{-- <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                    <option value="">{{ __('-- Select Role --') }}</option>
                    @foreach ($roles as $k => $v)
                        <?php
                        if (old('role_id', $vehicle->role_id) == $k) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        ?>
                        <option value="{{ $k }}" {{ $selected }}>{{ ucwords($v) }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <span class="invalid-feedback" role="alert">
                {{ $message }}
                </span>
                @enderror
                </div> --}}


                {{-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit"
                class="btn btn-info">{{$buttonText}}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

