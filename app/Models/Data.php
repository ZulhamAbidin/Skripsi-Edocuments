<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'NIK',
        'NamaLengkap',
        'AlamatDomisili',
        'JenisKelamin',
        'PendidikanTerakhir',
        'Jurusan',
        'TanggalPengesahan',
        'Status',
    ];

    // ...
}
