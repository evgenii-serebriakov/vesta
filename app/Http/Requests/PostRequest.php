<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3',
            'message' => 'required|min:5',
            'image' => 'max:5048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле!',
            'title.min' => 'Минимальная длинна заголовка 3 символа!',
            'message.required' => 'Заполните поле!',
            'message.min' => 'Минимальная длинна описания 5 символов!',
        ];
    }
}
