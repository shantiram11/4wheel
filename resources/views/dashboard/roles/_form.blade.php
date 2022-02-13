@csrf
@if(!in_array($role->name, \App\Models\Role::ADMIN_ROLE))
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $role->name) }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
        @enderror
    </div>
@endif
<div class="form-group">
    <label for="name">Description</label>
    <input type="text"
           class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old('description', $role->description) }}">
    @error('description')
    <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
    @enderror
</div>

<div class="card">
    <div class="card-title px-2 bg-soft-warning rounded">
        <h4>Permissions</h4>
    </div>
    <div class="card-body">
        <?php $i=0; ?>

        @foreach($permissions as $pk => $pv)
            <div class="col-lg-12">
                <div class="card individual-permission">
                    <div class="card-title">
                        <strong>{{$pk}}</strong>
                    </div>
                    <div class="card-body pb-0 bg-soft-primary rounded">
                        <div class="row">
                            @foreach($pv as $pvk => $pvv)
                                <div class="col-md-3 {{ (count($pv) === 1)?'':'mx-auto' }}">
                                    <div class="form-group">

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input name="permissions[]" type="checkbox" value="{{$pvv['id']}}" id="{{$pvv['name']}}" {{(in_array($pvv['id'],$role_permission))?'checked':''}} />
                                            <label class="form-check-label" for="{{$pvv['name']}}">
                                                {{$pvv['label']}}
                                            </label>
                                        </div>

                                        {{--                                <div class="checkbox checkbox-circle">--}}
                                        {{--                                    <input name="permissions[]" id="{{$pvv['id']}}" type="checkbox"--}}
                                        {{--                                        {{(in_array($pvv['id'],$role_permission))?'checked':''}} value="{{$pvv['id']}}">--}}
                                        {{--                                    <label for="{{$pvv['id']}}">--}}
                                        {{--                                        {{$pvv['label']}}--}}
                                        {{--                                    </label>--}}
                                        {{--                                </div>--}}

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="form-group mb-0">
    <button class="btn btn-primary btn-sm" type="submit">
        {{ $buttonText }}
    </button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm ml-1">Cancel</a>
</div>
