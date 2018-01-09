@extends('pc.layout.Layout', ['nav' => 1])

@section('content')
    <div class='m-article-detail-2'>
        <div class="p-wrap">
            <h2 class="article-tit">{{$item->name}}</h2>
            <div class="article-ctn">
                {!! $item->content !!}
            </div>
        </div>
    </div>
@endsection