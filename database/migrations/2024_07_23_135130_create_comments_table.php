<?php

use App\Models\Feed;
use App\Models\JoinStatus;
use App\Models\PlayRole;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Feed::class, 'feed_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id')->constrained()->onDelete('cascade');
            $table->string('content')->nullable();
            $table->boolean('request_to_join')->default(false);
            $table->foreignIdFor(PlayRole::class, 'play_role_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignUuid('join_status_id')->constrained()->onDelete('cascade');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
