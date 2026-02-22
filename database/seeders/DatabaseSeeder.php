<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        //ISI BAGIAN INI 
        // ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sarpras.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // SISWA 1
        User::create([
            'name' => 'Siswa Pertama',
            'email' => 'siswa1@sarpras.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // SISWA 2
        User::create([
            'name' => 'Siswa Kedua',
            'email' => 'siswa2@sarpras.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        // SISWA 3
        User::create([
            'name' => 'Siswa Ketiga',
            'email' => 'siswa3@sarpras.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);
    }
}
