<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function submenu()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id')->orderBy('sorting_no','desc');
    }
}
