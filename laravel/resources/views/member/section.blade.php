@extends('layout')
@section('header')
    {{--�����ģ�������--}}
    @parent
    hello
    @stop
{{--yieldһ��ʹ��--}}
@section('content')
    content
    {{--ģ�������PHP����--}}
    <p>{{$name}}</p>
    <p>{{date('Y-m-d H:i:s')}}</p>
    <p>{{is_array($arr) ? true : false}}</p>

    <p>{{isset($name) ? $name :'default'}}</p>
    <p>@{{$name}}</p>

    {{--ģ���е�ע�Ϳ�����--}}

    {{--��������ͼ--}}
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
