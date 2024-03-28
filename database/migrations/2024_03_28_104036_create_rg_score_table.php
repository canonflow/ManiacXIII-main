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
        Schema::create('rg_score', function (Blueprint $table) {
            $table->foreignId('penpos_id');
            $table->foreignId('player_id');
            $table->foreign('penpos_id')
                    ->references('id')
                    ->on('rally_games')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('player_id')
                    ->references('id')
                    ->on('players')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->double('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rg_score');
    }
};
