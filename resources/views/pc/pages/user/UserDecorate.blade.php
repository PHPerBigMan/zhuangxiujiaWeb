@component('pc.pages.user.UserLayout', ['tab' => 2])
    <div class="user-decorate-list">
        @foreach($list as $item)
            <div class="decorate-unit">
                <i class="decorate-time">{{$item->created_at}}</i>
                <ul class="decorate-list">
                    <li class="list-li">
                        <h4>房屋类型：</h4>
                        <p>{{$item->room_type}}</p>
                    </li>
                    <li class="list-li">
                        <h4>建筑面积：</h4>
                        <p>{{$item->room_mj}}m<sup>2</sup></p>
                    </li>

                    <li class="list-li">
                        <h4>称呼：</h4>
                        <p>{{$item->name}}</p>
                    </li>

                    <li class="list-li">
                        <h4>联系电话：</h4>
                        <p>{{$item->phone}}</p>
                    </li>
                </ul>
                <div class="examine-btn" data-id="{{$item->id}}">删除</div>
            </div>
        @endforeach
    </div>

    <script>
        $('.examine-btn').click(function () {
            $this = $(this)
            var id = $this.data('id')
            sendAjax('post', '/delete-decorate', {id: id})
                .then(function (res) {
                    layer.msg(res.msg, {icon: 1})
                    location.reload()
                })
        })
    </script>
@endcomponent