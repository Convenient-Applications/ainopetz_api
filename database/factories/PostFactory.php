<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'content' => $this->faker->sentence(10),
            'likes_count' => 0,
            'comments_count' => 0,
            'shares_count' => 0,
        ];
    }
}
