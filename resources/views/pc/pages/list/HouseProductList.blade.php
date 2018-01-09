@extends('pc.layout.Layout', ['nav' => 2])

@section('content')
    @include('pc.components.BannerImg')

    {{--产品展示--}}
    <div class="m-decorate-product" style="margin-bottom: 120px;">
        @include('pc.components.SectionTit', ['main' => '产品展示', 'sub' => 'PRODUCT DISPLAY'])
        <div class="p-wrap">
            <div class="item-ctn">
                @foreach($data->get('list') as $item)
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

            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/house-product?page={{$data->get('page')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection