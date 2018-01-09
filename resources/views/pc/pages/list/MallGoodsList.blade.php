@extends('pc.layout.Layout', ['nav' => 4])

@section('content')
    @include('pc.components.BannerImg')

    {{--商品列表--}}
    <div class="m-goods-list">
        @include('pc.components.SectionTit', ['main' => '商品分类', 'sub' => 'COMMODITY CLASSIFICATION'])

        <div class="p-wrap">
            @include('pc.components.SelectLabel')

            <div class="item-ctn">
                @foreach($data->get('list') as $item)
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
                @endforeach
            </div>

            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/mall-material?page={{$data->get('page')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection