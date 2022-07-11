<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppealRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'unique:App\Models\Appeal,phone|required|digits:11',
            'appealText' => 'required|string|max:255',
        ];
    }

     /**
     * Здесь задаём человеческие имена для наших полей для сообщений валидации
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'appealText' => 'Обращение',
        ];
    }

    /**
     * Здесь можно переопределить сообщения для разных случаев валидации
     * (указывается имя поля и через точку правило валидации)
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Поле :attribute обязательно для заполнения',
            'phone.digits' => 'Телефон должен состоять из 11 цифр',
            'phone.unique' => 'На этот телефон уже зарегистрировано обращение',
        ];
    }
}
