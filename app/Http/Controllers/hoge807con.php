<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\threadRequest;
use App\Http\Requests\textRequest;
use App\Thread;
use App\Text;
class hoge807con extends Controller
{
    public function get_main(Request $request){
        $pages = Thread::paginate(2);
        // $txts = array();
        // foreach($pages->items() as $page){
        // $txts[] = $page->texts()->take(10)->get();
        // }
        return view('main',compact('pages'));
    }
    public function create_thread(threadRequest $request){
        $thread = new Thread(['title'=>$request->title]);
        $thread->save();
        $text = new Text(['name'=>$request->name?:'ななし','mail'=>$request->mail?:'piyo@piyo.com','text'=>$request->text]);
        $text->ip = substr(md5($_SERVER["REMOTE_ADDR"]),0,10);
        $thread->texts()->save($text);
        //$thread->id get
        return redirect()->route("thread",[$thread]);
    }

    public function get_thread(String $number)
    {
        preg_match('/^\d{1,5}$/',$number)?$thread = Thread::find($number):(function(){return redirect()->route('main');})();
        if(isset($thread)){
            $texts = $thread->texts()->get();
            isset($text)?:(function(){return redirect()->route('main');})();
            return view('thread_page',compact('thread','texts'));
        }
        return redirect()->route('main');
    }

    public function post_thread(textRequest $request,String $number)
    {   $thread = Thread::find($number);
        $text = new Text(['name'=>$request->name?:'ななし','mail'=>$request->mail?:'piyo@piyo.com','text'=>$request->text]);
        $text->ip = substr(md5($_SERVER["REMOTE_ADDR"]),0,10);
        $thread->texts()->save($text);
        $texts = $thread->texts()->get();
        return view('thread_page',compact('thread','texts'));
    }
    public function thread_koushin(){
        $threads = Thread::all();
        //曜日を加えるだけ
        $counts = $threads->map(function($thread){return '('.count($thread->texts()->get()).')';});
        return compact('threads','counts');

    }
    //array $textsを返却
    public function texts_koushin(Request $request){
        $str =  mb_convert_encoding($request->href, "SJIS", "SJIS");
        $arr = explode('/',$str);
        $key = end($arr);
        $thread = Thread::find($key)?:null;
        $texts = $thread?$thread->texts()->get():null;
        return compact('texts');
        // $id = substr(md5($_SERVER["REMOTE_ADDR"]),0,10);
        // $arr = array('日', '月', '火', '水', '木', '金', '土');
                // $days = $threads->pluck("created_at");
        // $days = $days->map(function($data) use($arr){return $data->format("Y年m月d日").'('.$arr[$data->dayOfWeek].')';});
    }
    //ペジネーションテスト
    public function test2(){
        return view("test2",["th_texts"=>Thread::first()->texts()->paginate(2)]);
    }
}
