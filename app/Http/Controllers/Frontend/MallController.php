<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Utils\LoadMoreList;
use Illuminate\Http\Request;
use App\Models\MallCategoryModel;
use App\Models\BannerModel;
class MallController extends Controller
{
    // 分类
    public static function category()
    {
        $allCategory = MallCategoryModel::get();
        $firstCategory = collect([]);
        $secondCategory = collect([]);
        $allCategory->each(function ($item) use ($firstCategory, $secondCategory) {
            if ($item->level == 1) {
                $firstCategory->push($item);
            } else if ($item->level == 2) {
                $secondCategory->push($item);
            }
        });

        $firstCategory->each(function ($item) use ($secondCategory) {
            $item->child = $secondCategory->filter(function ($item_2) use ($item) {
                return $item_2->p_id == $item->id;
            });
        });
        return $firstCategory;
    }

    // 商品列表
    public function MallGoodsList(Request $request)
    {
        $first = $request->first;
        $second = $request->second;
        $page = $request->page;
        $tinyBanner = BannerModel::where('type', 'listadd')->first();
        $query = \App\Models\MallGoodsModel::query();
        if ($first && preg_match("/^\d+$/", $first)) {
            $query->where('pro_first', $first);
        }

        if ($second && preg_match("/^\d+$/", $second)) {
            $query->where('pro_cat', $second);
        }

        $data = LoadMoreList::loadMoreList($query, $page);
        $category = $this->category();
        $link = '/mall-goods';
        return view("pc.pages.list.MallGoodsList", compact('data','tinyBanner', 'category', 'first', 'second', 'link'));
    }

    // 材料列表
    public function MallMaterialList(Request $request)
    {
        $type = $request->type;
        $page = $request->page;
        $query = \App\Models\MallGoodsModel::query();
        $tinyBanner = BannerModel::where('type', 'listadd')->first();
        if ($type == 'soft') {
            $mainTit = '软装配饰';
            $subTit = 'Soft display';
            $query->where('pro_first', 9998);
        } else {
            $type = 'main';
            $mainTit = '智能家居';
            $subTit = 'Main display';
            $query->where('pro_first', 9999);
        }
        $data = LoadMoreList::loadMoreList($query, $page);
        $data = $data->merge(compact('mainTit', 'subTit', 'type'));
        return view("pc.pages.list.MallMaterialList", compact('data','tinyBanner'));
    }
}