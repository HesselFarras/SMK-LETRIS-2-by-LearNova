<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $fillable = [
        'nama',
        'kontak',
        'jurusan',
        'pertanyaan',
    ];
}
