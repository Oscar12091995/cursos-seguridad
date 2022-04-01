<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
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
            'title' => 'required | min:3 | max: 200',
            'slug' => 'required',
            'description' => 'required | max:1000',
            'course_id' => 'required',
            'finished_at' => 'nullable | after:'.now(),
            
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Titulo del cuestionario',
            'description' => 'Descripción',
            'finished_at' => 'Fecha de finalización',
        ];
    }
}
