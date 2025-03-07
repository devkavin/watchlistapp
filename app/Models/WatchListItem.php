<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WatchListItem extends Model
{
    use HasFactory;

    protected $fillable = ['watch_list_id', 'item_id', 'item_type', 'position'];

    public function watchList(): BelongsTo
    {
        return $this->belongsTo(WatchList::class);
    }

    public function item(): MorphTo
    {
        return $this->morphTo();
    }
}
