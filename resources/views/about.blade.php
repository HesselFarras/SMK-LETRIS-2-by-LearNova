@extends('components.layout')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
    <!-- Hero Section -->
    <section class="relative w-full h-[450px] bg-cover bg-center" style="background-image: url('/images/hero.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col reveal opacity-0 translate-y-8 transition-all duration-700">
            <img src="/images/logoletris.png" alt="Logo" class="w-32 h-32 mb-4">
            <h1 class="text-white text-4xl font-bold text-center">Tentang</h1>
            <h2 class="text-white text-3xl font-bold text-center">SMK LETRIS INDONESIA 2</h2>
        </div>
    </section>
    
    <!-- Tentang Sekolah -->
    <section class="py-16 bg-gradient-to-br from-amber-50 to-orange-50 reveal opacity-0 translate-y-8 transition-all duration-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 reveal opacity-0 translate-y-8 transition-all duration-700">
                <p class="mt-2 text-lg text-gray-700 max-w-3xl mx-auto">
                    SMK Letris 2 adalah pilihan cerdas untuk masa depan gemilang. Kami hadir dengan 7 jurusan unggulan dan segudang prestasi.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-10 items-center reveal opacity-0 translate-y-8 transition-all duration-800">
                <!-- Teks -->
                <div class="space-y-5 text-gray-800 text-lg leading-relaxed">
                    <p class="reveal opacity-0 translate-y-8 transition-all duration-800">
                        Sejak berdiri pada tahun <strong>2013</strong>, SMK Letris Indonesia 2 telah menjadi rumah bagi ribuan siswa untuk belajar di bidang
                        <strong>Multimedia, Teknik Komputer Jaringan, Rekayasa Perangkat Lunak, Akuntansi, Otomatisasi Tata Kelola Perkantoran, Bisnis Daring Pemasaran</strong>, dan <strong>Perbankan Syariah</strong>.
                    </p>
                    <p class="reveal opacity-0 translate-y-8 transition-all duration-800">
                        Dengan <span class="text-green-600 font-semibold">Akreditasi A</span> dan naungan <strong>Yayasan Leo Sutrisno</strong>, kami terus berkembang mengikuti <strong>Revolusi Industri 5.0</strong>.
                    </p>
                    <p class="reveal opacity-0 translate-y-8 transition-all duration-800 italic text-blue-700 font-medium">"Letris bukan hanya sekolah — tapi tempat membangun karakter, kreativitas, dan masa depan."</p>
                </div>
                
                <!-- Gambar Ilustratif -->
                <div class="relative">
                    <img src="/images/fotoletris.jpg" alt="Gedung SMK Letris" class="rounded-xl shadow-lg w-full object-cover h-80">
                    <span class="absolute top-2 left-2 bg-yellow-400 text-white text-sm px-3 py-1 rounded-full shadow">Akreditasi A</span>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Fasilitas -->
    <section class="py-12 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            <h2 class="text-2xl font-bold mb-8">Fasilitas</h2>
            <div class="grid md:grid-cols-3 gap-6 reveal opacity-0 translate-y-8 transition-all duration-700">
                @foreach ($fasilitas as $index => $item)
                <div class="bg-[#f6ecd0] rounded shadow p-4 {{ $index > 2 ? 'hidden' : '' }} fasilitas-item">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-40 object-cover rounded mb-3">
                    <h3 class="font-bold text-lg mb-2">{{ $item->nama }}</h3>
                    <p class="text-sm text-gray-600">
                        {{ $item->deskripsi ?? 'Fasilitas kami lengkap dan mendukung pembelajaran modern.' }}
                    </p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-6 reveal opacity-0 translate-y-8 transition-all duration-700">
                <button id="toggleFasilitasBtn" onclick="toggleFasilitas()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Lihat Semua Fasilitas
                </button>
            </div>
        </div>
    </section>
    
    
    
    <!-- Guru & Staf Sekolah -->
    <section class="py-12 bg-gradient-to-br from-amber-50 to-orange-50">
        <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            <h2 class="text-2xl font-bold mb-6 text-center">Guru & Staff Sekolah</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 reveal opacity-0 translate-y-8 transition-all duration-700" id="guruGrid">
                @foreach ($gurus as $index => $guru)
                <div class="bg-[#f6ecd0] rounded p-4 text-center guru-item {{ $index >= 4 ? 'hidden' : '' }}">
                    <div class="w-full relative pb-[75%] bg-gray-200 mb-3 overflow-hidden rounded">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}" class="absolute top-0 left-0 w-full h-full object-cover">
                    </div>
                    <h4 class="font-semibold">{{ $guru->nama }}</h4>
                    <p class="text-sm text-gray-600">{{ $guru->mapel }}</p>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-6 reveal opacity-0 translate-y-8 transition-all duration-700">
                <button id="toggleGuruBtn" onclick="toggleGuru()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Lihat Semua Guru
                </button>
            </div>
        </div>
    </section>
    
    <section class="bg-gradient-to-br from-orange-50 to-amber-50 py-12">
        <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-10 uppercase">Lokasi SMK LETRIS 2 INDONESIA</h2>
            
            <div class="grid md:grid-cols-2 gap-8 reveal opacity-0 translate-y-8 transition-all duration-700">
                <!-- Kontak -->
                <div class="bg-orange-50 p-6 text-lg">
                    <p><strong>Alamat:</strong><br>Jl. Siliwangi No.55, Pd. Benda, Pamulang, Tangerang Selatan</p>
                <p class="mt-4"><strong>Email:</strong><br>
                <a href="mailto:smkletris2020@gmail.com" class="text-blue-600 hover:underline">
                    smkletris2020@gmail.com
                </a>
            </p>
            <p class="mt-4"><strong>Telepon:</strong><br>0851-6186-7926</p>
            <p class="mt-4"><strong>Jam Operasional:</strong><br>Senin - Jumat, 08.00 - 16.00</p>
        </div>
        
        
        <!-- Google Map Responsif -->
        <div class="relative w-full h-0 pb-[56.25%] overflow-hidden rounded-lg shadow reveal opacity-0 translate-y-8 transition-all duration-700">
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3752213686653!2d106.71348001104695!3d-6.34543169361788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e582501b86cb%3A0xe17c81c2758ace13!2sSMK%20Letris%20Indonesia%202%20%26%20SMK%20Kesehatan%20Letris%20Indonesia%202!5e0!3m2!1sid!2sid!4v1752322167853!5m2!1sid!2sid" 
            class="absolute top-0 left-0 w-full h-full border-0"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
