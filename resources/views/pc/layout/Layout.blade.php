<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title or '翼家装饰'}}</title>
    <link rel="stylesheet" href="{{mix('/css/pc.css')}}">
    <script src="https://cdn.bootcss.com/babel-polyfill/7.0.0-beta.3/polyfill.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/layer/layer.js"></script>
    <script src="{{mix('/js/pc.js')}}"></script>
</head>
<body>

<div class="m-content">
    @include('pc.layout.Header')
    @section('content')
    @show
</div>

@include('pc.layout.Footer')
</body>
</html>