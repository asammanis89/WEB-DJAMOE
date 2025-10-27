<?php

namespace Database\Seeders; // Pastikan namespace-nya benar

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('super123'), 
            'role' => 'super_admin',
            'is_active' => true,
        ]);
    }
}
