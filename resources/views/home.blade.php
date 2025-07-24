@extends('components.layout')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

    <!-- Hero Section -->
    <section class="relative">
        <img src="/images/hero.png" alt="Gedung SMK" class="w-full h-[500px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col items-center justify-center text-white text-center">
            <img src="/images/logoletris.png" class="w-32 mb-4" alt="Logo">
            <h1 class="text-4xl font-bold">SMK LETRIS INDONESIA 2</h1>
            <a href="{{ route('tentang') }}" class="mt-4 px-6 py-2 bg-transparent text-white rounded hover:bg-slate-400">Learn More</a>
        </div>
    </section>

    <!-- Info Boxes -->
    <section class="py-12 bg-gradient-to-br from-amber-50 to-orange-50">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            <div class="bg-[#f6ecd0] p-6 shadow rounded">
                <h2 class="text-xl font-semibold mb-2">About</h2>
                <p>SMK Letris Indonesia 2 adalah sekolah yang berkomitmen mencetak lulusan kompeten di bidangnya.</p>
                <a href="{{ route('tentang') }}" class="text-blue-500 mt-2 inline-block">Learn More</a>
            </div>
            <div class="bg-[#f6ecd0] p-6 shadow rounded">
                <h2 class="text-xl font-semibold mb-2">Fasilitas</h2>
                <p>Fasilitas lengkap mulai dari ruang kelas modern, laboratorium, perpustakaan dan lainnya.</p>
                <a href="{{ route('tentang') }}" class="text-blue-500 mt-2 inline-block">Learn More</a>
            </div>
            <div class="bg-[#f6ecd0] p-6 shadow rounded">
                <h2 class="text-xl font-semibold mb-2">Informasi & Berita</h2>
                <p>Ikuti berita dan update terbaru mengenai kegiatan SMK Letris Indonesia 2.</p>
                <a href="{{ route('berita') }}" class="text-blue-500 mt-2 inline-block">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Statistik Sekolah -->
    <section class="bg-gradient-to-br from-orange-50 to-amber-50 py-16">
        <div class="container mx-auto px-4 text-center reveal opacity-0 translate-y-8 transition-all duration-700">
            <!-- <h2 class="text-3xl font-bold mb-10 text-black">Statistik Sekolah</h2> -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Jumlah Siswa -->
                <div class="bg-[#f6ecd0] rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300">
                    <div class="text-5xl font-extrabold text-blue-600 mb-2">700+</div>
                    <p class="text-gray-700 font-semibold">Jumlah Siswa</p>
                </div>

                <!-- Jumlah Guru -->
                <div class="bg-[#f6ecd0] rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300">
                    <div class="text-5xl font-extrabold text-blue-600 mb-2">50+</div>
                    <p class="text-gray-700 font-semibold">Jumlah Guru</p>
                </div>

                <!-- Jumlah Jurusan -->
                <div class="bg-[#f6ecd0] rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300">
                    <div class="text-5xl font-extrabold text-blue-600 mb-2">6</div>
                    <p class="text-gray-700 font-semibold">Jumlah Jurusan</p>
                </div>
            </div>
        </div>
    </section> 

    <!-- Fasilitas Carousel -->
    <section id="fasilitas" class="py-12 px-6 bg-gradient-to-br from-orange-50 to-amber-50">
        <div id="carousel" class="flex overflow-x-auto gap-4 scroll-smooth reveal opacity-0 translate-y-8 transition-all duration-700">
        @foreach ($fasilitas as $item)
            <div class="min-w-[300px] bg-[#f6ecd0] shadow rounded overflow-hidden">
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
                <div class="p-4 font-semibold text-center">{{ $item->nama }}</div>
            </div>
        @endforeach
        </div>
    </section>

    <!-- Video Profil -->
    <section class="py-12 bg-gradient-to-br from-amber-50 to-orange-50">
        <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
            <div class="aspect-w-16 aspect-h-9">
                <!-- <iframe width="560" height="315" 
                    src="https://youtu.be/CMchugFHO64?si=jod9HIHoMseIJIDm" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe> -->
                <iframe class="w-full h-3/4 width="560" height="315" src="https://www.youtube.com/embed/CMchugFHO64?si=IOPlENI5v_0ckIXB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <!-- <iframe class="w-full h-96" src="https://www.youtube.com/watch?v=CMchugFHO64" title="Profil SMK Letris Indonesia 2" frameborder="0" allowfullscreen></iframe> -->
            </div>
        </div>
    </section>
<!-- News & Updates -->
<section id="berita" class="py-12 mx-auto bg-gradient-to-br from-orange-50 to-amber-50">
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

<script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('#carousel');
            const prev = document.querySelector('#prev');
            const next = document.querySelector('#next');

            prev.addEventListener('click', () => {
                container.scrollBy({ left: -300, behavior: 'smooth' });
            });

            next.addEventListener('click', () => {
                container.scrollBy({ left: 300, behavior: 'smooth' });
            });
        });

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