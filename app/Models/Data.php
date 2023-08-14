<?php

namespace App\Models;

use App\Models\User;
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
        'TanggalPengambilan',
        'WaktuPengambilan',
        'Total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    

    // ...
}


