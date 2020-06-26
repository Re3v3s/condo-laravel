<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
   protected $fillable = [
       'name',
       'detail',
       'address',
       'amphur',
       'district',
       'province',
       'postcode',
       'phone',
       'juristic_id',
    ];
}
