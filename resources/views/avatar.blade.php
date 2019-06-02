@extends('layouts.app')
@section('title', '体調管理')
@section('content')
<h3>アバター登録</h3>
{{ Form::open(['url' => '/avatar_upload', 'method' => 'post', 'files' => true]) }}

@if ($errors->any())
    <div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

<div>
    @if ($user->avatar_path)
        <p>
            <img src="{{ $user->avatar_path }}"/>
        </p>
    @endif
    {{ Form::label('file', 'アバター画像アップロード') }}
    {{ Form::file('file') }}
</div>

<div>
    {{ Form::submit('アップロード') }}
</div>
{{ Form::close() }}

@endsection