<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugass';
    protected $fillable = [
        'nip',
        'nama_petugas',
        'email',
        'jabatan',
        'nomor_hp',
        'alamat',
    ];
}
