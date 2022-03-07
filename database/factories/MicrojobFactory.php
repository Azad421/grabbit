<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

;

class MicrojobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle;
        return [
            'user_id' => 2,
            'job_title' => $title,
            'slug' => Str::slug($title, '-'),
            'category' => 2,
            'description' => $this->faker->realText,
            'job_duration' => 2,
            'image' => 'service-2.jpg',
            'budget' => 200,
            'status_id' => 1
        ];
    }
}
