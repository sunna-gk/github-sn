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
        ͷ��
        @show
    </div>
    <div class="main">
        <div class="sidebar">
            @section('sidebar')
            �����
            @show
        </div>
        <div class="content">
            @yield('content' ,'��Ҫ����')
        </div>
    </div>
    <div class="footer" style="clear: both;">
        @section('footer')
        �ײ�
        @show
    </div>
</body>
</html>
