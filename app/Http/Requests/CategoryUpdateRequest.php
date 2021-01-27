<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:200',
//            'slug' => 'unique:App\Models\NewsCategory,slug'
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
//            'unique' => 'Поле [URL] должно быть уникальным'
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
        ];
    }
}
