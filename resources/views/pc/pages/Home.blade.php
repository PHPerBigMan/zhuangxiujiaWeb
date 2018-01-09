@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    <div class="m-home">
        @include('pc.components.MainBanner')
        @include('pc.components.ScrollNav')
        {{--装修流程--}}
        <div class="m-flow-chart">
            @include('pc.components.SectionTit', ['main' => '装修流程', 'sub' => 'DECORATION PROCESS'])

            <div class="p-wrap">
                <div class="flow-ctn">
                    <div class="flow-item">
                        <img src="/images/img47.png" alt="流程">
                        <div class="flow-name">线上报名</div>
                        <div class="sub-name">ONLINE REGISTRATION</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img2.png" alt="流程">
                        <div class="flow-name">免费设计</div>
                        <div class="sub-name">FREE DESIGN</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img3.png" alt="流程">
                        <div class="flow-name">线下对稿</div>
                        <div class="sub-name">OFFLINE MANUSCRIPT</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img4.png" alt="流程">
                        <div class="flow-name">免费报价</div>
                        <div class="sub-name">FREE OFFER</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img5.png" alt="流程">
                        <div class="flow-name">对比价格</div>
                        <div class="sub-name">COMPARATIVE PRICE</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img6.png" alt="流程">
                        <div class="flow-name">了解施工</div>
                        <div class="sub-name">CONSTRUCTION</div>
                    </div>

                    <div class="flow-item">
                        <img src="/images/img7.png" alt="流程">
                        <div class="flow-name">签订合同</div>
                        <div class="sub-name">CONTRACT</div>
                    </div>
                </div>
            </div>
        </div>

        {{--专享服务--}}
        @include('pc.components.Service')

        {{--热装小区--}}
        <div class="m-hot-cell">
            <div class="layer">
                <div class="ctn">
                    <div class="cell-img">
                        @if($hotHome)
                            <img src="{{$hotHome->suolve}}" alt="">

                            <div class="img-layer">
                                <div class="layer-txt">
                                    <div>{{$hotHome->title}}</div>
                                    <a href="/house/hot/{{$hotHome->id}}" target="_blank" class="layer-btn">查看详情</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="cell-list">
                        <div class="list-head">热装小区列表</div>
                        <div class="list-body">
                            <div class="scroll-ctn">
                                @foreach($hotList as $item)
                                    <div class="list-item">
                                        <div class="name fl">{{$item->title}}</div>
                                        <div class="dist fl">{{$item->area}}</div>
                                        <a class="fr btn" target="_blank" href="/house/hot/{{$item->id}}">查看</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--产品展示--}}
        <div class="m-product-show">
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

                <a href='/decorate' class="more">
                    <div class="p-abs-center">
                        更<br>多<br>产<br>品<br>
                        <div class="dot">.<br>.<br>.</div>
                    </div>
                </a>
            </div>

        </div>

        {{--案例展示--}}
        <div class="m-case-show">
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

                <a href='/decorate' class="more">
                    <div class="p-abs-center">
                        更<br>多<br>案<br>例<br>
                        <div class="dot">.<br>.<br>.</div>
                    </div>
                </a>
            </div>
        </div>

        {{--施工详情--}}
        <div class="m-work-detail">
            @include('pc.components.SectionTit', ['main' => '施工详情', 'sub' => 'CONSTRUCTION DETAILS'])

            <div class="ctn">
                <div class="layer">
                    <div class="p-wrap">
                        @if($item = $constructList->get(0))
                            <div class="ctn-big">
                                <div class="item-unit">
                                    <img src="{{$item->suolve}}" alt="">
                                    <div class="item-tit">{{$item->title}}</div>
                                    <div class="img-layer">
                                        <div class="p-abs-center">
                                            <div class="layer-tit">{{$item->title}}</div>
                                            <a class="layer-btn" href="/house/construct/{{$item->id}}"
                                               target="_blank">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($item = $constructList->get(1))
                            <div class="ctn-mid">
                                <div class="item-unit">
                                    <img src="{{$item->suolve}}" alt="">
                                    <div class="item-tit">{{$item->title}}</div>
                                    <div class="img-layer">
                                        <div class="p-abs-center">
                                            <div class="layer-tit">{{$item->title}}</div>
                                            <a class="layer-btn" href="/house/construct/{{$item->id}}"
                                               target="_blank">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="ctn-small">
                            @if($item = $constructList->get(2))
                                <div class="item-unit">
                                    <img src="{{$item->suolve}}" alt="">
                                    <div class="item-tit">{{$item->title}}</div>
                                    <div class="img-layer">
                                        <div class="p-abs-center">
                                            <div class="layer-tit">{{$item->title}}</div>
                                            <a class="layer-btn" href="/house/construct/{{$item->id}}"
                                               target="_blank">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($item = $constructList->get(3))
                                <div class="item-unit">
                                    <img src="{{$item->suolve}}" alt="">
                                    <div class="item-tit">{{$item->title}}</div>
                                    <div class="img-layer">
                                        <div class="p-abs-center">
                                            <div class="layer-tit">{{$item->title}}</div>
                                            <a class="layer-btn" href="/house/construct/{{$item->id}}"
                                               target="_blank">查看详情</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <a href='/construct' class="more">
                            <div class="p-abs-center">
                                更<br>多<br>施<br>工<br>
                                <div class="dot">.<br>.<br>.</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{--品牌展示--}}
        @include('pc.components.BrandShow')
    </div>


    <script>
        $(function () {
            var $scroll = $('.scroll-ctn')
            var height = $scroll.height()
            var top = 0
            setInterval(function () {
                if (top <= -height + 230) {
                    top = 0
                }
                top = top - 0.5
                $scroll.css('top', top)
            }, 16)
        })
    </script>
@endsection