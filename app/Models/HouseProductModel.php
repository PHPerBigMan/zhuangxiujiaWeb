<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HouseProductModel extends Model
{
    // 产品小区
    protected $table = 'product_house';
    const UPDATED_AT = null;

    protected $casts = [
        'lunbo' => 'array',
    ];
}