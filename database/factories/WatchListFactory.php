<?php

namespace Database\Factories;

use App\Models\WatchList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\WatchListTypes;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WatchList>
 */
class WatchListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'name' => $this->faker->sentence(3),
            'image_url' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(WatchListTypes::cases())->value, // Get random enum value
        ];
    }
}
