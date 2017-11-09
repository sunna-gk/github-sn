<?php
namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UploadController extends Controller{

    public function index(Request $request){
        if($request->isMethod('post')){
            $file = $request->file('source');
            if($file->isValid()){
                $originalfile = $file->getClientOriginalExtension();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realpath = $file->getRealPath();
                $fileName = date('Y-m-d-H-i-s').uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($fileName ,file_get_contents($realpath));
                dd($bool);
            }
        }

        return \view('upload/index');
    }
}
