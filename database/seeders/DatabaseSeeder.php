<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan role
        Role::create(['name' => 'kepala_sekolah']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);

        // Menambahkan pengguna
        User::create([
            'name' => 'validatoradmin',
            'email' => 'validatoradmin@gmail.com',
            'password' => bcrypt('validatoradmin'),
            'role_id' => 1,
            'NIK' => '123456789', // Ganti dengan NIK yang diinginkan
        ]);

        User::create([
            'name' => 'validatormagang',
            'email' => 'validatormagang@gmail.com',
            'password' => bcrypt('validatormagang'),
            'role_id' => 2,
            'NIK' => '987654321', // Ganti dengan NIK yang diinginkan
        ]);

        User::create([
            'name' => 'validatorpengunjung',
            'email' => 'validatorpengunjung@gmail.com',
            'password' => bcrypt('validatorpengunjung'),
            'role_id' => 3,
            'NIK' => '654321987', // Ganti dengan NIK yang diinginkan
        ]);
        
        // Menjalankan factory untuk membuat data tambahan jika diperlukan
       
    }
}
