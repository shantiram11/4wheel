@csrf
<!--begin::Input group-->
 @if($errors->any())
<div class="alert alert-danger">
    {{ implode('', $errors->all(':message')) }}
</div>
@endif

<?php
$all_settings = [];
$keys_arr = $settings->pluck('key_name');
foreach($keys_arr as $k => $v){
    $row = $settings->where('key_name',$v)->first();
    if(empty($row)){
        $all_settings[$v] = null;
    }else{
        $all_settings[$v] = $row->key_value;
    }
}
?>

<div class="form-group">
    <label for="app_name">App Name</label>
    <input type="text"
           class="form-control @error('app_name') is-invalid @enderror" type="text" name="app_name" value="{{ old('app_name', $all_settings['app_name']) }}">
    @error('app_name')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="admin_email">Admin Email</label>
    <input type="text"
           class="form-control @error('admin_email') is-invalid @enderror" type="text" name="admin_email" value="{{ old('admin_email', $all_settings['admin_email']) }}">
    @error('admin_email')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="admin_email">Admin Email</label>
    <input type="text"
           class="form-control @error('admin_email') is-invalid @enderror" type="text" name="admin_email" value="{{ old('admin_email', $all_settings['admin_email']) }}">
    @error('admin_email')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="app_environment">
        <span>App Environment</span>
        <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip"
           title="Please select app environment from the list"></i></label>
    <select id="app_environment" class="form-control form-control-solid @error('app_environment') is-invalid @enderror"
            name="app_environment">
        <option value="">{{ __('-- Select --') }}</option>
        @foreach($app_environments as $app_environment)
            <?php
            if( old('app_environment', $all_settings['app_environment']) == $app_environment ? 'selected' : '' ){
                $selected = "selected";
            }else{
                $selected = '';
            }
            ?>
            <option value="{{$app_environment}}" {{ $selected }}>{{ ucwords($app_environment) }}</option>
        @endforeach
    </select>  @error('admin_email')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="stripe_test_publishable_key">Stripe test publishable key</label>
    <input type="text"
           class="form-control @error('stripe_test_publishable_key') is-invalid @enderror" type="text" name="stripe_test_publishable_key" value="{{ old('stripe_test_publishable_key', $all_settings['stripe_test_publishable_key']) }}">
    @error('stripe_test_publishable_key')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>


<div class="form-group">
    <label for="stripe_test_secret_key">Stripe test secret key</label>
    <input type="text"
           class="form-control @error('stripe_test_secret_key') is-invalid @enderror" type="text" name="stripe_test_secret_key" value="{{ old('stripe_test_secret_key', $all_settings['stripe_test_secret_key']) }}">
    @error('stripe_test_secret_key')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="stripe_live_publishable_key">Stripe live publishable key</label>
    <input type="text"
           class="form-control @error('stripe_live_publishable_key') is-invalid @enderror" type="text" name="stripe_live_publishable_key" value="{{ old('stripe_live_publishable_key', $all_settings['stripe_live_publishable_key']) }}">
    @error('stripe_live_publishable_key')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="stripe_live_secret_key">Stripe live secret key</label>
    <input type="text"
           class="form-control @error('stripe_live_secret_key') is-invalid @enderror" type="text" name="stripe_live_secret_key" value="{{ old('stripe_live_secret_key', $all_settings['stripe_live_secret_key']) }}">
    @error('stripe_live_secret_key')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="app_logo">
        App Logo
    </label>
    <input type="file" name="app_logo" onchange="loadPreview(this);"
           class="form-control form-control-solid @error('app_logo') is-invalid @enderror" id="app_logo"
           value="{{ old('app_logo', $all_settings['app_logo']) }}" />
    <div class="kt_preview_image_container {{(empty($all_settings['app_logo']))?'d-none':''}}">
        <img id="kt_preview_img" src="{{(empty($all_settings['app_logo']))?'':asset('storage/uploads/settings/'.$all_settings['app_logo'])}}"
             class="img-fluid " />
        <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
    </div>
    @error('app_logo')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>
<div class="form-group">
    <label for="app_logo_white">
        App Logo
    </label>
    <input type="file" name="app_logo_white" onchange="loadPreview(this);"
           class="form-control form-control-solid @error('app_logo_white') is-invalid @enderror" id="app_logo_white"
           value="{{ old('app_logo_white', $all_settings['app_logo_white']) }}" />
    <div class="kt_preview_image_container {{(empty($all_settings['app_logo_white']))?'d-none':''}}">
        <img id="kt_preview_img" src="{{(empty($all_settings['app_logo_white']))?'':asset('storage/uploads/settings/'.$all_settings['app_logo_white'])}}"
             class="img-fluid " />
        <a href="!#" class="kt_preview_image_close"><i class="fas fa-times"></i></a>
    </div>
    @error('app_logo_white')
    <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
    @enderror
</div>

<!--begin::Actions-->
<div class="submit-btn-row">
    <a href="{{route('dashboard.index')}}" class="btn btn-dark btn-sm me-3">Cancel</a>
    <button type="submit" class="btn btn-sm btn-primary">{{$buttonText}}</button>
</div>
<!--end::Actions-->
