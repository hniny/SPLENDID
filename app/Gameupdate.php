<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gameupdate extends Model
{
    use SoftDeletes;
    protected $table = 'game_updates';
    protected $fillable = ['title','game_resource','image','soon','playform1','playform2','playform3','genre','description'];
    protected $dates = ['deleted_at'];
}
