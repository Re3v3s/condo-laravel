<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterLogs extends Model
{
    //
    protected $fillable = [
        'description',
        'meter_current'
    ];

}
