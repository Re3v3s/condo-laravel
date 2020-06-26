<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meter_Log_Detail extends Model
{
    //
    protected $fillable = [
        'old_number',
        'new_number',
        'date_check',
        'price_water',
        'month',
        'year',
        'meter_log_id'
    ];
}
