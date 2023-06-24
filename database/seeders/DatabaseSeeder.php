<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DataSeeder;
use App\Models\Data;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Role::create(['name' => 'kepala_sekolah']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);
    }
}
