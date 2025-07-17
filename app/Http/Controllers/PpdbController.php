<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PpdbController extends Controller
{
    public function registration()
    {
        return view('registration');
    }
    
        public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20',
            'jurusan' => 'required|string',
            'email' => 'required|email',
            'biaya' => 'nullable|string',
        ]);

        Pendaftaran::create($validated);

        return redirect()->route('registration')->with('success', 'Pendaftaran berhasil!');
    }

    
}