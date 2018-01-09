@extends('pc.layout.Layout', ['nav' => 2])

@section('content')
    <div>
        @include('pc.components.MainBanner')
        @include('pc.components.ScrollNav')
        {{--专享服务--}}
        @include('pc.components.Service')

        {{--案例展示--}}
        <div class="m-decorate-case">
            @include('pc.components.SectionTit', ['main' => '案例展示', 'sub' => 'CASE DISPLAY'])

            <div class="p-wrap">
                <div class="item-ctn">
                    @foreach($caseList as $item)
                        <div class="item-unit">
                            <div class="img-ctn">
                                <img src="{{$item->suolve}}" alt="">
                                <div class="img-layer">
                                    <div class="qrcode-ctn">
                                        @if($item->qrcode)
                                            <img src="{{$item->qrcode}}" alt="" class="qrcode">
                                            <div class="tips">手机端查看</div>
                                        @endif
                                    </div>
                                    <div class="layer-tit">{{$item->title}}</div>
                                    <div class="layer-btn"><a href="/house/case/{{$item->id}}">查看详情</a></div>
                                </div>
                            </div>
                            <div class="item-tit">
                                <div>户型：{{$item->type_text}}</div>
                                <div>面积：{{$item->measure_text}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href='/house-case' class="more">查看更多</a>
            </div>
        </div>

        {{--banner图--}}
        @include('pc.components.BannerImg')

        {{--产品展示--}}
        <div class="m-decorate-product">
            @include('pc.components.SectionTit', ['main' => '产品展示', 'sub' => 'PRODUCT DISPLAY'])
            <div class="p-wrap">
                <div class="item-ctn">
                    @foreach($productList as $item)
                        <div class="item-unit">
                            <img src="{{$item->suolve}}" alt="">
                            <div class="item-tit">{{$item->title}}</div>
                            <div class="img-layer">
                                <div class="p-abs-center">
                                    <div class="layer-tit">{{$item->title}}</div>
                                    <div>{{$item->desc}}<span class="price">{{$item->pay}}</span></div>
                                    <a class="layer-btn" href="/house/product/{{$item->id}}" target="_blank">查看详情</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href='/house-product' class="more">查看更多</a>
            </div>
        </div>

        {{--品牌展示--}}
        @include('pc.components.BrandShow')
    </div>
@endsection