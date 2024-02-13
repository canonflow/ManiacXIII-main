<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 6; $i <= 10; $i++) {
            if ($i == 6 || $i == 9) {
                Team::create([
                    'name' => "Tim$i",
                    'school_name' => "SMA Negeri $i",
                    'school_address' => "Jalan Tunjungan No. $i",
                    'school_number' => '08123456789',
                    'status' => 'waiting',
                    'user_id' => $i,
                ]);
            }
        }
    }
}
