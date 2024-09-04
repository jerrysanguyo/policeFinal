<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected static ?string $password;
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'middle_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'mobile_number' => $this->faker->name(),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
