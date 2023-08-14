<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Pengesahan extends Model
{
    protected $table = 'pengesahan';

    protected $fillable = [
        'NamaLengkap',
        'NoRegistrasi',
        'TujuanPerusahaan',
        'TempatTanggalLahir',
        'AlamatDomisili',
        'JenisKelamin',
        'NoTelfon',
        'StatusPerkawinan',
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
