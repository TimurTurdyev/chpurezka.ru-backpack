<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required',
            'name' => 'required|max:128',
            'sub_name' => 'required|max:128',
            'image' => 'required',
            'description' => 'required',
            'status' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'rating.required' => 'Рейтинг обязателен!',
            'name.required' => 'Автор обязателен',
            'sub_name.required' => 'Компания обязательна',
            'image.required' => 'Аватарка обязательна',
            'description.required' => 'Описание необходимо',
            'status.required' => 'Стату не выбран',
        ];
    }
}
