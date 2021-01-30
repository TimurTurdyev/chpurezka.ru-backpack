<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|min:5|max:128',
            'short_name' => 'required|min:5|max:128',
            'title' => 'required|min:5|max:128',
            'sub_title' => 'required|min:5|max:128',
            'image' => 'required',
            'banner' => 'required',
            'meta_title' => 'required|min:5|max:255',
            'meta_description' => 'required|min:5|max:255',
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
            'name.required' => 'Название обязательно!',
            'short_name.required' => 'Короткое название обязательно!',
            'title.required' => 'Заголовок обязателен!',
            'image.required' => 'Главная картинка обязателена!',
            'banner.required' => 'Баннер обязателен!',
            'sub_title.required' => 'Подзаголовок обязателен!',
            'meta_title.required' => 'Мета тайтл обязателен!',
            'meta_description.required' => 'Мета описание обязательно!',
        ];
    }
}
