<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    const   VEHICLE_OPTIONS = [ 'car', 'jeep', 'bike','van'];
    const   FUEL_OPTIONS = [ 'hybrid', 'petrol', 'electric','diesel'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];



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
    public function rating(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
