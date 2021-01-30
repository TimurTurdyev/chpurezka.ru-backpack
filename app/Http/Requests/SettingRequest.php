<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'key' => 'required|max:255',
            'value' => 'required',
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
            'sub_title.required' => 'Подзаголовок обязателен!',
            'meta_title.required' => 'Мета тайтл обязателен!',
            'meta_description.required' => 'Мета описание обязательно!',
        ];
    }
}
