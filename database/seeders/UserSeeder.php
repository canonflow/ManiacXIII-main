<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make Admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('AdminManiac@2024'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'fio',
            'password' => Hash::make('AdminManiac@2024'),
            'role' => 'admin'
        ]);

        User::create([
            'username' => 'edward',
            'password' => Hash::make('AdminManiac@2024'),
            'role' => 'admin'
        ]);

        // Make Participant
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'username' => "tim_$i",
                'password' => Hash::make("TimManiac@2024"),
                'role' => 'participant'
            ]);
        }

        // Make si
        $listSi = ['nathan', 'fanny', 'ricky', 'syarif', 'mapet', 'yosua'];
        foreach ($listSi as $si) {
            User::create([
                'username' => $si,
                'password' => Hash::make("SIManiacJago@2024"),
                'role' => 'si'
            ]);
        }

        // Make supersi
        $superSI = ['nathan', 'fanny'];
        foreach ($superSI as $super) {
            User::create([
                'username' => "super_$super",
                'password' => Hash::make("SuperSIJago@2024"),
                'role' => 'supersi'
            ]);
        }

        // Make Acara
        $listAcara = ['aril', 'nicole', 'cait', 'nicho'];
        foreach ($listAcara as $acara) {
            User::create([
                'username' => $acara,
                'password' => Hash::make("AcaraManiac@2024"),
                'role' => 'acara'
            ]);
        }
    }
}
