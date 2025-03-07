<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WatchList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'watch_list_id' => WatchList::inRandomOrder()->first()->id ?? WatchList::factory(),
            'name' => $this->faker->sentence(3),
            'image_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'runtime' => $this->faker->numberBetween(80, 180),
            'watch_url' => $this->faker->url(),
            'imdb_url' => $this->faker->url(),
        ];
    }
}
