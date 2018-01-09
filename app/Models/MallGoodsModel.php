<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MallGoodsModel extends Model
{
    // 商城商品
    protected $table = 'product';
    const UPDATED_AT = null;

    // 关联分类
    public function firstCate()
    {
        return $this->belongsTo('App\Models\MallCategoryModel', 'pro_cat', 'id');
    }
}