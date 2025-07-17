<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'jurusan' => 'required|string|max:50',
            'pertanyaan' => 'nullable|string',
        ]);

        Konsultasi::create($validated);

        return back()->with('success', 'Konsultasi berhasil dikirim!');
    }
}
