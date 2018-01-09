@extends('pc.layout.Layout', ['nav' => 3])

@section('content')
    <div class='m-explain'>
        <span class="explain-bg"></span>
        <div class="explain-box">
            <div class="explain-box-title">
                <h3>{{$data->get('mainTit')}}</h3>
                <h6>{{$data->get('subTit')}}</h6>
            </div>
            <div class="explain-box-content">
                {!! $item->content !!}
            </div>
        </div>
    </div>
@endsection