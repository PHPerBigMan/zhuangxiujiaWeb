@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    @include('pc.components.SectionTit', ['main' => '品牌展示', 'sub' => 'BRAND DISPLAY'])
    <div class="m-about">
        <div class="p-wrap">
            <div class="left-area-brand ">
                <div class="m-nav-tab  ">
                    <div class="Brand-tab-item active">
                        <img class="tab-item-one" src="/images/img24.png" alt="">
                        <h3>主材</h3>
                    </div>
                    <div class="Brand-tab-item ">
                        <img class="tab-item-tow" src="/images/img26.png" alt="">
                        <h3>电器</h3>
                    </div>
                </div>
            </div>
            <div class="right-area-brand">
                <div class="right-area-brand-box" style="display:block">
                    <div class="m-brandshow-list">
                        @foreach($brand as $item)
                            <div class="list-unit">
                                <a href="/brand/{{$item->id}}" target="_blank">
                                    <img src="{{$item->url}}" class="brand-img" alt="品牌">
                                    <p>{{$item->name}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="right-area-brand-box">
                    <div class="m-brandshow-list">
                        @foreach($brand_2 as $item)
                            <div class="list-unit">
                                <a href="/brand/{{$item->id}}" target="_blank">
                                    <img src="{{$item->url}}" class="brand-img" alt="品牌">
                                    <p>{{$item->name}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(function () {
            var $tab = $('.m-nav-tab .Brand-tab-item')
            var $txt = $('.right-area-brand-box')
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