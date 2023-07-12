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
            'judul' => fake()->sentence(2, true),
            'slug' => fake()->words(2, true),
            'excerpt' => fake()->paragraph(1, true),
            'body' => fake()->paragraphs(5, true),
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3)
        ];
    }
}
