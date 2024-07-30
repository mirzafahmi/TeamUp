<?php

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
        Schema::create('preferred_sports', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Sport::class, 'sport_id')->constrained()->onDelete('cascade');
            $table->unique(['user_id', 'sport_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_sports');
    }
};