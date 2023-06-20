<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Data;

class DataSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan Factory untuk membuat data dummy
        Data::factory()->count(100)->create();

    }
}
