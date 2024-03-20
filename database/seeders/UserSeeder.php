<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => "Super Admin",
            'name' => "Super Admin",
            'fullname' => "Super Admin",
            'password' => Hash::make(123456789),
            'email'=>  "superadmin@gmail.com",
         ]);
         $user->syncRoles('Super Admin');

    }
}
