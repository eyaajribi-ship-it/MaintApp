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
            'authorId' => \App\Models\User::all()->random()->id, // Prend un user existant au hasard
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'summary' => fake()->paragraph(),
            'content' => fake()->text(),
            'published' => 1,
            'publishedAt' => now(),
        ];
    }
}
