<?php

namespace App\Models;

use App\Enums\WatchListTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TvSeries extends Model
{
    use HasFactory;
    protected $fillable = [
        'watch_list_id',
        'name',
        'image_url',
        'description',
        'ep_count',
        'watch_url',
        'imdb_url',
    ];

    public function watchListItem(): HasOne
    {
        return $this->hasOne(WatchListItem::class, 'item_id')->where('type', WatchListTypes::Tv_series->value);
    }
}
