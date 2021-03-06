@extends('layouts.app')
@section('title', '体調管理')
@section('content')
        <h3>体調登録</h3>
        <form method="POST" action="/icon_save" autocomplete="off"> 
                <div class="form-group">
                    {{csrf_field()}}   
                    <label for="icon_day">日付</label>
                    <input type="text" name="icon_day" class="form-control datepicker-form" id="icon_day" value="{{$data->icon_day}}">
                        <div class="form-inline">
                            <input type="checkbox" name="health[]" class="form-control" id="health" value="1">健康　
                            <input type="checkbox" name="health[]" class="form-control" id="health" value="2">食欲不振　
                            <input type="checkbox" name="health[]" class="form-control" id="health" value="3">めまい　
                            <input type="checkbox" name="health[]" class="form-control" id="health" value="4">低血圧　
                            <input type="checkbox" name="health[]" class="form-control" id="health" value="5">風邪
                        </div>
                </div>
            <input type="hidden" name='id' value="{{$data->id}}">
            <button type="submit" class="btn btn-primary">更新</button> 
        </form> 
        <form method="POST" action="/delete_icon" method="post">
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