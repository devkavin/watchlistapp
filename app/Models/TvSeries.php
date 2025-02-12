<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TvSeries extends Model
{
    protected $fillable = [
        'watch_list_id',
        'name',
        'image_url',
        'description',
        'ep_count',
        'watch_url',
        'imdb_url',
    ];

    public function watchList(): BelongsTo
    {
        return $this->belongsTo(WatchList::class);
    }
}
