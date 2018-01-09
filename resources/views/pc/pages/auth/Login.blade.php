@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    <div class="m-login">
        <span class="login-Bg">
            <img src="/images/eg1.jpg" alt="">
        </span>
        <div class="loginbox">
            <div class="logintitle">
                <h3>用户登陆</h3>
                <i>SING IN</i>
            </div>
            <div class="inputbox">
                <a href="/register" class="already-login">点击注册&gt</a>
                <h3 class="input-title">SING IN</h3>
                <div class="inputNumber-box">
                    <input type="text" id="loginphone" placeholder="请输入手机号码">
                </div>
                <div class="inputpassword-box">
                    <input type="password" id="loginpwd" placeholder="请输入密码">
                </div>
                <button id="submit">登陆</button>
                <a href="/retrieve-password">忘记密码？</a>
            </div>

            <div class="login-logo"></div>
        </div>
    </div>

    <script>
        $(function () {
            $('#submit').click(function () {
                var reg = /^0?(13[0-9]|15[012356789]|17[0678]|18[0123456789]|14[57])[0-9]{8}$/;
                let phone = $("#loginphone").val()
                let pwd = $("#loginpwd").val()
                if (phone == "") {

                    layer.msg('手机号不能为空', {icon: 2, time: 1000});

                } else if (!reg.test(phone)) {

                    layer.msg('手机号格式不正确', {icon: 2, time: 1000});

                } else if (pwd == "") {

                    layer.msg('密码不能为空', {icon: 2, time: 1000});

                } else {
                    sendAjax('post', '/login', {phone: phone, password: pwd})
                        .then(function (res) {
                            layer.msg(res.msg, {icon: 1})
                            location.href = '/user'
                        })
                }
            })
        })
    </script>
@endsection