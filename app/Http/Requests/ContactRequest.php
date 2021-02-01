<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'message' => 'required',
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
            'email.required' => 'Емаил обязательно',
            'email.email' => 'Проверьте емаил на корректность',
            'phone.required' => 'Телефон обязателен',
            'name.required' => 'Имя обязательно',
            'message.required' => 'Сообщение обязательно',
        ];
    }
}
