<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'memo_day' => 'required',
            'memo' => 'required|max:50',
        ];
    }
    
    public function messages()
    {
        return[
            'memo_day.required' => 'メモの日付を入力して下さい。',
            'memo.required' => 'メモを記入してください。',
            'memo.max' => 'メモは50文字以内で記入してください。',
            ];
    }
}
