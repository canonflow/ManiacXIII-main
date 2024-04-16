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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dragon_id');
            $table->foreign('dragon_id')
                ->references('id')
                ->on('dragons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('session_id');
            $table->foreign('session_id')
                ->references('id')
                ->on('game_besar_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('total_damage');
            $table->double('damage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
