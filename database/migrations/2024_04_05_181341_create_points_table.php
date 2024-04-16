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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penpos_id');
            $table->foreign('penpos_id')
                ->references('id')
                ->on('rally_games')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('point');
            $table->enum('condition', ['full', 'half', 'empty']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
