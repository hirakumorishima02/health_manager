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

// Memoの追加・編集・削除機能
    // 追加
Route::post('/memo','CalendarController@postMemo');
    // 編集
Route::get('/memo/{id}','CalendarController@getMemoId');
    // 削除
Route::delete('/delete_memo','CalendarController@deleteMemo');

// iconの追加・編集・削除機能
    // 追加
Route::post('/icon_save','CalendarController@postIcon');
    // 編集
Route::get('/icon/{id}','CalendarController@getIconId');
    // 削除
Route::delete('/delete_icon','CalendarController@deleteIcon');

// アバター登録(S3)
Route::get('/avatar', 'UserController@avatar');
Route::post('/avatar_upload', 'UserController@avatarUpload');