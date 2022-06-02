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


<!--begin::Actions-->
<div class="submit-btn-row">
    <a href="{{route('dashboard.index')}}" class="btn btn-dark btn-sm me-3">Cancel</a>
    <button type="submit" class="btn btn-sm btn-primary">{{$buttonText}}</button>
</div>
<!--end::Actions-->
