<div class="m-question-side">
    <div class="head-tit">装修小知识</div>
    <div class="item-ctn">
        @foreach($commonList as $item)
            <a href="/question/{{$item->id}}" class="item-unit">
                <div class="item-tit">{{$item->question}}</div>
                <div class="item-desc">{{strlen($item->answer) > 150 ? substr($item->answer, 0, 150) . '...' : $item->answer}}</div>
            </a>
        @endforeach
    </div>
</div>