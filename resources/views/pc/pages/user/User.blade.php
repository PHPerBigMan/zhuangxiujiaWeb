@component('pc.pages.user.UserLayout', ['tab' => 1])
    <div class="user-info">
        <div class='user-head'>
            <span><img class="user-img" src="/images/eg1.jpg" alt=""></span>
            <a href="/user/edit" class="edit-btn">修改资料</a>
        </div>

        <ul class="user-info-list">
            <li>
                <label>昵称：</label>
                <span>{{$user->user_name}}</span>
            </li>
            <li>
                <label>手机：</label>
                <span>{{$user->user_phone}}</span>
            </li>
            <li>
                <label>性别：</label>
                <span>{{$user->user_sex == 1 ? '男' : '女'}}</span>
            </li>
            <li>
                <label>职业：</label>
                <span>{{$user->user_job}}</span>
            </li>
            <li>
                <label>地区：</label>
                <span>{{$user->user_area}}</span>
            </li>
        </ul>
    </div>
@endcomponent