<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/','CalendarController@index');
Route::get('/home', 'CalendarController@index')->name('home');
Route::resource('memos', 'CalendarController');

// Memoの追加機能
Route::post('/memo','CalendarController@postMemo');

// Memoに編集・削除機能を追加
    // 編集
Route::get('/memo/{id}','CalendarController@getMemoId');
    // 削除
Route::delete('/delete_memo','CalendarController@deleteMemo');

// アバター登録(S3)
Route::get('/avatar', 'UserController@avatar');
Route::post('/avatar_upload', 'UserController@avatarUpload');