<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WatchList;
use App\Models\Movie;
use App\Models\TvSeries;
use App\Models\WatchListItem;
use App\Enums\WatchListTypes;


class WatchListSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure there are users, movies, and TV series in the database
        Movie::factory(20)->create();
        TvSeries::factory(20)->create();

        // Get random users and movies/tv_series
        $users = User::all();
        $movies = Movie::all();
        $tvSeries = TvSeries::all();

        // Create 5 watch lists
        WatchList::factory(5)->create()->each(function ($watchList) use ($users, $movies, $tvSeries) {
            // Assign the watchlist to a random user
            $watchList->update([
                'user_id' => $users->random()->id,
            ]);

            // Attach 1-10 random movies to this watchlist
            $randomMovies = $movies->random(rand(1, 10));
            foreach ($randomMovies as $movie) {
                WatchListItem::create([
                    'watch_list_id' => $watchList->id,
                    'item_id' => $movie->id,
                    'type' => WatchListTypes::Movie->value,
                ]);
            }

            // Attach 1-10 random TV series to this watchlist
            $randomTvSeries = $tvSeries->random(rand(1, 10));
            foreach ($randomTvSeries as $tv) {
                WatchListItem::create([
                    'watch_list_id' => $watchList->id,
                    'item_id' => $tv->id,
                    'type' => WatchListTypes::Tv_series->value,
                ]);
            }
        });
    }
}
