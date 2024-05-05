<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        for ($i = 6; $i <= 10; $i++) {
//            if ($i == 6 || $i == 9) {
//                Team::create([
//                    'name' => "Tim$i",
//                    'school_name' => "SMA Negeri $i",
//                    'school_address' => "Jalan Tunjungan No. $i",
//                    'school_number' => '08123456789',
//                    'status' => 'waiting',
//                    'user_id' => $i,
//                    'payment_photo' => 'bukti_pembayaran/tes.png',
//                ]);
//            }
//        }
        $teams = User::where('role', 'participant')->get();
        $cnt = 1;
        foreach ($teams as $team) {
            Team::create([
                    'name' => ucwords(str_replace("_", ' ', $team->username)),
                    'school_name' => "SMA Negeri $cnt",
                    'school_address' => "Jalan Tunjungan No. $cnt",
                    'school_number' => '08123456789',
                    'status' => 'verified',
                    'user_id' => $team->id,
                    'payment_photo' => '',
            ]);
            $cnt++;
        }
    }
}
