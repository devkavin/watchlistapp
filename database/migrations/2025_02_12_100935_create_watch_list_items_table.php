<?php

use App\Enums\WatchListTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('watch_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('watch_list_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('item_id'); // Can be a movie or TV series ID
            $table->enum('type', [WatchListTypes::Movie->value, WatchListTypes::Tv_series->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_list_items');
    }
};
