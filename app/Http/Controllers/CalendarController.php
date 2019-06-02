<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Memo;
use App\Icon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\MemoRequest;

class CalendarController extends Controller
{
    // Auth機能
    public function __construct()
    {
        $this->middleware('auth');
    }
    // indexでカレンダーデータ機能取得
    public function index(Request $request)
    {
        $memoList = Memo::all();
        $iconList = Icon::all();
        $cal = new Calendar($memoList,$iconList);
        $tag = $cal->showCalendarTag($request->month,$request->year);
        return view('index', ['cal_tag' => $tag]);
    }
    // memosのid取得
    public function getMemoId($id)
    {
        $data = new Memo();
        if (isset($id)) {
            $data = Memo::where('id', '=', $id)->first();
        }
        $list = Memo::all();
        return view('memo', compact('list', 'data', 'cal_tag'));
    }
    
    // memoの登録・更新
    public function postMemo(MemoRequest $request)
    {
        // POSTで受信したメモデータの登録
        if(isset($request->id)) {
            $memo_val = Memo::where('id', '=', $request->id)->first();
            $memo_val->memo_day = $request->memo_day;
            $memo_val->memo = $request->memo;   
            $memo_val->user_id = Auth::user()->id;
            $memo_val->save();
        } else {
            $memo_val = new Memo(); 
            $memo_val->memo_day = $request->memo_day;
            $memo_val->memo = $request->memo;       
            $memo_val->user_id = Auth::user()->id;
            $memo_val->save();   
        }
        $data = new Memo();
        $list = Memo::all();
        
        $memoList = Memo::all();
        $iconList = Icon::all();
        $cal = new Calendar($memoList,$iconList);
        $tag = $cal->showCalendarTag($request->month,$request->year);
        
        return redirect('/')->with(['list' =>$list, 'data' => $data, 'cal_tag' => $tag]);
    }
    
    public function deleteMemo(Request $request)
    {
        // DELETEで受信した休日データの削除
        if (isset($request->id)) {
            $memo = Memo::where('id', '=', $request->id)->first(); 
            $memo->delete();
        }
        // メモデータ取得
        $data = new Memo();
        $list = Memo::all();
        
        $memoList = Memo::all();
        $iconList = Icon::all();
        $cal = new Calendar($memoList,$iconList);
        $tag = $cal->showCalendarTag($request->month,$request->year);
        
        // return view('index', ['list' =>$list, 'data' => $data, 'cal_tag' => $tag]);
        return redirect('/')->with(['list' =>$list, 'data' => $data, 'cal_tag' => $tag]);
        
    }

    // S３の名残
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');
        return redirect('/');
    }
    // S3の名残
    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('disp', compact('path'));
    }
}
