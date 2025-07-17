@extends('components.layout')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>

<section class="bg-gradient-to-br from-amber-50 to-orange-50 py-10">
    <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
        <h2 class="text-2xl font-bold text-center mb-10">News & Updates</h2>

        {{-- Hero News --}}
        @if ($berita->first())
        <div class="bg-[#faf3e0] w-full mb-10 reveal opacity-0 translate-y-8 transition-all duration-700 border px-3 py-3 shadow rounded">
            <img src="{{ asset('storage/' . $berita->first()->foto) }}" class="w-full h-80 object-cover rounded-lg" alt="{{ $berita->first()->judul }}">
            <h3 class="text-xl font-bold mt-4">{{ $berita->first()->judul }}</h3>
            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($berita->first()->tanggal)->translatedFormat('d F Y') }}</p>
            <p class="text-sm text-gray-700 mt-2 line-clamp-3">{!! Str::limit(strip_tags($berita->first()->isi), 1000) !!}</p>
        </div>
        @endif

        {{-- Grid News --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 reveal opacity-0 translate-y-8 transition-all duration-700">
            {{-- Large News Item --}}
            @if ($berita->count() > 1)
            <div class="md:col-span-2 flex border p-4 bg-[#faf3e0]">
                <div class="w-1/2 pr-3">
                    <h3 class="font-bold">{{ $berita[1]->judul }}</h3>
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($berita[1]->tanggal)->translatedFormat('d F Y') }}</p>
                    <p class="text-xs text-gray-700 mt-1 line-clamp-4">{!! Str::limit(strip_tags($berita[1]->isi), 900) !!}</p>
                </div>
                <div class="w-1/2">
                    <img src="{{ asset('storage/' . $berita[1]->foto) }}" alt="{{ $berita[1]->judul }}" class="h-full w-full object-cover rounded">
                </div>
            </div>
            @endif

            {{-- 4 Small News Items with Popup --}}
            @foreach ($berita->skip(2)->take(4) as $item)
            <div x-data="{ open: false }" class="relative border p-4 bg-[#faf3e0] reveal opacity-0 translate-y-8 transition-all duration-700">
                <div @click="open = true" class="cursor-pointer">
                    <div class="h-32 mb-2">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover rounded">
                    </div>
                    <h3 class="text-sm font-semibold">{{ $item->judul }}</h3>
                    <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                    <p class="text-xs text-gray-700 mt-1 line-clamp-3">{!! Str::limit(strip_tags($item->isi), 60) !!}</p>
                </div>

                <!-- Popup Modal -->
                <div 
                    x-show="open" 
                    x-transition 
                    class="fixed inset-0 bg-black bg-opacity-20 z-50 flex items-center justify-center px-4"
                    style="display: none;">
                    <div class="bg-amber-100 w-full max-w-2xl p-6 rounded-lg shadow-xl relative max-h-[90vh] overflow-y-auto">
                        <button @click="open = false" class="absolute top-2 right-3 text-xl text-gray-600 hover:text-red-600">&times;</button>
                        <img src="{{ asset('storage/' . $item->foto) }}" class="mb-4 w-full h-64 object-cover rounded" alt="{{ $item->judul }}">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($item->isi)) !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Bottom List Section --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start reveal opacity-0 translate-y-8 transition-all duration-700">
            @if ($berita->count() > 6)
            <div class="md:col-span-1 border bg-white p-4">
                <div class="h-40 mb-4">
                    <img src="{{ asset('storage/' . $berita[6]->foto) }}" alt="{{ $berita[6]->judul }}" class="w-full h-full object-cover rounded">
                </div>
                <div class="text-sm text-gray-700">
                    <p class="mb-2 text-xs text-gray-500">{{ \Carbon\Carbon::parse($berita[6]->tanggal)->translatedFormat('d F Y') }}</p>
                    <h4 class="font-semibold">{{ $berita[6]->judul }}</h4>
                    <p class="text-xs mt-1 line-clamp-2">{!! Str::limit(strip_tags($berita[6]->isi), 80) !!}</p>
                </div>
            </div>
            @endif

            <div class="md:col-span-2 flex flex-col gap-4">
                @foreach ($berita->skip(7)->take(3) as $item)
                <div class="text-sm border-b pb-2">
                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                    <p class="font-medium">{{ $item->judul }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
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
