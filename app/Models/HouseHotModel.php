<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseHotModel extends Model
{
    // 热装小区
    protected $table = 'charging';
    const UPDATED_AT = null;

    protected $casts = [
        'lunbo' => 'array',
    ];
}