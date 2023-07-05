<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    protected $model = User::class;   //Especifico el modelo que va a usar

    public function definition(): array
    {
        return [
            'role' => $this->faker->randomElement(['admin', 'user']),
            'name' => $this->faker->name,
            'nick' => $this->faker->userName,
            'username' => $this->faker->unique()->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Puedes ajustar la contraseña a tu preferencia
            'image' => $this->faker->imageUrl(), // Puedes ajustar la generación de la imagen a tu preferencia
            'updated_at' => now(),
            'created_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
