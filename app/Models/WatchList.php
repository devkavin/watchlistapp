<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WatchList extends Model
{

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
        return $this->hasMany(Movie::class);
    }

    public function tvSeries(): HasMany
    {
        return $this->hasMany(TvSeries::class);
    }
}
