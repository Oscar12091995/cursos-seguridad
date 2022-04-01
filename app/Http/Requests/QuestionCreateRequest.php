<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
            'question' => 'required | min:3',
            'image' => 'image|nullable|max:1024|mimes:jpg,jpeg,png ',
            'answer1' => 'required | min:1',
            'answer2' => 'required | min:1',
            'answer3' => 'required | min:1',
            'answer4' => 'required | min:1',
            'correct_answer' => 'required',

        ];
    }

    public function attributes()
    {
        return [
            'question' => 'Pregunta',
            'image' => 'fotografía',
            'answer1' => '1. Respuesta',
            'answer2' => '2. Respuesta',
            'answer3' => '3. Respuesta',
            'answer4' => '4. Respuesta',
            'correct_answer' => 'Respuesta Correcta',

        ];
    }
}
