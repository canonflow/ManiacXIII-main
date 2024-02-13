<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Team;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
//            $table->foreignIdFor(User::class)
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreignIdFor(Team::class)
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
            $table->foreignId('team_id');
//            $table->foreignId('user_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
//            $table->foreign('user_id')
//                    ->references('id')
//                    ->on('users')
//                    ->onUpdate('cascade')
//                    ->onDelete('cascade');
            $table->string('email')->unique();
            $table->enum('position', ['leader', 'member']);
            $table->string('name');
            $table->string('phone_number');
            $table->string('student_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
