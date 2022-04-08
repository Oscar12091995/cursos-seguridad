<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
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
            'quize_id'=> rand(1),
            'point' => rand(0,100),
            'correct' => rand(1),
            'wrong' => rand(0),
        ];
    }
}
