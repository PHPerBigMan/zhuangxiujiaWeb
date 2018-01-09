<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'hat_city';
    public $timestamps = false;

    public function child()
    {
        return $this->hasMany('\App\Models\DistModel', 'father', 'cityID');
    }
}