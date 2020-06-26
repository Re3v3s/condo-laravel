<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $fillable = [
        'firstname',
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
