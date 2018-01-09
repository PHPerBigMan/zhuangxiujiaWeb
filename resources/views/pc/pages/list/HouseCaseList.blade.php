@extends('pc.layout.Layout', ['nav' =>2])

@section('content')
    @include('pc.components.BannerImg')

    {{--案例展示--}}
    <div class="m-decorate-case" style="margin-bottom: 120px;">
        @include('pc.components.SectionTit', ['main' => '案例展示', 'sub' => 'CASE DISPLAY'])

        <div class="p-wrap">
            @if (isset($category))
                @php
                    $type = isset($type) ? $type : null;
                    $measure = isset($measure) ? $measure : null;
                @endphp

                <div class="m-select-label">
                    @foreach($category as $k => $item)
                        <div class="label-row">
                            <div class="label-head">{{$item->cat_name}}：</div>

                            <div class="label-body">
                                @if($k == 0)
                                    <a href="{{$typeLink}}">
                                        <div class="label-item @if($type === null || !isset($type)) active @endif">不限
                                        </div>
                                    </a>

                                    @foreach($item->child as $child)
                                        <a href="{{"{$typeLink}type=$child->id"}}">
                                            <div class="label-item @if($type == $child->id) active @endif">{{$child->cat_name}}</div>
                                        </a>
                                    @endforeach
                                @elseif($k == 1)
                                    <a href="{{$measureLink}}">
                                        <div class="label-item @if($measure === null || !isset($measure)) active @endif">不限
                                        </div>
                                    </a>
                                    @foreach($item->child as $child)
                                        <a href="{{"{$measureLink}measure=$child->id"}}">
                                            <div class="label-item @if($measure == $child->id) active @endif">{{$child->cat_name}}</div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="item-ctn">
                @foreach($data->get('list') as $item)
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

            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/house-case?page={{$data->get('page')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection