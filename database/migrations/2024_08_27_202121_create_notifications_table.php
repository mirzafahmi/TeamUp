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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->string('type');  // Type of notification (e.g., system-wide, comment, like, etc.)
            $table->morphs('notifiable');  // Polymorphic relationship for notifiable models (e.g., User, Admin, etc.)
            $table->json('data');  
            $table->timestamp('read_at')->nullable();  
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
