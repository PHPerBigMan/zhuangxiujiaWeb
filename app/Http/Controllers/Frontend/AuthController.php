<?php

namespace App\Http\Controllers\Frontend;
//require_once '../../../Utils/alisms-sdk/sendSms.php';
//require_once base_path('app/Utils/alisms-sdk/sendSms.php');

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    // 发起登录
    public function login(Request $request)
    {
        $phone = $request->phone;
        $password = $request->password;
        $user = UserModel::where('user_phone', $phone)->first();
        if (!$user || !$this->checkPassword($user, $password)) {
            throw new ApiException('账号或密码错误');
        } else {
            session(['user' => $user]);
            return response()->json([
                'msg' => '登陆成功',
            ], 200);
        }
    }

    // 注销
    public function logout()
    {
        session(['user' => null]);
        return response()->json([
            'msg' => '退出成功',
        ], 200);
    }

    // 注册请求
    public function register(Request $request)
    {
        $code = $request->code;
        $phone = $request->phone;
        $password = $request->password;

        $this->checkCode($code, $phone);

        $repeat = UserModel::where('user_phone', $phone)->first();
        if ($repeat) {
            throw new ApiException('该手机号已被注册');
        }

        $row = new UserModel();
        $row->user_phone = $phone;
        $row->user_pwd = sha1($password);
        $row->save();
        session(['user' => $row]);
        return response()->json([
            'msg' => '成功',
        ], 200);
    }

    // 找回密码
    public function retrievePassword(Request $request)
    {
        $phone = $request->phone;
        $code = $request->code;
        $newPassword = $request->newPassword;
        $user = UserModel::where('user_phone', $phone)->first();

        if (!$user) {
            throw new ApiException('该用户不存在');
        }

        $this->checkCode($code, $phone);

        $user->user_pwd = sha1($newPassword);
        $user->save();
        return response()->json([
            'msg' => '修改成功',
        ], 200);
    }

    // 发送验证码
    public function sendCode(Request $request)
    {
        $phone = $request->phone;
        if (!$phone) {
            throw new ApiException('请输入手机号');
        }

        if (Cache::get('limit') == $phone) {
            throw new ApiException('操作太频繁，请一分钟后重试');
        }

//        $code = rand(1000, 9999);
        $code = 1234;
        Cache::put('code', $code, 5);
        Cache::put('phone', $phone, 5);

        $res = \App\Utils\sendSms::sendSms(18772555026, $code);
        // 发送成功给个倒计时
        Cache::put('limit', $phone, 1);
        return response()->json([
            'msg' => "$res->Message, 测试验证码为1234",
        ], 200);
    }

    // 检查验证码和手机是否匹配
    private function checkCode($code, $phone)
    {
        $sendCode = Cache::get('code');
        $sendPhone = Cache::get('phone');

        if (!($code && $phone && $sendPhone == $phone && $sendCode == $code)) {
            throw new ApiException('验证码错误');
        }
    }

    // 检查密码是否匹配
    private function checkPassword($user, $password)
    {
        return sha1($password) === $user->user_pwd;
    }
}