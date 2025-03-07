<?php

namespace App\Models;

use App\Enums\WatchListTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WatchListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'watch_list_id',
        'item_id',
        'type',
    ];

    public function watchList(): BelongsTo
    {
        return $this->belongsTo(WatchList::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'item_id')->where('type', WatchListTypes::Movie->value);
    }

    public function tvSeries(): BelongsTo
    {
        return $this->belongsTo(TvSeries::class, 'item_id')->where('type', WatchListTypes::Tv_series->value);
    }
}
