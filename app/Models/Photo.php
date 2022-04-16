<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected  $guarded = ['id'];

    const STORE_TYPE_TEMPORARY = 'temp';

    const STORE_TYPE_PERMANENT = 'perm';

    const NOT_FEATURED = 'no';

    const FEATURED = 'yes';

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Photo::class, '');
    }
    /**
     * Scope a query to only include profile photo.
     *
     * @param Builder $query
     * @return void
     */
    public function scopeProfilePhoto(Builder $query)
    {
        $query->where('featured', '=', 'no');
    }

}

