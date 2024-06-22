<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Benefit extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'card1', 'card2', 'description'];
    protected $dates = ['deleted_at'];
}
