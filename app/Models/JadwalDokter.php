<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dokters';
    protected $fillable = [
        'id_dokter',
        'id_poli',
        'hari_praktik',
        'jam_mulai',
        'jam_selesai',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
}
