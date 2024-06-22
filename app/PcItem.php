<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Rate;

class PcItem extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function PcCategory()
    {
        return $this->belongsTo('App\PcCategory');
    }
    public function getPrice()
    {
        $prices = Rate::first();
        return $this->item_price * $prices->rate_price;
       
    }
}
