@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    <div class='m-article-detail-2'>
        <div class="p-wrap">
            <h2 class="article-tit">{{$item->zl_title}}</h2>
            <div class="article-ctn">
                {!! $item->zl_content !!}
            </div>
        </div>
    </div>
@endsection