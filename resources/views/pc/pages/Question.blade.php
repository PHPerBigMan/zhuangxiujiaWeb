@extends('pc.layout.Layout', ['nav' => 5])

@section('content')
    <div>
        <div class="m-question">
            <div class="p-wrap">
                <div class="right-area">
                    {{--侧栏--}}
                    @include('pc.components.question.SideColumn')
                </div>
                <div class="left-area">
                    {{--问题表单--}}
                    @include('pc.components.question.QuestionForm')

                    <div class="m-question-list">
                        <div class="question-tab">
                            <div class="tab-item active">历史问题</div>
                            <div class="tab-item">精彩回答</div>
                        </div>

                        <div class="question-ctn" id="question-swiper-1">
                            <div class="swiper-wrapper">
                                @foreach($list as $slice)
                                    <div class="swiper-slide">
                                        <table class="question-table">
                                            <colgroup>
                                                <col style="width: 40%; padding-right: 10px;"/>
                                                <col style="width: 20%;"/>
                                                <col style="width: 20%;"/>
                                                <col style="width: 10%;"/>
                                            </colgroup>

                                            <tbody>
                                            @foreach($slice as $item)
                                                <tr class="question-row"
                                                    onclick="location.href='/question/{{$item->id}}'">
                                                    <td>{{$item->question}}</td>
                                                    <td class="gray">{{$item->name}}</td>
                                                    <td class="gray">{{$item->created_at}}</td>
                                                    <td>
                                                        <div class="status">
                                                            已解答
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination" id="page-1"></div>
                        </div>

                        <div class="question-ctn" id="question-swiper-2">
                            <div class="swiper-wrapper">
                                @foreach($hotList as $slice)
                                    <div class="swiper-slide">
                                        <table class="question-table">
                                            <tbody>
                                            @foreach($slice as $item)
                                                <tr class="question-row"
                                                    onclick="location.href='/question/{{$item->id}}'">
                                                    <td>{{$item->question}}</td>
                                                    <td class="gray">{{$item->name}}</td>
                                                    <td class="gray">{{$item->created_at}}</td>
                                                    <td>
                                                        <div class="status">
                                                            已解答
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination" id="page-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--专享服务--}}
        @include('pc.components.Service')
    </div>

    <script>
        $(function () {
            var i = 1
            while (i <= 2) {
                swiperInit(i)
                i++
            }

            function swiperInit(i) {
                new Swiper('#question-swiper-' + i, {
                    loop: true,
                    autoplay: 5000,

                    // 如果需要分页器
                    pagination: {
                        el: '#page-' + i,
                        clickable: true,
                    },
                })
            }


            var $tab = $('.m-question-list .tab-item')
            var $ctn = $('.m-question-list .question-ctn')
            $ctn.eq(1).hide()
            $tab.click(function () {
                var $this = $(this)
                var index = $this.index()
                $tab.removeClass('active')
                $this.addClass('active')
                $ctn.hide()
                $ctn.eq(index).fadeIn()
            })
        })
    </script>
@endsection