</div>
</section>



<!-- News & Updates -->
<section id="berita" class="py-12 px-24 bg-gradient-to-br from-amber-50 to-orange-50">
    <div class="container mx-auto reveal opacity-0 translate-y-8 transition-all duration-700">
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
@endsection

<script>
    let fasilitasShown = false;
    let guruShown = false;

    function toggleFasilitas() {
        fasilitasShown = !fasilitasShown;
        document.querySelectorAll('.fasilitas-item').forEach((el, index) => {
            if (index > 2) {
                el.classList.toggle('hidden', !fasilitasShown);
            }
        });
        event.target.innerText = fasilitasShown ? 'Tutup' : 'Lihat Semua Fasilitas';
    }   

    function toggleGuru() {
        guruShown = !guruShown;

        document.querySelectorAll('.guru-item').forEach((el, index) => {
            if (index >= 4) {
                el.classList.toggle('hidden', !guruShown);
            }
        });

        const btn = document.getElementById('toggleGuruBtn');
        btn.innerText = guruShown ? 'Tutup' : 'Lihat Semua Guru';
    }
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

    // Helper untuk slideToggle
function slideToggle(element, show) {
    if (show) {
        element.classList.remove('hidden');
        element.style.height = 'auto';
        const height = element.clientHeight + 'px';
        element.style.height = '0px';

        setTimeout(() => {
            element.style.transition = 'height 0.5s ease';
            element.style.height = height;
        }, 10);

        setTimeout(() => {
            element.style.height = 'auto';
        }, 510);
    } else {
        element.style.transition = 'height 0.5s ease';
        element.style.height = element.clientHeight + 'px';

        setTimeout(() => {
            element.style.height = '0px';
        }, 10);

        setTimeout(() => {
            element.classList.add('hidden');
        }, 510);
    }
}

function toggleFasilitas() {
    fasilitasShown = !fasilitasShown;
    const items = document.querySelectorAll('.fasilitas-item');

    items.forEach((el, index) => {
        if (index > 2) {
            slideToggle(el, fasilitasShown);
        }
    });

    document.getElementById('toggleFasilitasBtn').innerText = fasilitasShown ? 'Tutup' : 'Lihat Semua Fasilitas';
}

function toggleGuru() {
    guruShown = !guruShown;
    const items = document.querySelectorAll('.guru-item');

    items.forEach((el, index) => {
        if (index > 3) {
            slideToggle(el, guruShown);
        }
    });

    document.getElementById('toggleGuruBtn').innerText = guruShown ? 'Tutup' : 'Lihat Semua Guru';
}

</script>
