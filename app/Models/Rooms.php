<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
    protected $fillable = [
        'name',
        'floor',
        'water_price',
        'building_id',
        'customer_id',
        'meter_log_id',
    ];
}
