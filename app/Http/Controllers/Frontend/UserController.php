<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Models\FreeApplyModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userInfo(Request $request)
    {
        $userId = $request->userId;
        $user = UserModel::find($userId);
        return view('pc.pages.user.User', compact('user'));
    }

    public function userEdit(Request $request)
    {
        $userId = $request->userId;
        $user = UserModel::find($userId);
        return view('pc.pages.user.UserEdit', compact('user'));
    }

    public function userDecorate(Request $request)
    {
        $userId = $request->userId;
        $list = FreeApplyModel::where('user_id', $userId)->get();
        return view('pc.pages.user.UserDecorate', compact('list'));
    }

    public function deleteDecorate(Request $request)
    {
        $id = $request->id;
        FreeApplyModel::destroy($id);
        return response()->json([
            'msg' => '成功',
        ], 200);
    }

    public function updateUser(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $sex = $request->sex;
        $job = $request->job;
        $province = $request->province;
        $city = $request->city;
        $area = $request->area;
        $userId = $request->userId;

        if (!($name && $phone && isset($sex) && $job && $province && $city && $area && $userId)) {
            throw new ApiException('请完善资料');
        }

        $item = UserModel::find($userId);
        if (!$item) {
            throw new ApiException('该用户不存在');
        }

        $item->user_name = $name;
        $item->user_phone = $phone;
        $item->user_sex = $sex;
        $item->user_job = $job;
        $item->user_province = $province;
        $item->user_area = $area;
        $item->user_city = $city;

        $item->save();

        view('pc.pages.user.User', ['user' => $item])->render();

        return response()->json([
            'msg' => '提交成功',
        ], 200);
    }
}