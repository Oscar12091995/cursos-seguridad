<?php

namespace Database\Factories;

use App\Models\Quize;
use App\Models\User;
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
            'user_id'=>User::all()->random()->id,
            'quize_id'=> Quize::all()->random()->id,
            'point' => rand(0,100),
            'correct' => rand(1, 2),
            'wrong' => rand(0),
        ];
    }
}
