<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    protected $table = 'hat_province';
    public $timestamps = false;

    public function child()
    {
        return $this->hasMany('\App\Models\CityModel', 'father', 'provinceID');
    }
}