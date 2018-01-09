@component('pc.pages.user.UserLayout', ['tab' => 1])
    <div class="user-edit">
        <div class="user-edit-head">
            <div class='user-edit-avatar'>
                <img class="" src="/images/eg1.jpg"  alt="">
                <input type='file' class="uploading-img" name="file" id="avatar"  >
            </div>
            <h5 class="edit-avatar-tips">点击图片上传头像</h5>
        </div>

        <ul class="user-edit-body">
            <li class="uploading-list-li">
                <label>昵称：</label>
                <input type="text" placeholder="请输入您的昵称" value="{{$user->user_name}}" id="name">
            </li>
            <li class="uploading-list-li">
                <label>手机：</label>
                <input type="text" placeholder="请输入您的手机号" value="{{$user->user_phone}}" id="phone">
            </li>
            <li class="uploading-list-li" id="sex">
                <label>性别：</label>
                <span class="radio-row"><input type="radio" name="sex" value="1"
                                               @if($user->user_sex != 0) checked @endif>男</span>
                <span class="radio-row"><input type="radio" name="sex" value="0"
                                               @if($user->user_sex == 0) checked @endif>女</span>
            </li>
            <li class="uploading-list-li">
                <label>职业：</label>
                <input type="text" placeholder="请输入您的职业" value="{{$user->user_job}}" id="job">
            </li>
            <li class="uploading-list-li" id="address">
                <label>地区：</label>
                <div class="uploading-address">
                    @include('pc.components.AddressSelect', ['wrap' => '.user-edit'])
                </div>
            </li>
        </ul>
        <div class="user-btn-box">
            <button class="user-submit" id="submit">提交</button>
            <a href="/user" class="user-cancel">取消</a>
        </div>
    </div>

    <script>
        $(function () {

            $wrap = $('.user-edit')

            $wrap.find('#submit').click(function () {
                var name = $wrap.find('#name').val()
                var phone = $wrap.find('#phone').val()
                var sex = $wrap.find('#sex input:checked').val()
                var job = $wrap.find('#job').val()
                var province = $wrap.find('.uploading-address select').eq(0).find('option:selected').text()
                var city = $wrap.find('.uploading-address select').eq(1).find('option:selected').text()
                var area = $wrap.find('.uploading-address select').eq(2).find('option:selected').text()
                console.log(sex, province, city, area);

                sendAjax('post', '/user', {
                    name: name,
                    phone: phone,
                    sex: sex,
                    job: job,
                    province: province,
                    city: city,
                    area: area,
                })
                    .then(function (res) {
                        layer.msg(res.msg, {icon: 1})
                        location.href = '/user'
                    })
            })
        })
    </script>
@endcomponent