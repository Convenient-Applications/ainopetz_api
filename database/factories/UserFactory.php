<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'profile_image' => $this->faker->imageUrl(200, 200, 'pets', true),
            'bio' => $this->faker->sentence(),
            'remember_token' => Str::random(10),
        ];
    }
}
