<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('basic1' ,function(){
//    return 'hello';
//});
////多请求路由
//Route::match(['get','post'],'multy' ,function(){
//    return 'multy';
//});
//Route::any('multy2' ,function(){
//    return 'multy2';
//});
////路由参数
//Route::get('user/{id}' ,function($id){
//    return 'user-id-'.$id;
//});
//Route::get('user/{name?}' ,function($name){
//    return 'user-name-'.$name;
//});
//Route::get('user/{id}{name?}' ,function($id ,$name){
//    return 'user-name-'.$name;
//})->where(['id'=>'' ,'name'=>'[A-Za-z]']);

//路由别名
//Route::get('user/member-cent',['as'=>'cent'] ,function (){
//    return 'member-cent';
//});
//路由群组
//Route::group(['prefix'=>'member'] ,function (){
//    Route::get('member-cent' ,function (){
//        return 'member-cent';
//    });
//
//    Route::get('user' ,function(){
//        return 'user';
//    });
//});
//Route::get('member/info/{id}' ,'MemberController@info');
Route::get('member/info' ,['uses' =>'MemberController@info']);
Route::get('member/query1' ,['uses' =>'MemberController@query1']);
Route::get('member/query4' ,['uses' =>'MemberController@query4']);Route::get('member/query4' ,['uses' =>'MemberController@query4']);
Route::get('member/orm1' ,['uses' =>'MemberController@orm1']);Route::get('member/query4' ,['uses' =>'MemberController@query4']);
Route::any('member/url' ,['as'=>'url' ,'uses'=>'MemberController@urlTest']);
Route::get('member/query4' ,['uses' =>'MemberController@query4']);
Route::get('member/request1' ,['uses' =>'MemberController@request1']);

Route::group(['middleware' => ['web']], function () {
    Route::get('member/session1' ,['uses' =>'MemberController@session1']);
    Route::get('member/session2' ,['uses' =>'MemberController@session2']);
});

Route::get('member/response' ,['uses' =>'MemberController@response']);
Route::get('member/test' ,['uses' =>'MemberController@test']);
Route::any('upload' ,['uses' =>'UploadController@index']);
Route::any('member/cache1' ,['uses' =>'MemberController@cache1']);
Route::any('member/cache2' ,['uses' =>'MemberController@cache2']);
Route::any('member/error' ,['uses' =>'MemberController@error']);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
