<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarrantyDetail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'warrantydetails';
    protected $fillable = [
        'warrantydetail_name', 'warrantydetail_value', 'warranty_id'
    ];
}
