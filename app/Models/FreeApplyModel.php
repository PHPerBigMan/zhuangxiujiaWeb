<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FreeApplyModel extends Model
{
    // 免费申请
    use SoftDeletes;
    protected $table = 'free_apply';
    protected $dates = ['deleted_at'];
}