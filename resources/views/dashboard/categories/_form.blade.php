@csrf
{{--@if(!in_array($role->name, \App\Models\Role::ADMIN_ROLE))--}}
<div class="p-2">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $category->name) }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
        @enderror
    </div>
    {{--@endif--}}
    <div class="form-group">
        <label for="description">Description</label>
        <textarea
               class="form-control @error('description') is-invalid @enderror" rows="4" type="text" name="description" value="">{{ old('description', $category->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
                                       {{ $message }}
                                   </span>
        @enderror
    </div>
</div>
<div class="form-group mb-0">
    <button class="btn btn-primary btn-sm" type="submit">
        {{ $buttonText }}
    </button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm ml-1">Cancel</a>
</div>
