<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'name' => 'Ellie Williams',
            'age' => 21,
            'gender' => 'Female',
            'contact' => '081234567890',
            'diagnosis' => 'Major Depression',
        ]);
        
        Pasien::create([
            'name' => 'Caitlyn Kiramman',
            'age' => 35,
            'gender' => 'Female',
            'contact' => '082112345678',
            'diagnosis' => 'Bipolar Disorder',
        ]);  
        
        Pasien::create([
            'name' => 'Leon S. Kennedy',
            'age' => 24,
            'gender' => 'Male',
            'contact' => '081234567890',
            'diagnosis' => 'Post-Traumatic Stress Disorder (PTSD)',
        ]);      
    }
}
