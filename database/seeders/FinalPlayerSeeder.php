<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinalPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notAllowed = [
            1, 2, 3, 4, 5,
            6, 7, 8, 9, 10,
            11, 12, 13, 14, 15,
            16, 17, 18, 19, 20
        ];
        $teams = Team::whereNotIn('id', $notAllowed)
                        ->where('status', 'verified')
                        ->get();

        foreach ($teams as $team) {
            Player::query()
                ->create([
                    'team_id' => $team->id,
                    'restore' => 0,
                    'ultimate' => 0
                ]);
        }
    }
}
