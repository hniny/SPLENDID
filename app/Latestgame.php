<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Latestgame extends Model
{
    use SoftDeletes;
    protected $fillable = ['product_name','product_image','bg_image',
'desp','price','spec1','spec1_desp','spec2','spec2_desp','spec3','spec3_desp','spec4','spec4_desp'];
    protected $dates = ['deleted_at'];
}
