<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->paragraph(random_int(2, 3)),
            'content' => $this->faker->paragraph(random_int(10, 20)),
            'user_id' => User::factory()->create(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
