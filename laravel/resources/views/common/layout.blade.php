<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet">
    @section('style')
          @show
</head>
<body>

<!-- 头部 -->
@section('header')
    <div class="jumbotron">
        <div class="container">
            <h2>轻松学会Laravel</h2>

            <p> - 玩转Laravel表单</p>
        </div>
    </div>
@show
<div class="container">
    <div class="row">
        <!-- 右侧内容区域 -->
        <div class="col-md-9">

            @yield('content')

        </div>
    </div>
</div>
<!-- 尾部 -->
@section('footer')
    <div class="jumbotron" style="margin:0;">
        <div class="container">
            <span>  @2016 imooc</span>
        </div>
    </div>
@show
<!-- jQuery 文件 -->
<script src="{{ asset('static/js/jquery-2.1.4.js') }}"></script>
<!-- Bootstrap JavaScript 文件 -->
<script src="{{ asset('static/js/bootstrap.js') }}"></script>

@section('javascript')

@show

</body>
</html>