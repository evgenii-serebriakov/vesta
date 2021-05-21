<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewsRequest extends FormRequest
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
            'image' => 'required|max:5048',
            'video' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Добавьте изображение!',
            'video.required' => 'Заполните поле!'
        ];
    }
}
