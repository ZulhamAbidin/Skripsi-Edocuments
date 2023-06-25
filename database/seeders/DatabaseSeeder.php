<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DataSeeder;
use App\Models\Data;
use App\Models\Role;
use App\Models\User;
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

      User::create([
            'name' => 'adminastri',
            'email' => 'adminastri@gmail.com',
            'password' => bcrypt('adminastri'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'mahasiswaastri',
            'email' => 'mahasiswaastri@gmail.com',
            'password' => bcrypt('mahasiswaastri'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'pengunjungastri',
            'email' => 'pengunjungastri@gmail.com',
            'password' => bcrypt('pengunjungastri'),
            'role_id' => 3
        ]);
        
    }
}
