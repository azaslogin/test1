<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => fake()->sentence(6),
            'rating' => fake()->numberBetween(1, 5),
            'movie_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
