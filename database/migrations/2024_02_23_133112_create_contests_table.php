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
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->foreign('author_id')
                    ->references('id')
                    ->on('acara')
                    ->onDelete('cascade')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamp('open_date')->nullable();
            $table->timestamp('close_date')->nullable();
            $table->enum('type', ['workshop', 'final']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};
