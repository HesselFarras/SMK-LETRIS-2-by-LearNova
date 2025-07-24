@extends('components.layout')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Banner Section -->
<section class="w-full h-1/2">
    <img src="/images/bannerbaru.png" alt="Banner SMK" class="w-full rounded-lg shadow-lg h-auto">
</section>

<section class="bg-gradient-to-br from-amber-50 to-orange-50 py-12" x-data="{ open: null }">
    <h2 class="text-2xl md:text-3xl font-bold text-center py-12 mb-10 uppercase">Program Studi yang ada di SMK LETRIS 2 INDONESIA</h2>
    <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($jurusan as $item)
                <div 
                    class="bg-[#f6ecd0] p-6 rounded-lg shadow-md cursor-pointer hover:shadow-xl reveal opacity-0 translate-y-8 transition-all duration-700" 
                    @click="open = '{{ $item->kode }}'"
                >
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover rounded mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->nama }}</h3>
                    <p class="text-gray-700 text-sm">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 80) }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @foreach($jurusan as $item)
        <div 
            x-show="open === '{{ $item->kode }}'" 
            class="fixed inset-0 z-50 bg-black bg-opacity-20 flex items-center justify-center px-4 reveal opacity-0 translate-y-8 transition-all duration-700" 
            x-transition
        >
            <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-6 rounded-lg max-w-xl w-full relative reveal opacity-0 translate-y-8 transition-all duration-700">
                <button 
                    class="absolute top-2 right-3 text-gray-700 hover:text-red-600 text-xl" 
                    @click="open = null"
                >&times;</button>
                <div class="reveal opacity-0 translate-y-8 transition-all duration-700">
                    <h3 class="text-2xl font-bold text-black mb-4">{{ $item->nama }}</h3>
                    <div class="text-gray-700 leading-relaxed text-sm reveal opacity-0 translate-y-8 transition-all duration-700">
                        {!! nl2br($item->deskripsi) !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>

<!-- KONSULTASI JURUSAN UI -->
<section class="bg-amber-50 text-center py-12" x-data="{ showForm: false }">
    <!-- Tombol -->
    <button 
        @click="showForm = true"
        class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition reveal opacity-0 translate-y-8  duration-700">
        Konsultasi Jurusan
    </button>

    <!-- Popup Form -->
    <div 
        x-show="showForm" 
        x-transition
        class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center px-4">
        
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-xl relative reveal opacity-0 translate-y-8 transition-all duration-700">
            <!-- Tombol Close -->
            <button 
                @click="showForm = false" 
                class="absolute top-2 right-3 text-xl text-gray-600 hover:text-red-600">&times;</button>
            
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Konsultasi Jurusan</h3>

            <form action="{{ route('konsultasi.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full mt-1 p-2 border rounded focus:ring-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Email atau No. WhatsApp</label>
                    <input type="text" name="kontak" required class="w-full mt-1 p-2 border rounded focus:ring-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Jurusan yang Diminati</label>
                    <select name="jurusan" required class="w-full mt-1 p-2 border rounded focus:ring-pink-500">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="AKL">AKL - Akuntansi & Keuangan Lembaga</option>
                        <option value="TJKT">TJKT - Teknik Jaringan Komputer & Telekomunikasi</option>
                        <option value="PPLG">PPLG - Pengembangan Perangkan Lunak & Gim</option>
                        <option value="MPLB">MPLB - Manajemen Perkantoran & Layanan Bisnis</option>
                        <option value="BDP">BDP - Bisnis Daring Pemasaran</option>
                        <option value="DKV">DKV - Desain Komunikasi Visual</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Pertanyaan</label>
                    <textarea name="pertanyaan" rows="3" class="w-full mt-1 p-2 border rounded focus:ring-pink-500"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                    Kirim Konsultasi
                </button>
            </form>
        </div>
    </div>
</section>

    <!-- News & Updates -->
<section id="berita" class="py-12 mx-auto bg-gradient-to-br from-amber-50 to-orange-50">
    <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
        <h2 class="text-2xl font-bold mb-6">News & Updates</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($berita->take(3) as $item)
                <div class="bg-[#f6ecd0] shadow rounded p-4">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="mb-2 w-full h-40 object-cover rounded" alt="{{ $item->judul }}">
                    <h3 class="font-semibold text-lg">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('berita') }}" class="text-blue-500 mt-2 inline-block">Learn More</a>
                </div>
            @endforeach
        </div>
    </div>
</section>


<script>
    // Fade-in saat scroll
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
        revealOnScroll(); // inisialisasi awal
        window.addEventListener('scroll', revealOnScroll);
    });

    // Carousel geser tombol ← →
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

    // Optional: animasi tombol hover
    document.querySelectorAll('a, button').forEach(el => {
        el.classList.add('transition', 'duration-300', 'ease-in-out');
    });
</script>
@endsection
