@extends('layout')
@section('header')
    {{--输出父模板的内容--}}
    @parent
    hello
    @stop
{{--yield一样使用--}}
@section('content')
    content
    {{--模板中输出PHP变量--}}
    <p>{{$name}}</p>
    <p>{{date('Y-m-d H:i:s')}}</p>
    <p>{{is_array($arr) ? true : false}}</p>

    <p>{{isset($name) ? $name :'default'}}</p>
    <p>@{{$name}}</p>

    {{--模板中的注释看不见--}}

    {{--引入子试图--}}
    @include('member.common' ,['message' =>'helloword'])

    @if($name =='imooc')
        i'm imooc
    @elseif($name =='sunna')
        i'm sn
    @endif
    <a href="{{ url('member/url')}}">url</a><br>
    <a href="{{action('MemberController@urlTest')}}">url</a><br>
    <a href="{{route('url')}}">url</a><br>


@stop
