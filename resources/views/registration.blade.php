@extends('components.layout')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<section class="bg-slate-100 py-12">
    <div class="container mx-auto px-4 max-w-3xl reveal opacity-0 translate-y-8 transition-all duration-700">
        <h2 class="text-3xl font-bold text-center mb-8">Formulir Pendaftaran Siswa Baru</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 reveal opacity-0 translate-y-8 transition-all duration-700">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 reveal opacity-0 translate-y-8 transition-all duration-700">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registration.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            @csrf

            <div>
                <label class="block font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">NISN</label>
                <input type="text" name="nisn" class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Tempat & Tanggal Lahir</label>
                <div class="flex gap-2">
                    <input type="text" name="tempat_lahir" class="w-1/2 border rounded px-4 py-2" placeholder="Tempat">
                    <input type="date" name="tanggal_lahir" class="w-1/2 border rounded px-4 py-2">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded px-4 py-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded px-4 py-2" rows="3" required></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Nomor HP / WA</label>
                <input type="text" name="no_hp" class="w-full border rounded px-4 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Pilih Jurusan</label>
                <select name="jurusan" id="jurusan" class="w-full border rounded px-4 py-2 overflow-x-auto" onchange="updateBiaya()" required>
                    <option value="">-- Pilih --</option>
                    <option value="AKL">AKL - Akuntansi & Keuangan Lembaga</option>
                    <option value="TJKT">TJKT - Teknik Jaringan Komputer & Telekomunikasi</option>
                    <option value="PPLG">PPLG - Pengembangan Perangkan Lunak & Gim</option>
                    <option value="MPLB">MPLB - Manajemen Perkantoran & Layanan Bisnis</option>
                    <option value="BDP">BDP - Bisnis Daring Pemasaran</option>
                    <option value="DKV">DKV - Desain Komunikasi Visual</option>
                </select>
            </div>

            <div id="biayaContainer" class="hidden mt-4 bg-blue-50 p-4 rounded-lg shadow-sm">
                <p class="font-semibold text-blue-700">Biaya Pendaftaran:</p>
                <p id="biayaText" class="text-blue-800 font-bold text-lg sm:text-xl md:text-2xl mt-1"></p>
            </div>

            <div id="biayaContainer" class="hidden">
                <p class="font-semibold">Biaya Pendaftaran:</p>
                <p id="biayaText" class="text-blue-600 font-bold text-xl"></p>
            </div>

            {{-- Hidden input untuk menyimpan nilai biaya --}}
            <input type="hidden" name="biaya" id="biaya">

            <div class="text-center pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    function updateBiaya() {
        const jurusan = document.getElementById("jurusan").value;
        const biayaText = document.getElementById("biayaText");
        const biayaInput = document.getElementById("biaya");
        const container = document.getElementById("biayaContainer");

        const biaya = {
            "AKL": "Rp. 300.000",
            "TJKT": "Rp. 350.000",
            "PPLG": "Rp. 400.000",
            "MPLB": "Rp. 450.000",
            "BDP": "Rp. 500.000",
            "DKV": "Rp. 600.000"
        };

        if (jurusan && biaya[jurusan]) {
            biayaText.innerText = biaya[jurusan];
            biayaInput.value = biaya[jurusan];
            container.classList.remove("hidden");
        } else {
            biayaText.innerText = "";
            biayaInput.value = "";
            container.classList.add("hidden");
        }
    }

        function revealOnScroll() {
        const reveals = document.querySelectorAll('.reveal');

        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            const revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                reveals[i].classList.add('opacity-100', 'translate-y-0');
                reveals[i].classList.remove('opacity-0', 'translate-y-8');
            } else {
                reveals[i].classList.remove('opacity-100', 'translate-y-0');
                reveals[i].classList.add('opacity-0', 'translate-y-8');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        revealOnScroll();
        window.addEventListener('scroll', revealOnScroll);
    });

    // Tombol Carousel ← →
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.querySelector('#carousel');
        const prev = document.querySelector('#prev');
        const next = document.querySelector('#next');

        if (prev && next && container) {
            prev.addEventListener('click', () => {
                container.scrollBy({ left: -300, behavior: 'smooth' });
            });

            next.addEventListener('click', () => {
                container.scrollBy({ left: 300, behavior: 'smooth' });
            });
        }
    });

    document.querySelectorAll('a, button').forEach(el => {
        el.classList.add('transition', 'duration-300', 'ease-in-out');
    });
</script>


@endsection
