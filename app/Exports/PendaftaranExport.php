<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PendaftaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftaran::select('id', 'nama', 'email', 'no_hp', 'jurusan', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'Email', 'No HP', 'Jurusan', 'Tanggal Daftar'];
    }
}