@extends('pc.layout.Layout', ['nav' => 3])

@section('content')
    <div>
        @include('pc.components.MainBanner' )
        @include('pc.components.ScrollNav')
        {{--统计数字--}}
        <div class="m-construct-count">
            <div class="p-wrap">
                <div class="count-item">
                    <div class="count-txt">
                        <div class="count-num">{{$statistic->get(0)->total}}+</div>
                        <div class="count-titles">套正在施工</div>
                    </div>
                    <img src="/images/img16.png" alt="" class="count-icon">
                </div>

                <div class="count-item">
                    <div class="count-txt">
                        <div class="count-num">{{$statistic->get(1)->total}}+</div>
                        <div class="count-titles">套已完工</div>
                    </div>
                    <img src="/images/img17.png" alt="" class="count-icon">
                </div>

                <div class="count-item">
                    <div class="count-txt">
                        <div class="count-num">{{$statistic->get(2)->total}}+</div>
                        <div class="count-titles">客户满意评价</div>
                    </div>
                    <img src="/images/img18.png" alt="" class="count-icon">
                </div>
            </div>
        </div>

        {{--施工详情--}}
        <div class="m-construct-detail">
            <div class="background">
                <img src="/images/img42.png" alt="">
                <div class="layer"></div>
            </div>

            <div class="content">
                @include('pc.components.SectionTit', ['main' => '施工详情', 'sub' => 'CONSTRUCTION DETAILS'])

                <div class="p-wrap">
                    <div class="item-ctn">
                        @foreach($constructList as $item)
                            <div class="item-unit">
                                <img src="{{$item->suolve}}" alt="">
                                <div class="item-tit clearfix">
                                    <div class="fl">{{$item->title}}</div>
                                    <div class="fr">装修阶段--{{$item->status_text}}</div>
                                </div>
                                <div class="img-layer">
                                    <div class="p-abs-center">
                                        <div class="layer-tit">{{$item->status_txt}}</div>
                                        <div>{{$item->title}}</div>
                                        <a class="layer-btn" href="/house/construct/{{$item->id}}">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href='/house-construct' class="more">查看更多</a>
                </div>
            </div>
        </div>

        {{--施工规范--}}
        <div class="m-work-standard">
            @include('pc.components.SectionTit', ['main' => '施工规范', 'sub' => 'CONSTRUCTION STANDARD'])

            <div class="p-wrap">
                <div class="item-ctn">
                    @foreach($standardList as $item)
                        <div class="item-unit">
                            <div class="item-img">
                                <img src="{{$item->zl_pic[0] or ''}}" alt="">
                            </div>

                            <div class="item-txt">
                                <div class="tit">{{$item->zl_title}}</div>
                                <div class="para">
                                    {!! $item->content !!}
                                </div>
                                <a class="layer-btn" href="/article/{{$item->id}}">查看详情</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="/article-list?type=3" class="more">查看更多</a>
            </div>
        </div>


        {{--施工培训--}}
        <div class="m-work-standard">
            @include('pc.components.SectionTit', ['main' => '施工培训', 'sub' => 'CONSTRUCTION TRAIN'])
            <div class="p-wrap">
                <div class="item-ctn">
                    @foreach($trainList as $item)
                        <div class="item-unit">
                            <div class="item-img">
                                <img src="{{$item->zl_pic[0] or ''}}" alt="">
                            </div>

                            <div class="item-txt">
                                <div class="tit">{{$item->zl_title}}</div>
                                <div class="para">
                                    {!! $item->content !!}
                                </div>
                                <a class="layer-btn" href="/article/{{$item->id}}">查看详情</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="/article-list?type=1" class="more">查看更多</a>
            </div>
        </div>
        {{--售后保养--}}
        <div class="m-maintain">
            <div class="p-wrap">
                <section class="item-unit">
                    <img src="/images/img-49.png" alt="">

                    <section class="item-txt left">
                        <div class="head">
                            <div class="tit">{{$maintain->zl_title}}</div>
                            <div class="subtit">After sales maintenance</div>
                            <div class="icon-line-left"></div>
                        </div>

                        <div class="para">
                            {!!$maintain->content!!}
                        </div>
                        <a href="/article/{{$maintain->id}}" class="layer-btn">查看详情</a>
                    </section>
                </section>


                <div class="item-unit">
                    <img src="/images/img-50.png" alt="">

                    <div class="item-txt">
                        <div class="head">
                            <div class="tit">{{$explain->zl_title}}</div>
                            <div class="subtit">Knowledge explanation</div>
                            <div class="icon-line-right"></div>
                        </div>

                        <div class="para">
{{--                            {!!substr($explain->content,0,342)!!}--}}
                            {!!$explain->content!!}
                        </div>
                        <a  href="/article/{{$explain->id}}" class="layer-btn">查看详情</a>
                    </div>
                </div>
                <div class="addition"></div>
            </div>
        </div>
    </div>
@endsection