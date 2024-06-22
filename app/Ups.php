<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $fillable =[
        'product_name','service','image'
    ];
}
