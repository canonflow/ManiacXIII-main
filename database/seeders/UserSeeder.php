<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make Admin
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => "admin$i",
                'password' => Hash::make("password$i"),
                'role' => 'admin'
            ]);
        }

        // Make Participant
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => "participant$i",
                'password' => Hash::make("password$i"),
                'role' => 'participant'
            ]);
        }

        // Make si
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => "si$i",
                'password' => Hash::make("password$i"),
                'role' => 'si'
            ]);
        }

        // Make supersi
        for ($i = 1; $i <= 1; $i++) {
            User::create([
                'username' => "supersi$i",
                'password' => Hash::make("password$i"),
                'role' => 'supersi'
            ]);
        }

        // Make penpos
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => "penpos$i",
                'password' => Hash::make("password$i"),
                'role' => 'penpos'
            ]);
        }
    }
}
