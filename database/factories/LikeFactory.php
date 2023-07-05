<?php

namespace Database\Factories;
use App\Models\Like;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Termwind\Components\Li;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Like::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'image_id' => Image::inRandomOrder()->first()->id,
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
