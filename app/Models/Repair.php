<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    //
    protected $fillable = [
        'detail',
        'price',
        'date_call',
        'date_do',
        'month',
        'year',
        'service_id',
        'room_id',
    ];
}
