<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        for ($i = 1; $i <= 5; $i++) {
//            Admin::create([
//               'user_id' =>  $i,
//                'name' => "Admin Ganteng $i"
//            ]);
//        }
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            Admin::create([
                'user_id' => $admin->id,
                'name' => ucfirst($admin->username),
            ]);
        }
    }
}
