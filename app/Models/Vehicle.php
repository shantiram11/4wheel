<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_name',
        'fuel_type',
        'vehicle_number',
        'brand',
        'model',
        'rate',
        'seat_count',
        'description',
        'location',
        'status',
        'owner_id'
    ];



    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(users::class, '');
    }

    public function featured_photo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Photo::class, 'vehicle_id', 'id')->where(function($q){
            $q->where('featured', 'yes');
        });
    }
    public function photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Photo::class, 'vehicle_id', 'id');
    }

}
