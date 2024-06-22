<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PcCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pcItems()
    {
        return $this->hasMany('App\PcItem');
    }
}
