<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengesahan extends Model
{
    protected $table = 'pengesahan';

    protected $fillable = [
        'NamaLengkap',
        'AlamatDomisili',
        'JenisKelamin',
        'NoTelfon',
        'Agama',
        'PendidikanTerakhir',
        'Jurusan',
        'TanggalPengesahan',
        'TanggalPengambilan',
        'WaktuPengambilan',
        'Status',
        'User_id',
        'AlasanPenolakan',
        'Total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id', 'id');
    }
}
