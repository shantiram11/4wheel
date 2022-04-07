@include('utils._error')
@extends('layouts.auth')
@section('content')
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ route('front.index') }}" class="h1"><b>4</b>Wheel</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register a new membership</p>

          <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name ="name" class="form-control" placeholder="Full name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
                      <!--begin::Col-->

                          <label class="required fs-6 fw-bold mb-2" for="file">
                              Current Image
                          </label>
                          <input type="file" name="current_image" onchange="loadPreview(this,'#kt_preview_img_0');"
                                 class="form-control form-control-solid @error('image') is-invalid @enderror"
                                />
                          <div class="kt_preview_image_container {{ empty($user->image) ? 'd-none' : '' }}">
                              <img id="kt_preview_img_0"
                                   src="{{ empty($user->current_image) ? '' : asset('public/uploads/users/' . $user->current_image) }}"
                                   class="img-fluid " />
                              <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
                          </div>
                          @error('current_image')
                          <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                          @enderror
                      <!--end::Col-->
                  </div>
          
            <div class="form-group">
                      <!--begin::Col-->

                          <label class="required fs-6 fw-bold mb-2" for="file">
                            Identity Front Image
                          </label>
                          <input type="file" name="identity_front" onchange="loadPreview(this,'#kt_preview_img');"
                                 class="form-control form-control-solid @error('image') is-invalid @enderror"
                                />
                          <div class="kt_preview_image_container {{ empty($user->identity_front) ? 'd-none' : '' }}">
                              <img id="kt_preview_img"
                                   src="{{ empty($user->identity_front) ? '' : asset('public/uploads/users/' . $user->identity_front) }}"
                                   class="img-fluid " />
                              <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
                          </div>
                          @error('identity_front')
                          <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                          @enderror
                      <!--end::Col-->
                  </div>
      
            <div class="form-group">
                      <!--begin::Col-->

                          <label class="required fs-6 fw-bold mb-2" for="file">
                            Identity Back Image
                          </label>
                          <input type="file" name="identity_back" onchange="loadPreview(this, '#kt_preview_img_1');"
                                 class="form-control form-control-solid @error('image') is-invalid @enderror"
                                />
                          <div class="kt_preview_image_container {{ empty($user->identity_front) ? 'd-none' : '' }}">
                              <img id="kt_preview_img_1"
                                   src="{{ empty($user->identity_back) ? '' : asset('public/uploads/users/' . $user->identity_back) }}"
                                   class="img-fluid " />
                              <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
                          </div>
                          @error('identity_back')
                          <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                          @enderror
                      <!--end::Col-->
                  </div>
            
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                  <label for="agreeTerms">
                   I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <a href="{{route('login')}}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
@section('page_level_script')
<script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function() {
                $('.galaxy_image_container').removeClass('d-none');
            });
        });
</script>
@endsection
