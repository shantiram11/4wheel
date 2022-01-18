
<div class="container page__container">

    <div class="card card-form">
        <div class="row no-gutters">
            {{-- <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Default Forms</strong></p>
                <p class="text-muted">FlowDash supports all of Bootstrap's default form styling in addition to a handful of new input types and features. Please <a href="https://getbootstrap.com/docs/4.1/components/forms/"
                       target="_blank">read the official documentation</a> for a full list of options from Bootstrap's core library.</p>
            </div> --}}
            <div class="col-lg-8 card-form__body card-body">
                <form>
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
                        <label for="email">Email:</label>
                        <input type="text"
                               class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email', $user->email) }}">
                               @error('email')
                               <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
                               @enderror
                    </div>
                    <div class="form-group">
                <label for="role-id">Select Role</label>
                <select class="form-select @error('role_id') is-invalid @enderror" name="role_id">
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
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text"
                               class="form-control @error('password') is-invalid @enderror" type="text" name="password">
                               @error('password')
                               <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
                               @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-verification">Password confirmation</label>
                        <input type="text"
                               class="form-control @error('password-confirmation') is-invalid @enderror" type="text" password-verification="password-verification">
                               @error('password-confirmation')
                               <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
                               @enderror
                    </div>
                    <button type="submit"
                            class="btn btn-info">{{$buttonText}}</button>
                </form>
            </div>
        </div>
    </div>
