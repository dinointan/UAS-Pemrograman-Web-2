<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_poli',
        'nama_dokter',
        'nomor_srt',
        'nomor_hp',
        'email',
        'foto',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
}
