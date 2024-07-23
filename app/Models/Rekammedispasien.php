<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekammedispasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rekammedis',
        'nik',
        'id_dokter',
        'id_pasien',
        'tanggal',
        'diagnosa',
        'tindakan_medis',

    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
