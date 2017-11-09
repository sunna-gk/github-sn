<?php
namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller{

    public function info(){
//        return 'member'.$id;
//        return view('member/info',[
//            'name'=>'sunna'
//        ]);
//        $bool = DB::insert('insert into member(name,age) VALUES (? ,?)' ,['sunna' ,25]);
//        var_dump($bool);return;
//        DB::update('update member set age = ? where NAME = ?' ,[20 ,'sunna']);
//        $members = DB::select('select * from member');
//        var_dump($members);
    }

    public function query1(){
        $bool = DB::table('member')->insert(['name'=>'sunna1' ,'age'=>18]);
        $id = DB::table('member')->insertGetId(['name'=>'sunna2' ,'age'=>18]);
        $bool = DB::table('member')->insert([
            ['name'=>'sunna3' ,'age'=>18],
            ['name'=>'sunna4' ,'age'=>18],
            ['name'=>'sunna5' ,'age'=>18]
        ]);
        var_dump($bool);
    }

    public function query2(){
     $num = DB::table('member')->increment('age'); //自增1
     $num = DB::table('member')->increment('age' ,3);
     $num = DB::table('member')->decrement('age');
     $num = DB::table('member')->decrement('age')->where('id' ,6);
     var_dump($num);
    }

    public function query3(){
        $num = DB::table('member')
            ->where('id' ,'>=' ,24)
            ->delete(); //自增1
//        DB::table('member')->truncate(); //全部删除无返回值
        var_dump($num);
    }
    //get(),first(),where(),plunk(),lists(),select(),chunk();
    public function query4(){
//        $members = DB::table('member')->get();//获取所有
//        $members = DB::table('member')
//            ->orderBy('id' ,'desc')
//            ->first();//返回一条
//          $members = DB::table('member')
//              ->whereRaw('id > ? and age > ?' ,[5 ,18])
//              ->get();//获取所有

//             $members = DB::table('member')
//              ->pluck('name');//获取指定列
//        $members = DB::table('member')
//            ->lists('name' ,'id');//以id为主键获取指定列
//        $members = DB::table('member')
//            ->select('name' ,'id')
//            ->get();
        echo '<pre>';
        $members = DB::table('member')
            ->chunk(2 ,function ($students){
                var_dump($students);
            })
            ->get();
        var_dump($members);
        echo '</pre>';
    }

    public function query5(){
//        count,sum,max .min
    }

    public function orm2(){
        $members = Member::all();
        $members = Member::find(9);//根据主键查找
        $members = Member::findOrFail(9);//根据主键查找，如果不存在报错
        $members = Member::get(); //==all()
        $members = Member::where('id' ,'>' ,7)
        ->orderBy('age' ,'desc')
        ->first();
        echo '<pre>';
        Member::chunk(2,function ($members){
//            var_dump($members);
        });
        $max =  Member::where('id' ,'>=' ,7)->max('age');
        var_dump($max);
    }

    public function orm3(){
//        date_default_timezone_set("PRC");
//        echo date('Y-m-d H:i:s');
//        return;
//        $mem = new Member();
//        $mem->name = 'test4';
//        $mem->age = 13;
//        $mem->save();
//        $mem = Member::create([
//            'name' =>'sunna',
//            'age' => 12
//        ]);
        //以属性查找用户，没有新增
//        $mem = Member::firstOrCreate([
//            'name' =>'sunna',
//        ]);
        //以属性查找用户，若没有建立新的实例，需要保存手动调save;
//        $mem = Member::firstOrNew([
//            'name' =>'sunna456',
//        ]);
//        $mem->save();
//        var_dump($mem);
    }
    public function orm1(){
//        var_dump(phpinfo());return;
//        echo date('Y-m-d H:i:s');return;
//        $mem = Member::find(2);
//        $mem->name = 'imooc';
//        $mem->save();
//        $mem = Member::where('id' ,'>' ,20)->update(['age'=>'10']);
//        var_dump($mem);
        $name = 'imooc';
        $arr = ['s1' ,'s2'];
        return view('member.section',[
            'name' =>$name ,
            'arr' =>$arr,
            'url' =>'url'
        ]);
    }
    public function urlTest(){
        echo 'come test';
    }

    public function request1(Request $request){
//        echo $request->input('name');
//        echo $request->input('sex' ,'know');
//        if($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo 'not have';
//        }
//        echo '<br>';
//        $res = $request->all();
//        dd($res);
        echo $request->method();
        echo $request->isMethod('get');
        echo $request->ajax();
        $res = $request->is('member/*');
        var_dump($res);
        echo $request->url();
    }

    public function session1(Request $request){
        //三种string类型的value
//        $request->session()->put('key1' ,'value1');
//        session()->put('key2' ,'value2');
//        Session::put('key3' ,'value3');

        //value 是数组
//        Session::push('name' ,'imooc');
//        Session::push('name' ,'imooc');
        //暂存数据(只有第一次取能取到数据)
        Session::flash('session-flash' ,'value-flash');
    }

    public function session2(Request $request){
        return Session::get('message1' ,'default');
        //取数据
//        var_dump($request->session()->get('key1'));
//        echo session()->get('key2');
//        echo Session::get('key3');
//        $res = Session::get('name');
//        var_dump($res);
        //取数据并删除
//        var_dump(Session::pull('name'));
        //获取所有
        $res = Session::all();
        dd($res);
        Session::forget('key1'); //删除一个
//        Session::flush();//删除全部
    }

    public function response(){
        $data = [
            'errorCode' =>0,
            'errMsg' =>'error',
            'data' =>'sean'
        ];
        //转json
//        return response()->json($data);
        //重定向
//        return redirect('member/session2');
//        带数据
        return redirect('member/session2')->with('message1' ,'hello');

        //action

        //返回上一个页面
        return redirect()->back();

    }

    public function test(){
        echo date('Y年m月d日', time());return;
        Redis::set('key' ,'value');
        if(Redis::exists('key')){
            //根据键名获取键值
            dd(Redis::get('key'));
        }
    }

    public  function cache1(){
        Cache::put('key1' ,'value1' ,10);
        Cache::add('key2' ,'value2' ,10);//有返回值，如果存在key1 返回false，不存在返回true
        Cache::forever('key3' ,'value3');//永久存储
        Cache::has('key1');//判断key1是否存在
    }

    public  function cache2(){
        $key1 = Cache::get('key1');
        Cache::pull('key1');//取完缓存之后删除
        $bool = Cache::forget('key1');//删除
        var_dump($key1);
    }
    public  function error(){
        return view('member.index');
//        abort('503');
//        Log::info('test sn');
//        Log::warning('test warning');
//        Log::error('test error ' ,['name' =>'sn']);
    }
}
