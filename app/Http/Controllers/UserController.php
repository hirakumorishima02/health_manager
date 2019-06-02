<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function avatar()
    {
        $user = User::find(auth()->id());
        return view('avatar', compact('user'));
    }

    public function avatarUpload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=20,min_height=20,max_width=400,max_height=400',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            // S3にアップロード
            $path = $request->file->store('avatar', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $url = Storage::disk('s3')->url($path);

            // パスをDBに保存
            $user = User::find(auth()->id());
            $user->avatar_path = $url;
            $user->save();

            return redirect('/')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}
