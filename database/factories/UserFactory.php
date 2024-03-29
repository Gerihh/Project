<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username"=> $this->faker->userName,
            "email"=> $this->faker->safeEmail,
            "password"=> Hash::make($this->faker->password),
            "profilePictureURL"=> $this->faker->imageUrl,
        ];
    }
}
