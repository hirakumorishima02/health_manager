@extends('layouts.app')
@section('title', '体調管理')
@section('content')
<h3>体調管理アプリ</h3>
    {!!$cal_tag!!}
    <a href="#modal01" class="modalOpen">
    <button class="btn btn-primary">予定の登録</button>
    </a>
    
    <div class="modal" id="modal01">
        <div class="overLay modalClose"></div>
            <div class="inner">
                <h3>予定登録</h3>
                <form method="POST" action="memo" autocomplete="off"> 
                <div class="form-group">
                {{csrf_field()}}   
                <label for="memo_day">日付</label>
                <input type="text" name="memo_day" class="form-control datepicker-form" id="memo_day">
                <label for="memo">説明</label>
                <input type="text" name="memo" class="form-control" id="memo"> 
                </div>
                <button type="submit" class="btn btn-primary">登録</button> 
                </form> 
            <a href="" class="modalClose">Close</a>
            </div>
    </div>

@if($errors->any())
<p>入力にミスがあります。</p>
 <div class="error">
   <ul>
     @foreach($errors->all() as $message)
       <li class="error">{{ $message }}</li>
     @endforeach
   </ul>
 </div>
@endif


@endsection

