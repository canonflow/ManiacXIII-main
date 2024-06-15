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
        Schema::create('game_besar_sessions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('open')->nullable();
            $table->timestamp('close')->nullable();
            $table->double('multiplier')->default(1);
            $table->integer('max_team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_besar_sessions');
    }
};
