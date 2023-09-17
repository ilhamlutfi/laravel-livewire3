<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
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
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        return [
            'user_id'       => fake()->randomElement($userIds),
            'category_id'   => fake()->randomElement($categoryIds),
            'title'         => fake()->sentence(),
            'status'        => fake()->boolean(2),
            'description'   => fake()->paragraph(),
            'image'         => 'default.jpg',
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
