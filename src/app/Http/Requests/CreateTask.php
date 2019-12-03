<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attribute は必須です',
            'due_date.required' => ':attribute は必須です',
            'due_date.date' => ':attribute には日付を入力してください',
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください'
        ];
    }
}
