<?php

use App\Models\PlayLevel;
use App\Models\PlayMode;
use App\Models\PlayRole;
use App\Models\Sport;
use App\Models\User;
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
        Schema::create('feeds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sport_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('play_level_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('play_mode_id')->constrained()->onDelete('cascade');
            $table->text('content')->nullable();
            $table->foreignUuid('event_location_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->dateTime('event_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};
