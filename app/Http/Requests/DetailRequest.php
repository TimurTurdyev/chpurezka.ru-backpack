<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:128',
            'short_name' => 'required|max:128',
            'title' => 'required|max:128',
            'sub_title' => 'required|max:128',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
            'introduction' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes(): array
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
    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно!',
            'short_name.required' => 'Короткое название обязательно!',
            'title.required' => 'Заголовок обязателен!',
            'sub_title.required' => 'Подзаголовок обязателен!',
            'meta_title.required' => 'Мета тайтл обязателен!',
            'meta_description.required' => 'Мета описание обязательно!',
            'introduction.required' => 'Кракое описание обязательно!'
        ];
    }
}
