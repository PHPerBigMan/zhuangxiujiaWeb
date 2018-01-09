@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    <div class="m-login">
        <div class="loginbox">
            <span class="login-Bg">
            <img src="/images/eg1.jpg" alt="">
        </span>
            <div class="logintitle">
                <h3>找回密码</h3>
                <i>REGISTER</i>
            </div>
            <div class="inputbox">
                <a href="/register" class="already-login">已有账号点击登陆&gt</a>
                <h3 class="input-title">REGISTER</h3>
                <div class="inputNumber-box">
                    <input type="text" id="phoneNum" placeholder="请输入手机号">
                </div>
                <div class="input-code">
                    <input type="text" id="retCode" placeholder="请输入验证码">
                    <button id="send-code">发送</button>
                </div>
                <div class="inputpassword-box">
                    <input type="password" id="retPwd" placeholder="请输入不少于6为的密码">
                </div>
                <div>
                    <input type="password" id="retPwdTwo" class="repetition" placeholder="请重复密码">
                </div>
                <button id="retSubmit">提交</button>
            </div>
            <div class="login-logo">
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var timeNum = 60;
            $('#retSubmit').click(function () {
                let reg1 = /^0?(13[0-9]|15[012356789]|17[0678]|18[0123456789]|14[57])[0-9]{8}$/;
                let reg2 = /^\w{6,18}$/;// 密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)

                let phoneNum = $("#phoneNum").val();
                let retCode = $('#retCode').val();
                let retPwd = $('#retPwd').val();
                let retPwdTwo = $('#retPwdTwo').val();
                if (phoneNum == "") {
                    layer.msg('手机号不能为空', {
                        icon: 2,
                        time: 1000
                    });
                } else if (!reg1.test(phoneNum)) {
                    layer.msg('手机号格式不正确', {
                        icon: 2,
                        time: 1000
                    });
                } else if (retCode == '') {
                    layer.msg('请输入验证码', {
                        icon: 2,
                        time: 1000
                    });
                } else if (retPwd == '') {
                    layer.msg('密码不能为空', {
                        icon: 2,
                        time: 1000
                    });
                } else if (!reg2.test(retPwd)) {
                    layer.msg('密码格式不正确', {
                        icon: 2,
                        time: 1000
                    });
                } else if (retPwdTwo == '') {
                    layer.msg('重复密码不能为空', {
                        icon: 2,
                        time: 1000
                    });
                } else if (retPwd != retPwdTwo) {
                    layer.msg('两次密码输入不一致', {
                        icon: 2,
                        time: 1000
                    });
                } else {
                    sendAjax('post', '/retrieve-password', {phone: phoneNum, code: retCode, newPassword: retPwd,})
                        .then(function (res) {
                            layer.msg(res.msg, {icon: 1})
                            location.href = '/login';
                        })
                }
            })
            $('#send-code').click(function () {
                let reg1 = /^0?(13[0-9]|15[012356789]|17[0678]|18[0123456789]|14[57])[0-9]{8}$/;
                let phoneNum = $("#phoneNum").val();
                if (phoneNum == "") {
                    layer.msg('手机号不能为空', {
                        icon: 2,
                        time: 1000
                    });

                } else if (!reg1.test(phoneNum)) {
                    layer.msg('手机号格式不正确', {
                        icon: 2,
                        time: 1000
                    });

                } else {
                    sendAjax('post', '/send-code', {phone: phoneNum})
                        .then(function (res) {
                            layer.msg(res.msg, {icon: 1})
                            timeCode($('#send-code'))
                        })
                }
            })

            function timeCode(ol) {
                if (timeNum == 0) {
                    ol.attr("disabled");
                    ol.text('发送')
                    timeNum = 60
                    return
                } else {
                    ol.attr("disabled", true);
                    ol.text('重新发送(' + timeNum + ')')
                    timeNum--;
                    setTimeout(function () {
                        timeCode(ol)
                    }, 1000)
                }
            }

        })
    </script>
@endsection