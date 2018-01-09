@extends('pc.layout.Layout', ['nav' => 3])

@section('content')
    @include('pc.components.BannerImg')

    <div class="m-work-standard" style="margin-bottom: 120px;">
        @include('pc.components.SectionTit', ['main' => '施工规范', 'sub' => 'CONSTRUCTION STANDARD'])

        <div class="p-wrap">
            <div class="item-ctn">
                @foreach($data->get('list') as $item)
                    <div class="item-unit">
                        <div class="item-img">
                            <img src="{{$item->zl_pic[0] or ''}}" alt="">
                        </div>

                        <div class="item-txt">
                            <div class="tit">{{$item->zl_title}}</div>
                            <div class="para">
                                {{$item->zl_content}}
                            </div>
                            <a class="layer-btn" href="/article/{{$item->id}}">查看详情</a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/article-list?page={{$data->get('page')}}&type={{$data->get('type')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection