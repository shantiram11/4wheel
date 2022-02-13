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
}
