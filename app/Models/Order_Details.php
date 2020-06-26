<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    //
    protected $fillable = [
        'amount',
        'price',
        'total',
        'service_id',
        'order_id'
    ];
}
