<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $fillable = [
        'contact_no',
        'create_date',
        'end_date',
        'price',
        'earnest',
        'status',
        'confirm_at',
        'cancel_at',
        'room_id',
        'type_id',
        'customer_id',
        'user_id',
        'building_id',
    ];
}
