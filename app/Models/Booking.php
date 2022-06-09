<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'book_date', 'return_date'];

    const STATUS = [
        'available',
        'reserved'
    ];
    /** ==============
     * Relations
     * =============== */
    /**
     * The roles that possess the permissions.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
    public function vehicle(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
