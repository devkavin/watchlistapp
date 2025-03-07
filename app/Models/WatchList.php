<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\WatchListTypes;

class WatchList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'image_url',
        'type'
    ];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sharedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shared_watch_lists')
            ->withPivot('permission')
            ->withTimestamps();
    }

    public function movies(): HasMany
    {
        return $this->hasMany(WatchListItem::class)->where('type', WatchListTypes::Movie->value);
    }

    public function tvSeries(): HasMany
    {
        return $this->hasMany(WatchListItem::class)->where('type', WatchListTypes::Tv_series->value);
    }

    protected $casts = [
        'type' => WatchListTypes::class,
    ];
}
