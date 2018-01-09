<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    // 文章
    protected $table = 'zl';
    public $timestamps = false;

    protected $casts = [
        'zl_pic' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ArticleCategoryModel', 'zl_cat');
    }
}