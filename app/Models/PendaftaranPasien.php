<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kamar',
        'id_poli',
        'tanggal',
        'keluhan',
        'id_user'
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

}
