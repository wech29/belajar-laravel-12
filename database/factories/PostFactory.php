<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
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

        $title = fake()->sentence(rand(5, 8));

        return [
            'title' => $title,
            // 'slug' => $this->faker->slug(),                              ~> cara biasa
            'slug' => Str::slug($title),
            // 'author_id' => $this->faker->name(),                         ~> jika tidak menggunakan relasi
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'body' => fake()->paragraphs(4, true),
        ];
    }
}
