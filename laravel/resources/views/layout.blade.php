<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="GBK">
    <title>Title</title>
    <style>
        .main .sidebar {
            float:left;
            width:20%;
            height:inherit;
            background: #f5f5f5;
            border:1px solid #ddd;
        }

        .main .content {
            float:right;
            width:75%;
            height:inherit;
            background: #f5f5f5;
            border:1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        @section('header')
        头部
        @show
    </div>
    <div class="main">
        <div class="sidebar">
            @section('sidebar')
            侧边栏
            @show
        </div>
        <div class="content">
            @yield('content' ,'主要内容')
        </div>
    </div>
    <div class="footer" style="clear: both;">
        @section('footer')
        底部
        @show
    </div>
</body>
</html>
