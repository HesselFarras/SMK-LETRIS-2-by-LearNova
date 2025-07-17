<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'asal_sekolah',
        'jurusan',
        'biaya',
    ];
}
