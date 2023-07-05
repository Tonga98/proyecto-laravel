<?php

namespace Database\Factories;
use App\Models\coment;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coment>
 */
class ComentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Coment::class; //Asgino el modelo con el que trabaja

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'image_id' => Image::inRandomOrder()->first()->id,
            'content' => $this->faker->sentence,
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
