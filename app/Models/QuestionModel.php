<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    // 问题
    protected $table = 'user_question';
    const UPDATED_AT = null;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getAnswerAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}