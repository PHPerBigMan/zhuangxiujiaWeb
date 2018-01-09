<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\BrandModel;
use App\Utils\LoadMoreList;
use Illuminate\Http\Request;
use App\Models\ArticleModel;

class ArticleController extends Controller
{
    // 1 装修培训
    // 2 施工规范
    // 3 施工标准
    // 4 售后保养
    // 5 知识讲解
    static public function getArticle($type, $limit = null)
    {
        return ArticleModel
            ::whereHas('category', function ($q) use ($type) {
                $q->where('id', $type);
            })
            ->limit($limit)
            ->latest()
            ->get();
    }

    public function articleList(Request $request)
    {
        $type = $request->type;
        $page = $request->page;
        $query = \App\Models\ArticleModel::where('zl_cat', $type);
        $data = LoadMoreList::loadMoreList($query, $page, 6);
        $data->merge($this->pageTitle($type));
        $data->put('type', $type);
        $tinyBanner = BannerModel::where('type', 'listadd')->first();
        return view("pc.pages.list.ArticleList", compact('data', 'tinyBanner'));
    }

    public function articleDetail($id)
    {
        $item = ArticleModel::find($id);
        $data = $this->pageTitle($item->category->id);
        return view('pc.pages.detail.ArticleDetail', compact('item', 'data'));
    }

    private function pageTitle($type)
    {
        $mainTit = '';
        $subTit = '';

        switch ($type) {
            case 1:
                $mainTit = '装修培训';
                $subTit = 'Decorate training';
                break;
            case 2:
                $mainTit = '施工规范';
                $subTit = 'Construction specification';
                break;
            case 3:
                $mainTit = '施工标准';
                $subTit = 'Construction standards';
                break;
            case 4:
                $mainTit = '售后保养';
                $subTit = 'After sales maintenance';
                break;
            default:
                $mainTit = '知识讲解';
                $subTit = 'Knowledge explanation';
        }

        return collect([
            'mainTit' => $mainTit,
            'subTit' => $subTit,
        ]);
    }

    // 品牌详情
    public function brandDetail($id)
    {
        $item = BrandModel::find($id);
        return view('pc.pages.detail.BrandDetail', compact('item'));
    }

    // 文章详情2
    public function articleDetail_2($id)
    {
        $item = ArticleModel::find($id);
        return view('pc.pages.detail.ArticleDetail_2', compact('item'));
    }
}