@extends('pc.layout.Layout', ['nav' => 2])

@section('content')
    @include('pc.components.BannerImg')

    {{--热装小区--}}
    <div class="m-decorate-product" style="margin-bottom: 120px;">
        @include('pc.components.SectionTit', ['main' => '热装小区', 'sub' => 'HOT CHARGING DISTRICT'])

        <div class="p-wrap">
            <div class="label-search-bar">
                <div class="left-area">
                    <label>区域：</label>
                    @php($search = isset($search) ? $search : null)
                    @foreach(['全部', '市辖区','上城区','下城区','江干区','拱墅区','西湖区','滨江区','萧山区'] as $item)
                        @if($item == '全部')
                            <a class="label @if($search == null) active @endif"
                               href="/house-hot">{{$item}}</a>
                        @else
                            <a class="label @if($search == $item) active @endif"
                               href="/house-hot?search={{$item}}">{{$item}}</a>
                        @endif
                    @endforeach
                </div>
                <div class="right-area">
                    <input class="search-input" type="text" placeholder="请输入关键词" id="area-search">
                    <button class="search-btn" onclick="location.href= '/house-hot?search=' + $('#area-search').val()">
                        搜索
                    </button>

                    <script>
                        $(function () {
                            function handleSearch() {
                                location.href = '/house-hot?search=' + $('#area-search').val()
                            }

                            $('#area-search').on('keyup', function (e) {
                                if (e.keyCode == 13) {
                                    handleSearch()
                                }
                            })

                            $('#area-btn0').click(handleSearch)
                        })
                    </script>
                </div>
            </div>

            <div class="item-ctn">
                @foreach($data->get('list') as $item)
                    <div class="item-unit">
                        <img src="{{$item->suolve}}" alt="">
                        <div class="item-tit">{{$item->title}}</div>
                        <div class="img-layer">
                            <div class="p-abs-center">
                                <div class="layer-tit">{{$item->title}}</div>
                                <a class="layer-btn" href="/house/hot/{{$item->id}}">查看详情</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($data->get('noMore'))
                <div class="more" id="more">没有更多了</div>
            @else
                <a class="more" id="more" href="/house-hot?page={{$data->get('page')}}#more">点击加载更多</a>
            @endif
        </div>
    </div>
@endsection