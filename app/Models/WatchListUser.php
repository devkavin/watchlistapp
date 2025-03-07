<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WatchListUser extends Model
{
    use HasFactory;

    protected $fillable = ['watch_list_id', 'user_id'];

    public function watchList(): BelongsTo
    {
        return $this->belongsTo(WatchList::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
