@php
    $nav = isset($nav) ? $nav : 1; // 导航高亮
@endphp


<div class="m-header">
    <div class="head">
        <div class="p-wrap">
            <div class="fl">
                <a href="" class="phone">
                    <span class="icon-phone"></span>
                    <span>手机版</span>
                </a>
                {{--<a class="address">杭州</a>--}}
                {{--<a id="head-address">点击切换</a>--}}
                {{--<a class="head-address-select" style="display: none;">--}}
                {{--@include('pc.components.AddressSelect')--}}
                {{--</a>--}}
            </div>
            <div class="fr head-right">
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=792528966&site=qq&menu=yes">联系客户</a>
                @if($auth)
                    <a id="logout">注销</a>
                    <a>{{$auth->user_phone}}</a>
                @else
                    <a href="/register">注册</a>
                    <a href="/login">登陆</a>
                @endif
                <a href="/user">个人中心</a>
            </div>
        </div>
    </div>

    <div class="body">
        <div class="p-wrap">
            <div class="logo">
                <img src="/images/img12.png" alt="logo">
            </div>

            <div class="nav">
                <a href="/" @if($nav == 1) class="active" @endif>首页</a>
                <a href="/decorate" @if($nav == 2) class="active" @endif>GO来装修</a>
                <a href="/construct" @if($nav == 3) class="active" @endif>GO去工地</a>
                <a href="/mall" @if($nav == 4) class="active" @endif>GO买东西</a>
                <a href="/question" @if($nav == 5) class="active" @endif>GO提问题</a>
                <a href="/about" @if($nav == 6) class="active" @endif>GO了解我</a>
            </div>

            <div class="search" id="head-search">
                <select class="search-select">
                    <option value="house-construct">装修管理</option>
                    <option value="house-case">装修案例</option>
                </select>

                <input type="text" placeholder="请输入名称" class="search-input">

                <div class="search-button"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        // 注销
        $('#logout').click(function () {
            sendAjax('post', '/logout', null)
                .then(function () {
                    location.reload()
                })
        })

        // 搜索
        $headSearch = $('#head-search')
        $headInput = $headSearch.find('.search-input')

        function handleSearch() {
            var val = $headSearch.find('select').val()
            var input = $headInput.val()
            if (!input) {
                layer.msg('请输入搜索关键词', {icon: 2})
                return
            }

            window.open('/' + val + '?search=' + input)
        }

        $headSearch.find('.search-button').click(handleSearch)
        $headInput.on('keyup', function (e) {
            var keycode = (e.keyCode ? e.keyCode : e.which)
            if (keycode == 13) {
                handleSearch()
            }
        })

        // 地址选择
        $address = $('#head-address')
        $addressSelect = $('.head-address-select')

        $address.click(function () {
            if ($addressSelect.is(':hidden')) {
                $addressSelect.show()
            } else {
                $addressSelect.hide()
            }
        })
    })
</script>