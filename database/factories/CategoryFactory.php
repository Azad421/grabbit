<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->jobTitle;
        return [
            'category_name' => $title,
            'category_slug' => Str::slug($title, '-'),
            'image' => 'service-2.jpg',
            'description' => $this->faker->text,
            'category_status' =>  $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
