@extends('components.layout')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gradient-to-br from-amber-50 to-orange-50">
    
    <!-- Banner -->
    <section class="relative reveal opacity-0 translate-y-8 transition-all duration-700">
        <img src="/images/ppdb.png" alt="Gedung SMK" class="w-full h-[500px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col items-center justify-center text-white text-center">
            <!-- <img src="/images/logoletris.png" class="w-32 mb-4" alt="Logo"> -->
            <h1 class="text-4xl font-bold">PPDB GELOMBANG 2</h1>
            <!-- Tombol Daftar -->
            <div class="text-center my-8">
                <a href="{{ route('registration') }}" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-gray-700">Pendaftaran</a>
            </div>
        </div>
    </section>
    
    <section class=" container mx-auto px-4 my-10 reveal opacity-0 translate-y-8 transition-all duration-700 ">
        <h2 class="text-2xl font-bold mb-4">Dokumentasi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($dokumentasi as $item)
            <div class="bg-[#faf3e0] shadow rounded p-4">
                <div class="h-40 mb-4">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover rounded">
                </div>
                <h3 class="font-semibold">{{ $item->judul }}</h3>
                <p class="text-sm text-gray-600">{{ $item->deskripsi }}</p>
            </div>
            @endforeach
        </div>
    </section>
    
    
    <!-- News & Updates -->
    <section id="berita" class="py-12 px-24">
        <div class="container mx-auto reveal opacity-0 translate-y-8 transition-all duration-700">
            <h2 class="text-2xl font-bold mb-6">News & Updates</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($berita->take(3) as $item)
                <div class="bg-[#faf3e0] shadow rounded p-4">
                    <img src="{{ asset('storage/' . $item->foto) }}" class="mb-2 w-full h-40 object-cover rounded" alt="{{ $item->judul }}">
                    <h3 class="font-semibold text-lg">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('berita') }}" class="text-blue-500 mt-2 inline-block">Learn More</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
    
    @endsection
    
    <script>
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