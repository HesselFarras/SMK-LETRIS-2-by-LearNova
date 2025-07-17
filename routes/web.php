<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ExportController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftaranExport;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/berita', function () {
    return view('news');
})->name('berita');

Route::get('/jurusan', function () {
    return view('department');
})->name('jurusan');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/matapelajaran', function () {
    return view('mapel');
})->name('matapelajaran');

Route::get('/tentang', [App\Http\Controllers\HomeController::class, 'about'])->name('tentang');
Route::get('/berita', [HomeController::class, 'news'])->name('berita');
Route::get('/registration', [PpdbController::class, 'registration'])->name('registration');
Route::post('/registration', [PpdbController::class, 'store'])->name('registration.store');
Route::get('/jurusan', [HomeController::class, 'jurusan'])->name('jurusan');
Route::get('/jurusan', [HomeController::class, 'department'])->name('jurusan');
Route::get('/department', [HomeController::class, 'department'])->name('department');
Route::post('/konsultasi/store', [KonsultasiController::class, 'store'])->name('konsultasi.store');
Route::get('/ppdb', [HomeController::class, 'ppdb'])->name('ppdb');
Route::get('/export/pendaftar/excel', [ExportController::class, 'exportExcel'])->name('export.pendaftar.excel');
Route::get('/export/pendaftar/pdf', [ExportController::class, 'exportPDF'])->name('export.pendaftar.pdf');
Route::get('/export-pendaftaran', function () {
    return Excel::download(new PendaftaranExport, 'pendaftaran.xlsx');
});
Route::get('/export-pendaftaran', function () {
    return Excel::download(new PendaftaranExport, 'pendaftaran.xlsx');
})->name('export.pendaftaran');