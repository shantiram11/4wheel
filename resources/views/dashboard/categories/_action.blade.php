<a href="{{ route('categories.show', $r->id) }}" class="btn btn-sm btn-icon btn-light-facebook" title="{{ __('Show') }}"><i class="fas fa-eye"></i></a>
<a href="{{ route('categories.edit', $r->id) }}" class="btn btn-icon btn-light-primary btn-sm ml-1p" title="{{ __('Update') }}"><i class="fas fa-pencil-alt"></i></a>
<button class="btn btn-icon btn-light-youtube btn-sm ml-1p" onclick="confirmDelete(() => {deleteCategory({{$r->id}})})" title="{{ __('Destroy') }}"><i class="fas fa-trash"></i></button>

