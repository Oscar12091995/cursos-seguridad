<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->sentence(),
            'tipo' => 'video',
            'url' => 'https://www.youtube.com/watch?v=k1FrobAZLMU',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/8J-qpZbw4pw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id' => 1
        ];
    }
}
