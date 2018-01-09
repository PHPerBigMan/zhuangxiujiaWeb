@php
    if ($type == "construct") {
        $nav = 3;
    } else {
        $nav = 2;
    }
@endphp

@extends('pc.layout.Layout',['nav' => $nav])


@section('content')
    <div class="m-detail">
        @include('pc.components.BannerImg')
        <div class="p-wrap">
            <div class="detail-introduce">
                <div class="house-img">
                    @foreach($item->lunbo as $img)
                        <img src="{{$img}}" class="introduce-img"  alt="">
                    @endforeach
                </div>

                <div class="introduce-info">
                    <h3 class="introduce-info-title">{{$item->title}}</h3>

                    {{--案例展示详情--}}
                    @if($type == 'case')
                        <ul class="case-introduce-box">
                            <li>
                                <div class="case-box-div">
                                    户型：<i>{{$item->type_text}}</i>
                                </div>
                                <div class="case-box-div">
                                    面积：<i>{{$item->measure_text}}</i>
                                </div>
                            </li>
                            <li>
                                <p>{{$item->content}}</p>
                            </li>
                            <div class="rq-code">
                                <img src="{{$item->qrcode}}" alt="">
                                <div>手机端查看</div>
                            </div>
                        </ul>

                    @elseif($type == 'product')
                        {{--产品展示详情--}}
                        <div class="product-introduce-box">
                            <h4>{{$item->desc}}<i>{{$item->pay}}</i></h4>
                            <p>{{$item->content}}</p>
                        </div>
                    @elseif($type == 'hot')
                        {{--热装小区详情--}}
                        <div class="hot-introduce-box">
                            <p class="hot-introduce-tex">{{$item->content}}</p>
                            <button class="hot-introduce-btn">预约看工地</button>
                        </div>
                    @elseif($type == 'construct')
                        {{--施工详情--}}
                        <div class="roadwork-introduce-box">
                            <p class="roadwork-text">{{$item->content}}</p>
                            <h5>{{$item->title}}</h5>
                            <div class="roadwork-time">
                                <h4>开工时间：</h4>
                                <i>{{$item->start}}</i>
                            </div>
                            <div class="roadwork-time-schedule">
                                <div class="dot @if($item->status > 0) start @endif">
                                    <h5>开工</h5>
                                </div>
                                <i class="wire"></i>

                                <div class="dot @if($item->status == 1) cur @elseif($item->status > 1) complete @endif">
                                    <h5 class="">水电</h5>
                                </div>
                                <i class="wire"></i>

                                <div class="dot @if($item->status == 2) cur @elseif($item->status > 2) complete @endif">
                                    <h5>泥木</h5>
                                </div>
                                <i class="wire"></i>

                                <div class="dot @if($item->status == 3) cur @elseif($item->status > 3) complete @endif">
                                    <h5 class="">油工</h5>
                                </div>
                                <i class="wire"></i>

                                <div class="dot @if($item->status == 4) cur @elseif($item->status > 4) complete @endif">
                                    <h5 class="">竣工</h5>
                                </div>
                            </div>
                            <button class="hot-introduce-btn">预约看工地</button>
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <div class="c-caseBanner">
                    <h3 class="caseBanner-title">更多展示</h3>
                    <div class="caseBannerboxs">
                        <div class="caseBanner-box">
                            <div class="swiper-wrapper">
                                    @foreach($item->lunbo as $img)
                                        <div class="swiper-slide swiperUnit">
                                            <img src="{{$img}}" alt="">
                                        </div>
                                    @endforeach
                            </div>
                            <!-- 如果需要导航按钮 -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="pop-up-win">
            <div class="pop-up-winbox">
                <span class="winbox-close">+</span>
                <h3>预约服务</h3>
                <ul class="winbox-input">
                    <li><input type="text" placeholder="请输入联系人姓名" id="order-name"></li>
                    <li><input type="text" placeholder="请输入联系人电话" id="order-phone"></li>
                    <li>
                        <button id="order-submit">提交</button>
                    </li>
                </ul>
                <h4 class="people-num" style="font-size: 10px">已有<i>354</i>位业主预约</h4>
            </div>
        </div>
    </div>

    <script>
        $(function () {

            var $winClose = $('.winbox-close')
            var $popUpWin = $('.pop-up-win')
            var $orderBtn = $('.hot-introduce-btn')
            var $submit = $('#order-submit')
            var $name = $('#order-name')
            var $phone = $('#order-phone')
            $winClose.click(function () {
                $popUpWin.fadeOut()
            })
            $orderBtn.click(function () {
                $popUpWin.fadeIn()
            })

            $submit.click(function () {
                sendAjax('post', '/house-order', {
                    name: $name.val(),
                    phone: $phone.val(),
                    type: '{{$type}}',
                })
                    .then(function (res) {
                        layer.msg(res.msg, {icon: 1})
                        $popUpWin.fadeOut()
                    })
            })
        })

        //轮播联动
        $(function () {
            var $introduceImg = $('.introduce-img')
            var $swiperUnit = $('.swiperUnit')
            $introduceImg.eq(0).css('display','block')
            $swiperUnit.click(function () {
                $introduceImg.hide()
                $introduceImg.eq($(this).index()).fadeIn()
            })
        })

        new Swiper('.house-img', {
            loop: true,
            autoplay: 5000,

            // 如果需要前进后退按钮
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })

        new Swiper('.caseBanner-box', {
            slidesPerView: 5,
            slidesPerGroup: 5,
            loop: false,

            autoplay: 5000,

            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // 如果需要前进后退按钮
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    </script>
@endsection