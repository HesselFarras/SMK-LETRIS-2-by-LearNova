<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Fasilitas;
use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Dokumentasi;

class HomeController extends Controller
{
    public function index()
    {
        // Untuk halaman home
        $gurus = Guru::all();
        $fasilitas = Fasilitas::all();
        $berita = Berita::latest()->take(3)->get();

        // Jika ada tabel jurusan, testimonial, prestasi:
        // Pastikan modelnya sudah dibuat
        // $jurusan = Jurusan::all();
        // $testimonial = Testimonial::all();
        // $prestasi = Prestasi::all();

        return view('home', compact('gurus', 'fasilitas', 'berita'));
    }

    public function about()
    {
        $fasilitas = Fasilitas::all();
        $gurus = Guru::all();
        $berita = Berita::latest()->take(3)->get();
        
        return view('about', compact('fasilitas','gurus','berita'));
    }

    public function news()
    {
        $berita = Berita::latest()->get();

        return view('news', compact('berita'));
    }

    public function department()
    {
        $jurusan = Jurusan::all();
        $berita = Berita::latest()->take(3)->get();
        return view('department', compact('jurusan','berita'));
    }

    public function ppdb()
    {
        $berita = Berita::latest()->take(3)->get();
        $dokumentasi = Dokumentasi::latest()->take(12)->get();
        return view('ppdb', compact('berita','dokumentasi'));
        
    }

}
