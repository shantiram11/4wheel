@can('view',\App\Models\Photo::class)
    <a href="{{ route('photos.show', $r->id) }}" class="btn btn-sm btn-icon btn-light-facebook" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
@endcan

@can('update',\App\Models\Photo::class)
    <a href="{{ route('photos.edit', $r->id) }}" class="btn btn-icon btn-light-primary btn-sm ml-1p" title="{{ __('Update') }}"><i class="fas fa-pencil-alt"></i></a>
@endcan

@can('destroy',\App\Models\Photo::class)
    <button class="btn btn-icon btn-light-youtube btn-sm ml-1p" onclick="confirmDelete(() => {deleteVehicle({{$r->id}})})"  title="{{ __('Destroy') }}"><i class="fas fa-trash"></i></button>
@endcan

