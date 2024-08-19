<?php

use App\Models\Feed;
use App\Models\PlayRole;
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
        Schema::create('feed_play_roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('feed_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('play_role_id')->constrained()->onDelete('cascade');
            $table->integer('spot_availability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_play_roles');
    }
};
