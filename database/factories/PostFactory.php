<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "image"=> fake()->imageUrl(640, 480, 'animals', true),
            "title"=> fake()->name(),
            "description"=> fake()-> sentence(),
            "user_id" => fake()->randomDigitNotNull()
        ];
    }
}
