<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Team 1
        for ($i = 6; $i <= 8; $i++) {
            $position = ($i == 6) ? "leader" : "member";
            Participant::create([
                'email' => "participant$i@gmail.com",
                'position' => $position,
                'phone_number' => '08123456789',
                'student_photo' => 'sdasdsadasd',
                'team_id' => 1,
                'user_id' => $i
            ]);
        }

        // Team 2
        for ($i = 9; $i <= 10; $i++) {
            $position = ($i == 9) ? "leader" : "member";
            Participant::create([
                'email' => "participant$i@gmail.com",
                'position' => $position,
                'phone_number' => '08123456789',
                'student_photo' => 'sdasdsadasd',
                'team_id' => 2,
                'user_id' => $i
            ]);
        }
    }
}