@extends('pc.layout.Layout', ['nav' => 1])

@section('content')

    <div class="m-login">
        <span class="login-Bg">
            <img src="/images/eg1.jpg" alt="">
        </span>
        <div class="loginbox">
            <div class="logintitle">
                <h3>用户注册</h3>
                <i>SING UP</i>
            </div>
            <div class="input-registerbox">
                <a href="/login" class="already-login">已有账号点击登陆&gt</a>
                <div class="register-lt">
                    <div class="registerbox-lt-box">
                        <h3 class="input-title">SING UP</h3>
                        <div class="inputNumber-box">
                            <input type="text" id="singPhone" placeholder="请输入手机号">
                        </div>
                        <div class="input-code">
                            <input type="text" id="singCode" placeholder="请输入验证码">
                            <button id="send-code">发送</button>
                        </div>
                        <div class="inputpassword-box">
                            <input type="password" id="singPwd" placeholder="请输入不少于6为的密码">
                        </div>
                        <div>
                            <input type="password" id="singPwdTow" class="repetition" placeholder="请重复密码">
                        </div>
                        <div class="btn">
                            <button class="submitbtn" id="subitm">提交</button>
                            <button class="resetbtn" id="reset">重置</button>
                        </div>
                    </div>
                </div>
                <div class="register-rt">
                    <div class="agreement-box">
                        <div class="agreement-box-text">
                            <h4>用户协议</h4>
                            <p>
                                1.欢迎使用土巴兔！任何使用土巴兔的用户均应仔细阅读本声明，用户可选择不使用土巴兔，用户使用土巴兔的行为，包括进入土巴兔主页及各层页面将被视为对本声明全部内容的认可。
                            </p>
                            <p>
                                2.土巴兔所有刊登内容，以及所提供的信息资料，目的是为了更好地服务我们的访问者，本网站不保证所有信息、文本、图形、链接及其它 项目的绝对准确性和完整性，故仅供访问者参照使用。
                            </p>
                        </div>
                    </div>
                    <span class="register-rt-btn">
                        <input class="register-radio" value="0" hidden type="checkbox" id="male"/>
                        <label for="male">阅读并同意协议</label>
                    </span>
                </div>
            </div>
            <div class="login-logo">
            </div>
        </div>

    </div>
    </div>
    <script>
        $(function () {
            var timeNum = 60;
            $('#subitm').click(function () {
                let reg1 = /^0?(13[0-9]|15[012356789]|17[0678]|18[0123456789]|14[57])[0-9]{8}$/;
                let reg2 = /^\w{6,18}$/;// 密码(以字母开头，长度在6~18之间，只能包含字母、数字和下划线)

                let singPhone = $("#singPhone").val();
                let singCode = $('#singCode').val();
                let singPwd = $('#singPwd').val();
                let singPwdTow = $('#singPwdTow').val();
                if (singPhone == "") {

                    layer.msg('手机号不能为空', {icon: 2, time: 1000});

                } else if (!reg1.test(singPhone)) {

                    layer.msg('手机号格式不正确', {icon: 2, time: 1000});

                } else if (singCode == '') {

                    layer.msg('请输入验证码', {icon: 2, time: 1000});

                } else if (singPwd == '') {

                    layer.msg('密码不能为空', {icon: 2, time: 1000});

                } else if (!reg2.test(singPwd)) {

                    layer.msg('密码格式不正确', {icon: 2, time: 1000});

                } else if (singPwdTow == '') {

                    layer.msg('重复密码不能为空', {icon: 2, time: 1000});

                } else if (singPwd != singPwdTow) {

                    layer.msg('两次密码输入不一致', {icon: 2, time: 1000});

                } else if (!$('#male').is(':checked')) {

                    layer.msg('请阅读并同意协议', {icon: 2, time: 1000});

                } else {

                    sendAjax('post', '/register', {phone: singPhone, password: singPwd, code: singCode})
                        .then(function (res) {
                            layer.msg(res.msg, {icon: 1})
                            location.href = '/user';
                        })
                }

            })

            $('#send-code').click(function () {
                let reg1 = /^0?(13[0-9]|15[012356789]|17[0678]|18[0123456789]|14[57])[0-9]{8}$/;
                let singPhone = $("#singPhone").val();
                if (singPhone == "") {

                    layer.msg('手机号不能为空', {icon: 2, time: 1000});

                } else if (!reg1.test(singPhone)) {

                    layer.msg('手机号格式不正确', {icon: 2, time: 1000});

                } else {
                    sendAjax('post', '/send-code', {phone: singPhone})
                        .then(function (res) {
                            layer.msg(res.msg, {icon: 1})
                            timecode($('#send-code'))
                        })
                }
            })

            $('#reset').click(
                function () {
                    $("#singPhone").val('');
                    $('#singCode').val('');
                    $('#singPwd').val('');
                    $('#singPwdTow').val('');
                }
            )

            function timecode(ol) {
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
                        timecode(ol)
                    }, 1000)
                }
            }

        })
    </script>
@endsection