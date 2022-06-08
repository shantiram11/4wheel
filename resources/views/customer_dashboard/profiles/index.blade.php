@extends('layouts.customer-dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('customer-dashboard.index')}}" class=""><button class="btn btn-sm bg-gradient-primary">Back</button></a>
                    <a href="{{route('customer-profile.changePassword')}}" class=""><button class="btn btn-sm btn btn-secondary">Change Password</button></a>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary" style="padding: 20px;">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('customer-profile.store')}}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('', $errors->all(':message')) }}
                                </div>
                            @endif
                            @csrf
                            <div class="form-group mt-4">
                                <label for="name">Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                                <div class="form-group">
                                    <!--begin::Col-->

                                    <label class="required fs-6 fw-bold mb-2" for="file">
                                        Profile Image
                                    </label>
                                    <input type="hidden" name="image_hidden_value" class="image_hidden_value"
                                           value="{{ old('current_image', $user->current_image) }}">

                                    <input type="file" name="current_image" onchange="loadPreview(this);"
                                           class="form-control form-control-solid @error('current_image') is-invalid @enderror" id="current_image"
                                           value="{{ old('current_image', $user->current_image) }}" />
                                    <div class="kt_preview_image_container {{ empty($user->current_image) ? 'd-none' : '' }}">
                                        <img id="kt_preview_img"
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
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.card -->
@endsection
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
