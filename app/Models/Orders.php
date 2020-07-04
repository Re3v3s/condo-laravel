<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = [
        'total_price',
        'order_date',
        'status',
        'payment_at',
        'month',
        'year',
        'description',
        'room_id',
        'customer_id',
        'juristic_id',
        'user_id',
        'meter_log_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
}
