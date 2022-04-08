<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(mt_rand(1,8)),
            "slug" => $this->faker->slug(),
            "body" => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(
                function($p) {
                    return "<p>$p</p>";
                }
            )->implode(""),
            "user_id" => mt_rand(1, 20),
            "category_id" => mt_rand(1,3)
        ];
    }
}