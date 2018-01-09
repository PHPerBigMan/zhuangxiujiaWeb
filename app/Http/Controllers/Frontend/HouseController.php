<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Models\CaseCategoryModel;
use App\Models\HouseOrderModel;
use Illuminate\Http\Request;
use App\Utils\LoadMoreList;
use App\Models\BannerModel;

class HouseController extends Controller
{
    public function houseDetail(Request $request, $type, $id)
    {
        if (!isset($id) || !isset($type)) {
            return redirect('/');
        }

        if ($type == 'hot') {
            $model = 'HouseHotModel';
            $subTit = '热装小区展示';
        } else if ($type == 'case') {
            $model = 'HouseCaseModel';
            $subTit = '热门案例展示';
        } else if ($type == 'product') {
            $model = 'HouseProductModel';
            $subTit = '热门产品展示';
        } else if ($type == 'construct') {
            $model = 'HouseConstructModel';
            $subTit = '施工现场展示';
        } else {
            return redirect('/');
        }
        $modelName = '\App\Models\\' . $model;
        $item = $modelName::find($id);
        $tinyBanner = BannerModel::where('type', 'detailadd')->first();
        if (!$item) {
            return redirect('/');
        }
        return view('pc.pages.detail.HouseDetail', compact('item', 'tinyBanner', 'type', 'subTit'));
    }

    public function houseOrder(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $type = $request->type;

        if (!($name && $phone && $type)) {
            throw new ApiException('请完善资料');
        }

        $item = new HouseOrderModel();
        $item->name = $name;
        $item->phone = $phone;
        $item->type = $type;
        $item->save();

        return response()->json([
            'msg' => '预约成功',
        ], 200);
    }

    public function houseHotList(Request $request)
    {
        $page = $request->page;
        $search = $request->search;
        $query = \App\Models\HouseHotModel::query();
        if ($search) {
            $query->where('area', 'LIKE', "%$search%");
        }

        $data = LoadMoreList::loadMoreList($query, $page);
        $tinyBanner = $this->listTinyBanner();
        return view("pc.pages.list.HouseHotList", compact('data', 'tinyBanner', 'search'));
    }

    public function houseProductList(Request $request)
    {
        $page = $request->page;
        $query = \App\Models\HouseProductModel::query();
        $data = LoadMoreList::loadMoreList($query, $page);
        $tinyBanner = $this->listTinyBanner();
        return view("pc.pages.list.HouseProductList", compact('data', 'tinyBanner'));
    }

    public function houseConstructList(Request $request)
    {
        $page = $request->page;
        $search = $request->search;
        $query = \App\Models\HouseConstructModel::query();
        if ($search) {
            $query->where('title', 'LIKE', "%$search%");
        }
        $data = LoadMoreList::loadMoreList($query, $page);
        $tinyBanner = $this->listTinyBanner();
        return view("pc.pages.list.HouseConstructList", compact('data', 'tinyBanner'));
    }

    public function houseCaseList(Request $request)
    {
        $page = $request->page;
        $type = $request->type;
        $measure = $request->measure;
        $query = \App\Models\HouseCaseModel::query();

        if ($type && $measure) {
            $query->where('hx', $type)->where('measure', $measure);
        } else if ($type) {
            $query->where('hx', $type);
        } else if ($measure) {
            $query->where('measure', $measure);
        }

        $data = LoadMoreList::loadMoreList($query, $page);
        $typeLink = "/house-case?measure=$measure&";
        $measureLink = "/house-case?type=$type&";
        $category = $this->category();
        $tinyBanner = $this->listTinyBanner();

        return view("pc.pages.list.HouseCaseList", compact('data', 'category', 'type', 'measure',
            'typeLink', 'measureLink', 'tinyBanner'));
    }

    private function listTinyBanner()
    {
        return BannerModel::where('type', 'listadd')->first();
    }

    // 分类
    private function category()
    {
        $allCategory = \App\Models\CaseCategoryModel::get();
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
}