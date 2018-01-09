@extends('pc.layout.Layout', ['nav' => 4])

@section('content')
    <div>
        @include('pc.components.MainBanner')

        {{--主材产品--}}
        <div class="m-mall-classify">
            @include('pc.components.SectionTit', ['main' => '主材产品', 'sub' => 'ADVOCATE MATERIAL PRODUCTS'])

            <div class="p-wrap">
                <div class="nav-ctn-one">
                    @foreach($firstCategory as $item)

                        <div class="nav-item-one">
                            {{$item->cat_name}}
                            <div class="nav-ctn-two">
                                @foreach($item->child as $child)
                                    <a href="/mall-goods?first={{$item->id}}&second={{$child->id}}">
                                        <div class="nav-item-two">{{$child->cat_name}}</div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(!empty($MallBanner))
                    <div class="swiper-container classify-banner">
                        <div class="swiper-wrapper">
                            @foreach($MallBanner as $value)
                            <div class="swiper-slide">
                                <img src="{{ $value->banner_url }}" alt="banner">
                            </div>
                           @endforeach
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                    @else
                    <div class="swiper-container classify-banner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/images/eg1.jpg" alt="banner">
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/eg1.jpg" alt="banner">
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/eg1.jpg" alt="banner">
                            </div>
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                @endif

            </div>
        </div>

        {{--软装配饰--}}
        <div class="m-mall-material">
            @include('pc.components.SectionTit', ['main' => '软装配饰', 'sub' => 'SOFT OUTFIT ACCESSORIES'])

            <div class="p-wrap">
                <div class="content">
                    <div class="ctn-big">
                        @if($item = $materialList->get(0))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="ctn-small">
                        @if($item = $materialList->get(1))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($item = $materialList->get(2))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="ctn-small">
                        @if($item = $materialList->get(3))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($item = $materialList->get(4))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{--<div class="ctn-mid">--}}
                        {{--@if($item = $materialList->get(3))--}}
                            {{--<div class="item-unit">--}}
                                {{--<img src="{{$item->pro_img}}" alt="">--}}
                                {{--<div class="item-tit clearfix">--}}
                                    {{--<div class="fl">{{$item->pro_name}}</div>--}}
                                    {{--<div class="fr">￥{{$item->pro_price}}</div>--}}
                                {{--</div>--}}
                                {{--<div class="img-layer">--}}
                                    {{--<div class="p-abs-center">--}}
                                        {{--<a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                </div>

                <a href='/mall-material?type=soft' class="more">查看更多</a>
            </div>
        </div>

        {{--集成智能--}}
        <div class="m-mall-material">
            @include('pc.components.SectionTit', ['main' => '智能家居', 'sub' => 'SMART HOUSEHOLD'])

            <div class="p-wrap">
                <div class="content">
                    <div class="ctn-big">
                        @if($item = $softList->get(0))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="ctn-small">
                        @if($item = $softList->get(1))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($item = $softList->get(2))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="ctn-small">
                        @if($item = $softList->get(3))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($item = $softList->get(4))
                            <div class="item-unit">
                                <img src="{{$item->pro_img}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->pro_name}}</div>
                                    <div class="fr">￥{{$item->pro_price}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{--<div class="ctn-mid">--}}
                        {{--@if($item = $softList->get(3))--}}
                            {{--<div class="item-unit">--}}
                                {{--<img src="{{$item->pro_img}}" alt="">--}}
                                {{--<div class="item-tit clearfix">--}}
                                    {{--<div class="fl">{{$item->pro_name}}</div>--}}
                                    {{--<div class="fr">￥{{$item->pro_price}}</div>--}}
                                {{--</div>--}}
                                {{--<div class="img-layer">--}}
                                    {{--<div class="p-abs-center">--}}
                                        {{--<a class="layer-btn" href="{{$item->pro_url}}" target="_blank">查看详情</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                </div>

                <a href='/mall-material' class="more">查看更多</a>
            </div>
        </div>

        {{--品牌展示--}}
        @include('pc.components.BrandShow')
    </div>

    <script>
        $(function () {
            new Swiper('.classify-banner', {
                loop: true,

                // 如果需要分页器
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            })
        })
    </script>
@endsection