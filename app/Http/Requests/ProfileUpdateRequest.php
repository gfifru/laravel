<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле [:attribute] не должно быть пустым!',
            'min' => 'Поле [:attribute] должно содержать минимум [:min] знака!',
            'max' => 'Поле [:attribute] должно содержать максимум [:max] знаков!',
            'unique' => 'Поле [:attribute] должно быть уникальным'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'Эл. почта',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль',
        ];
    }
}
