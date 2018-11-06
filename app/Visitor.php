<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'longitude', 'latitude', 'ip_address'
    ];
}
