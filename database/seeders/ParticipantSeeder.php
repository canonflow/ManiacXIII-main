<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            for ($cnt = 1; $cnt <= 3; $cnt++) {
                Participant::create([
                    'email' => $team->name . "_" . "$cnt@gmail.com",
                    'position' => ($cnt == 1) ? "leader" : "member",
                    'name' => $team->name . "_" . $cnt,
                    'phone_number' => '08123456789',
                    'student_photo' => '',
                    'team_id' => $team->id,
                    'alergi' => 'Friend Zone',
                ]);
            }
        }
        // Team 1
//        for ($i = 6; $i <= 8; $i++) {
//            $position = ($i == 6) ? "leader" : "member";
//            Participant::create([
//                'email' => "participant$i@gmail.com",
//                'position' => $position,
//                'name' => "Nathan",
//                'phone_number' => '08123456789',
//                'student_photo' => 'sdasdsadasd',
//                'team_id' => 1,
//                'alergi' => 'Kubis',
//            ]);
//        }
//
//        // Team 2
//        for ($i = 9; $i <= 10; $i++) {
//            $position = ($i == 9) ? "leader" : "member";
//            Participant::create([
//                'email' => "participant$i@gmail.com",
//                'position' => $position,
//                'name' => 'Garzya',
//                'phone_number' => '08123456789',
//                'student_photo' => 'sdasdsadasd',
//                'team_id' => 2,
//                'alergi' => 'seafood',
//            ]);
//        }
    }
}
