@extends('pc.layout.Layout', ['nav' => 6])

@section('content')
    @php ($tab = isset($tab) ? $tab : 1)
    <div class="m-user">
        <div class="p-wrap">
            <div class="left-user">
                <div class="u-nav-tab">
                    <a href="/user" class="u-tab-item @if($tab == 1) active @endif">个人信息</a>
                    <a href="/user/decorate" class="u-tab-item @if($tab == 2) active @endif">我的发布</a>
                </div>
            </div>

            <div class="right-user">
                {{ $slot }}
            </div>
        </div>
    </div>
@endsection