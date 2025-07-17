<?php

namespace App\Http\Controllers;

use App\Exports\PendaftaranExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new PendaftaranExport, 'data_pendaftar.xlsx');
    }

    public function exportPDF()
    {
        $data = (new PendaftaranExport)->collection();
        $pdf = Pdf::loadView('exports.pendaftaran-pdf', compact('data'));
        return $pdf->download('data_pendaftar.pdf');
    }
}
