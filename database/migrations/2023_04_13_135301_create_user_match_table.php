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
        Schema::create('user_match', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id')->foreignIdFor(Matchs::class);
            $table->integer('match_id')->foreignIdFor(User::class);
            $table->string('side')->default("none");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_match');
    }
};
