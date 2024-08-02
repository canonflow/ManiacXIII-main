<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSimulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [];

        // Truncate Table Player and reset auto increment to 1 just in case
        // Kalo bisa, hapus manual datanya dan JANGAN LUPA SET AUTO INCREMENT JADI 1
        if (Player::all()->count() != 0) {
            Player::query()->truncate();
        }

        for ($i = 1; $i <= 20; $i++) {
            $team = Team::where("name", "Tim $i")->first();
            if ($team) {
                Player::create([
                    'team_id' => $team->id
                ]);
            }
        }
    }
}
