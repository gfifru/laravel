<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
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
            'title' => 'required|min:3|max:255',
//            'slug' => 'required|min:3|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required|min:3|max:10000',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Поле [:attribute] не должно быть пустым!',
            'min' => 'Поле [:attribute] должно содержать минимум [:min] знака!',
            'max' => 'Поле [:attribute] должно содержать максимум [:max] знаков!',
            'numeric' => 'Поле [:attribute] должно содержать только цифры!'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
//            'slug' => 'Url',
            'category_id' => 'Категория',
            'description' => 'Текст',
        ];
    }
}
