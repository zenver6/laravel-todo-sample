<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
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
            'title' => 'required|max:20'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'フォルダ名は入力必須です',
            'title.max' => 'フォルダ名は最大 :max 文字です'
        ];
    }
}
