<?php

namespace Database\Factories;

use App\Models\Quize;
use Illuminate\Database\Eloquent\Factories\Factory;


class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quize_id' => $this->faker->randomElement([1, 2]),
            'question' => $this->faker->sentence(rand(1,2)),
            'answer1' =>$this->faker->sentence(rand(2,4)),
            'answer2' =>$this->faker->sentence(rand(2,4)),
            'answer3' =>$this->faker->sentence(rand(2,4)),
            'answer4' =>$this->faker->sentence(rand(2,4)),
            'correct_answer' => 'answer'.rand(1,4),
        ];
    }
}
