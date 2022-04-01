<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3,7));
        return [
            'title' => $title,
            'description' => $this->faker->paragraph(),
            'slug' => Str::slug($title),
            'course_id' => Course::all()->random()->id,
        ];
    }
}
