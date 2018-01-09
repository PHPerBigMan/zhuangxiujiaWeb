@extends('pc.layout.Layout', ['nav' => 3])

@section('content')
    @include('pc.components.BannerImg')
    {{--施工详情--}}
    <div class="m-construct-detail" style="margin-bottom: 120px;">
        @include('pc.components.SectionTit', ['main' => '施工详情', 'sub' => 'CONSTRUCTION DETAILS'])

        <div class="p-wrap">
            <div class="item-ctn">
                @foreach($data->get('list') as $item)
                    <div class="item-unit">
                        <img src="{{$item->suolve}}" alt="">
                        <div class="item-tit clearfix">
                            <div class="fl">{{$item->title}}</div>
                            <div class="fr">装修阶段--{{$item->status_text}}</div>
                        </div>
                        <div class="img-layer">
                            <div class="p-abs-center">
                                <div class="layer-tit">{{$item->title}}</div>
                                <div>{{$item->address}}</div>
                                <a class="layer-btn" href="/house/construct/{{$item->id}}">查看详情</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/house-construct?page={{$data->get('page')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection