<?php

namespace Database\Factories;
use App\Models\Answer;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,2),
            'question_id'=> rand(1, 2),
            'answer' => 'answer'.rand(1, 2)
        ];
    }
}
