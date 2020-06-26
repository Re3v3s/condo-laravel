<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juristics extends Model
{
    //
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'aumphur',
        'district',
        'province',
        'postcode',
        'phone',
        'birthdate',
        'idcard'
    ];
}
