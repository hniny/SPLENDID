<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
