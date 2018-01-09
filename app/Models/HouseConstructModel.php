<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseConstructModel extends Model
{
    // 施工小区
    protected $table = 'construction';
    const UPDATED_AT = null;

    protected $casts = [
        'lunbo' => 'array',
    ];

    protected $appends = ['status_text'];

    public function getStatusTextAttribute()
    {
        $res = '';
        switch ($this->attributes['status']) {
            case 0:
                $res = '开工';
                break;
            case 1:
                $res = '水电';
                break;
            case 2:
                $res = '泥木';
                break;
            case 3:
                $res = '油木';
                break;
            case 4:
                $res = '竣工';
                break;

        }

        return $res;
    }
}