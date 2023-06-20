<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
{
    protected $model = Data::class;

    public function definition()
    {
        return [
            'NIK' => $this->faker->numerify('##########'),
            'NamaLengkap' => $this->faker->name,
            'AlamatDomisili' => $this->faker->address,
            'JenisKelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'PendidikanTerakhir' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
            'Jurusan' => $this->faker->jobTitle,
            'TanggalPengesahan' => $this->faker->date,
            'Status' => 'BelumTerverifikasi',
        ];
    }
}
