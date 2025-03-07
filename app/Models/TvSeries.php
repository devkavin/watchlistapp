<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TvSeries extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'description', 'ep_count', 'watch_url', 'imdb_url'];

    public function watchListItems(): MorphMany
    {
        return $this->morphMany(WatchListItem::class, 'item');
    }
}
