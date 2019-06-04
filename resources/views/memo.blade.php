@extends('layouts.app')
@section('title', '予定管理')
@section('content')
                <h3>予定編集</h3>
                <form method="POST" action="/memo" autocomplete="off"> 
                    <div class="form-group">
                    {{csrf_field()}}   
                    <label for="memo_day">日付</label>
                    <input type="text" name="memo_day" class="form-control datepicker-form" id="memo_day" value="{{$data->memo_day}}">
                    <label for="memo">説明</label>
                    <input type="text" name="memo" class="form-control" id="memo" value="{{$data->memo}}"> 
                    </div>
                    <button type="submit" class="btn btn-primary">更新</button> 
                    <input type="hidden" name='id' value="{{$data->id}}">
                </form>
                <form method="POST" action="/delete_memo" method="post">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    {{ method_field('delete') }}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">削除</button>
                </form>
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