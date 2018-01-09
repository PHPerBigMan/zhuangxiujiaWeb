<ul class="m-scrollBox">
    <li class="scroll-phone">
        <h3 class="s-phone-title">联系电话</h3>
        <h4 class="s-phone-info">{{ $phone }}</h4>
    </li>
    <li class="TowCode">
        <h4>{{ $ScrollTitle }}</h4>
        {{--<img class="Code-img" src="/images/towCode.png" alt="">--}}
        <img class="Code-img" src="{{ $qrcode }}" alt="">
    </li>
    <li class="goTop">
        <a href="javascript:;">
            <h4>置顶</h4>
            <img class="goTop-img" src="/images/gotop.png" alt="">
        </a>
    </li>
</ul>
<script>
    $(function () {
        $('.m-scrollBox').hide();
        $(document).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('.m-scrollBox').fadeIn();
            } else {
                $('.m-scrollBox').fadeOut();
            }
        })
        $('.goTop a').click(function () {
            $('html ,body').animate({scrollTop: 0}, 400);
            return false;
        });
    })
</script>