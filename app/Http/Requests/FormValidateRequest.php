<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidateRequest extends FormRequest
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
            'name' => 'required|max:30|',
            'code' => 'required|max:30|alpha_dash|unique:tags,code',
            'sort' => 'required|numeric|unique:tags,sort'
        ];
    }

    public function messages()
    {
     return [
         'name.required' => 'Поле Имя - обязательное',
         'code.required' => 'Поле Код - обязательное',
         'sort.required' => 'Поле Сортировка - обязательное',
         'code.alpha_dash' => 'Поле Код должен состоять из английских букв, цифр и знака тире',
         'code.unique' => 'Такой код уже существует',
         'sort.numeric' => 'Сортировка должно быть числовое значение',
         'sort.unique' => 'Такое значение сортировки уже существует в списке'
     ]; 
    }
}
