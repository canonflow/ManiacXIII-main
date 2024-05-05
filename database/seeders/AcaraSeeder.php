<?php

namespace Database\Seeders;

use App\Models\Acara;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acaras = User::where('role', 'acara')->get();

        foreach ($acaras as $acara) {
            Acara::create([
                'user_id' => $acara->id,
                'name' => ucfirst($acara->username)
            ]);
        }
    }
}
