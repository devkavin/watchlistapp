<?php

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
        Schema::create('tv_series', function (Blueprint $table) {
            $table->id();
            $table->foreignId('watch_list_id')->constrained()->onDelete('cascade'); // Links to WatchList
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->string('ep_count')->nullable();
            $table->string('watch_url')->nullable();
            $table->string('imdb_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tv_series');
    }
};
