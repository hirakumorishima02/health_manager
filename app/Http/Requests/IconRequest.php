<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IconRequest extends FormRequest
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
            'icon_day' => 'required',
            'health' => 'required',
        ];
    }
    
    public function messages()
    {
        return[
            'icon_day.required' => '健康状態の日付を入力して下さい。',
            'health.required' => '健康状態を最低1つは選んでください。',
            ];
    }
}
