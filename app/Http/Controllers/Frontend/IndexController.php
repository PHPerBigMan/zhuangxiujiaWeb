<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\HouseHotModel;
use App\Models\HouseProductModel;
use App\Models\HouseCaseModel;
use App\Models\HouseConstructModel;
use App\Models\MallGoodsModel;
use App\Models\BrandModel;
use App\Models\StatisticModel;

class IndexController extends Controller
{
    public function homePage()
    {
//        dd(config('app.name'));
        $banner = $this->banner();
        $brand = $this->brand();
        $hotHome = HouseHotModel::where('is_hot', 1)->first();
        $hotList = HouseHotModel::latest()->limit(20)->get();
        $productList = HouseProductModel::latest()->where('is_hot', 1)->limit(6)->get();
        $caseList = HouseCaseModel::latest()->where('is_hot', 1)->limit(4)->get();
        $constructList = HouseConstructModel::latest()->where('is_hot', 1)->limit(4)->get();

        return view('pc.pages.Home', compact('banner', 'brand', 'hotHome', 'hotList',
            'productList', 'caseList', 'constructList'));
    }

    public function decoratePage()
    {
        $banner = $this->banner();
        $brand = $this->brand();

        $tinyBanner = BannerModel::where('type', 'listadd')->first();
        $caseList = HouseCaseModel::latest()->limit(8)->get();
        $productList = HouseProductModel::latest()->where('is_hot', 1)->limit(6)->get();
        return view('pc.pages.Decorate', compact('banner', 'tinyBanner', 'brand', 'productList', 'caseList'));
    }

    public function constructPage()
    {
        $banner = $this->banner();
        $statistic = StatisticModel::get();
        $constructList = HouseConstructModel::latest()->limit(9)->get();
        $standardList = ArticleController::getArticle(3, 2);
        $trainList = ArticleController::getArticle(1, 2);
        $maintain = ArticleController::getArticle(4, 1)->first();
        $explain = ArticleController::getArticle(5, 1)->first();
        return view('pc.pages.Construct', compact('banner', 'statistic',
            'constructList', 'standardList', 'trainList','explain','maintain'));
    }


    public function mallPage()
    {
        $banner = $this->banner();
        $brand = $this->brand();
        $firstCategory = MallController::category();
        $materialList = MallGoodsModel::where('pro_first', 9998)->latest()->limit(5)->get();
        $softList = MallGoodsModel::where('pro_first', 9999)->latest()->limit(5)->get();
        $MallBanner = BannerModel::where('type', 'mall')->limit(5)->get();
//        dd($MallBanner);
        return view('pc.pages.Mall', compact('MallBanner','banner', 'brand', 'firstCategory', 'materialList', 'softList'));
    }

    public function brandPage()
    {
        $brand = BrandModel::where('type', 0)->get();
        $brand_2 = BrandModel::where('type', 1)->get();
        return view('pc.pages.BrandDisplay', compact('brand', 'brand_2'));
    }

    private function banner()
    {
        return BannerModel::where('type', 1)->get();
    }

    // 品牌
    private function brand()
    {
        $brand = BrandModel::latest()->get();

        $count = $brand->count();
        if ($count % 2 != 0) {
            $brand->pop();
            $count = $brand->count();
        }
        $split = collect([]);
        for ($i = 0; $i < $count; $i += 2) {
            $split->push($brand->slice($i, 2));
        }

        return $split;
    }
}
