<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

//    //Illuminate\Database\Query\Builder
//    public function latest($column = 'created_at')
//    {
//        return $this->orderBy($column, 'desc');
//    }

}
