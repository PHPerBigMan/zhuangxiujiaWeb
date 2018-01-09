<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Models\FreeApplyModel;
use Illuminate\Http\Request;
use App\Models\QuestionModel;
use Illuminate\Support\Collection;

class QuestionController extends Controller
{
    public function questionPage()
    {
        $list = QuestionModel::where('is_answer', 1)->get();
        $resolved = $list->count();
        $commonList = QuestionModel::where('is_answer', 1)->where('is_common', 1)->get();
        $hotList = QuestionModel::where('is_answer', 1)->where('is_hot', 1)->get();

        $list = $this->sliceList($list);
        $hotList = $this->sliceList($hotList);
        return view('pc.pages.Question', compact('list', 'hotList', 'commonList', 'resolved'));
    }

    // 将数据分块
    private function sliceList(Collection $list, $slice = 8)
    {
        $total = $list->count();
        $count = ceil($total / $slice);
        $result = collect([]);
        for ($i = 0; $i < $count; $i++) {
            $result->push($list->slice($slice * $i, $slice));
        }

        return $result;
    }

    public function questionDetail(Request $request, $id)
    {
        $resolved = QuestionModel::where('is_answer', 1)->count();
        $commonList = QuestionModel::where('is_answer', 1)->where('is_common', 1)->get();
        $item = QuestionModel::find($id);
        return view('pc.pages.detail.QuestionDetail', compact('item', 'commonList', 'resolved'));
    }

    public function submitQuestion(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $question = $request->question;

        if (!($name && $phone && $question)) {
            throw new ApiException('请完善资料');
        }

        $item = new QuestionModel();
        $item->name = $name;
        $item->phone = $phone;
        $item->question = $question;
        $item->save();

        return response()->json([
            'msg' => '提交成功',
        ], 200);
    }

    public function freeApply(Request $request)
    {
        $type = $request->type;
        $name = $request->name;
        $phone = $request->phone;
        $acreage = $request->acreage;
        $address = $request->address;
        $houseType = $request->houseType;
        $userId = $request->userId;

        if (!($name && $phone && isset($type) && $acreage && $address && $houseType)) {
            throw new ApiException('请完善资料');
        }

        $item = new FreeApplyModel();
        $item->name = $name;
        $item->phone = $phone;
        $item->type = $type;
        $item->acreage = $acreage;
        $item->address = $address;
        $item->house_type = $houseType;
        $item->user_id = $userId;
        $item->save();

        return response()->json([
            'msg' => '提交成功',
        ], 200);
    }
}