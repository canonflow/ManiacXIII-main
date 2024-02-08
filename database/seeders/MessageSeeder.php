<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Team 1 dan 2
        for ($i = 1; $i <= 2; $i++) {
            Message::create([
               'team_id' => $i
            ]);
        }

    }
}
