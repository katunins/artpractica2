<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectValidateRequest extends FormRequest
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
            //
            'title' => 'required',
            'tags' => 'required',
            'title-image' => 'required|image',
            'sort' => 'required',
            'image' => 'required',
            'image.*' => "image"
        ];
    }

    public function messages()
    {
     return [
        'title.required' => 'Заполните Название проекта',
        // 'code.required' => 'Придумайте пожалуйста оригинальный код',
        'tags.required' => 'Выберете тег',
        'title-image.required' => 'Загрузите титульную фотографию',
        'title-image.image' => 'Файл для титульной фотографии не является изображением',
        'sort.required' => 'Укажите сортировку',
        'image.required' => 'Загрузите фотографии',
        'image.*.image' => 'Файл для портфолио не является изображением',
        'code.alpha_dash' => 'Поле Код должен состоять из английских букв, цифр и знака тире',
        'code.unique' => 'Такой код уже существует',
        'sort.numeric' => 'Сортировка должно быть числовое значение',
        'sort.unique' => 'Такое значение сортировки уже существует в списке'
     ]; 
    }
}