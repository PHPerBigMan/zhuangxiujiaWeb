<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseCaseModel extends Model
{
    // 案例小区
    protected $table = 'web_anli';
    const UPDATED_AT = null;

    protected $casts = [
        'lunbo' => 'array',
    ];

    public function categoryType()
    {
        return $this->belongsTo('App\Models\CaseCategoryModel', 'hx');
    }

    public function categoryMeasure()
    {
        return $this->belongsTo('App\Models\CaseCategoryModel', 'measure');
    }

    public function getTypeTextAttribute()
    {
        return $this->categoryType()->first()->cat_name;
    }

    public function getMeasureTextAttribute()
    {
        return $this->categoryMeasure()->first()->cat_name;
    }
}