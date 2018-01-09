@extends('pc.layout.Layout', ['nav' => 5])

@section('content')
    <div>
        <div class="m-question">
            <div class="p-wrap">
                <div class="right-area">
                    {{--侧栏--}}
                    @include('pc.components.question.SideColumn')
                </div>
                <div class="left-area">
                    {{--问题详情--}}
                    <div class="m-question-detail">
                        <div class="question-tit">{{$item->question}}</div>
                        <div>
                            <span class="gray-txt">{{$item->name}}</span>
                            <span class="gray-txt">{{$item->created_at}}</span>
                            <span class="status">已解答</span>
                        </div>
                        <div class="question-tit">
                            专家已解答您的问题
                            <span class="gray-txt" style="margin-left: 20px;">{{$item->answer_at}}</span>
                        </div>
                        <p class="author">{{$item->author or '翼家装饰'}}：</p>
                        <p class="answer">{{$item->answer}}</p>
                    </div>

                    {{--问题表单--}}
                    @include('pc.components.question.QuestionForm')
                </div>
            </div>
        </div>

        {{--专享服务--}}
        @include('pc.components.Service')
    </div>
@endsection