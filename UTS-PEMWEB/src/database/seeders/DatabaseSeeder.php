<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // <- tambahkan ini
        ]);

        $user->assignRole('super_admin');

        // Panggil seeder pasien
        $this->call(PasienSeeder::class);
    }
}