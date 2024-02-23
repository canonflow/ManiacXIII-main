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
        Schema::create('contestants', function (Blueprint $table) {
            $table->foreignId('contest_id');
            $table->foreignId('team_id');
            $table->foreign('contest_id')
                    ->references('id')
                    ->on('contests')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('join_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
