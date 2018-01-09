@extends('pc.layout.Layout', ['nav' => 6])

@section('content')
    <div class="m-about">
        <div class="p-wrap">
            <div class="left-area">
                <div class="m-nav-tab">
                    @foreach($list as $item)
                        <div class="tab-item" >
                            <h4 class="tab-item-title">{{$item->title}}</h4>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="right-area">
                <div class="content">
                    @foreach($list as $items)
                        <div class="txt-ctn">
                            <p>{!! $items->content !!}</p>
                        </div>
                    @endforeach
                    {{--<div class="txt-ctn" style="display: block">--}}

                    {{--</div>--}}

                    {{--<div class="txt-ctn" style="text-align: center;">--}}

                    {{--</div>--}}

                    {{--<div class="txt-ctn">--}}

                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {


            var $tab = $('.m-nav-tab .tab-item')
                $tab .eq(0).addClass('active')
            var $txt = $('.txt-ctn')
                $txt.eq(0).css('display','block')
            $tab.click(function () {
                var $this = $(this)
                var index = $this.index()
                $tab.removeClass('active')
                $this.addClass('active')
                $txt.hide()
                $txt.eq(index).fadeIn()
            })
        })
    </script>
@endsection