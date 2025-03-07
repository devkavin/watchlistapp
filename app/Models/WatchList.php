<?php

namespace App\Models;

use App\Enums\WatchListTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WatchList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'image_url', 'type'];

    protected $casts = [
        'type' => WatchListTypes::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sharedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'watch_list_users');
    }

    public function items(): HasMany
    {
        return $this->hasMany(WatchListItem::class);
    }
}
