{{--品牌展示--}}
<div class="m-brand-show">
    @include('pc.components.SectionTit', ['main' => '合作品牌', 'sub' => 'BRAND DISPLAY'])

    <div class="p-wrap">
        <div class="brand-ctn">
            <div class="brand-scroll">
                @foreach($brand as $item)
                    <div class="brand-item">
                        <a href="/brand/{{$item->first()->id}}" target="_blank">
                            <img src="{{$item->first()->url}}" alt="品牌">
                        </a>

                        <a href="/brand/{{$item->last()->id}}" target="_blank">
                            <img src="{{$item->last()->url}}" alt="品牌">
                        </a>
                    </div>
                @endforeach
            </div>

            <a href='/brand-display' class="more">更<br>多<br>
                <div class="dot">.<br>.<br>.</div>
            </a>
        </div>
    </div>

    <script>
        $(function () {
            var $scroll = $('.brand-scroll')
            var count = '{{count($brand)}}'
            var width = count * 200
            $scroll.css('width', width)
            var left = 0
            if (count <= 6) {
                return
            }

            setInterval(function () {
                if (left <= -width + 1200) {
                    left = 0
                }
                left = left - 0.5
                $scroll.css('left', left)
            }, 16)
        })
    </script>
</div>