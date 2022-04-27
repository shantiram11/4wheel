@include('utils._error')
<form>
    @csrf
    <div class="card-body">
        {{-- <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
            class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div> --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="fuel_type">Email</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
            @enderror
        </div>
        @if($buttonText == 'Create')
        <div class="form-group">
            <label for="password">password </label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password', $user->password) }}">
            @error('user_number')
            <span class="invalid-feedback" role="alert">
                                     {{ $message }}
                                 </span>
            @enderror
        </div>
        @endif

         <div class="form-group">
          <label for="role">Role</label>
          <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
            <option value="">{{ __('-- Select Role --') }}</option>
            @foreach ($roles as $k => $v)
                <?php
                  if (old('role_id', $user->role_id) == $k) {
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
        </div>


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

