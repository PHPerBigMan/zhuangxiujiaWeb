{{--主banner--}}
<div id="m-main-banner" class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($banner as $item)
            <div class="swiper-slide">
                <a href="{{$item->href}}">
                    <div  class="zoomImage" style="background: url('{{$item->banner_url}}') no-repeat center top;background-size: 100%"></div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="main-video">
        <video src="{{ $video }}" id="videobtn" pause loop controls="controls" height="100%" width="100%">
            您的浏览器不支持 video 标签。
        </video>
    </div>
    <!-- 如果需要分页器 -->
    <div class="swiper-pagination"></div>

    <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<script>
    $(function () {

        $('#videobtn').click(function() {
            if ($(this).hasClass('pause') ) {
                $("video").trigger("play")
                $(this).removeClass('pause')
                $(this).addClass('play')
            } else {
                $("video").trigger("pause")
                $(this).removeClass('play')
                $(this).addClass('pause')
            }
        });
        new Swiper('#m-main-banner', {
            loop: true,

            autoplay: 5000,

            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // 如果需要前进后退按钮
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    })
</script>
