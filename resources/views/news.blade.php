@extends('components.layout')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>

<section class="bg-gradient-to-br from-amber-50 to-orange-50 py-4">
    <div class="container mx-auto px-4 reveal opacity-0 translate-y-8 transition-all duration-700">
        <h2 class="text-2xl font-bold text-center mb-10">News & Updates</h2>

        {{-- Hero News with Popup --}}
        @if ($berita->first())
        <div x-data="{ open: false }" class="w-full mb-10 reveal opacity-0 translate-y-8 transition-all duration-700 shadow-xl rounded-xl overflow-hidden bg-white">
            <div @click="open = true" class="cursor-pointer group">
                <!-- Full Hero Image -->
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->first()->foto) }}" 
                        class="w-full h-[50vh] sm:h-[60vh] md:h-[70vh] lg:h-[80vh] object-cover transition-transform duration-500 group-hover:scale-105" 
                        alt="{{ $berita->first()->judul }}">
                    <!-- Gradient overlay for better text readability -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    
                    <!-- Content overlay on image -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-6 md:p-8 text-white">
                        <div class="max-w-4xl">
                            <h3 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 sm:mb-4 leading-tight">{{ $berita->first()->judul }}</h3>
                            <p class="text-sm sm:text-base md:text-lg opacity-90 mb-2 sm:mb-3">{{ \Carbon\Carbon::parse($berita->first()->tanggal)->translatedFormat('d F Y') }}</p>
                            <p class="text-sm sm:text-base md:text-lg opacity-90 line-clamp-2 sm:line-clamp-3 max-w-3xl leading-relaxed">{!! Str::limit(strip_tags($berita->first()->isi), 200) !!}</p>
                            <!-- Read more indicator -->
                            <div class="flex items-center mt-3 sm:mt-4 text-sm sm:text-base text-amber-300 font-medium">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Popup Modal -->
            <div 
                x-show="open" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-start justify-center p-2 sm:p-4 overflow-y-auto"
                style="display: none;"
                @click.self="open = false">
                <div class="bg-white w-full max-w-4xl rounded-lg shadow-2xl relative my-4 sm:my-8 min-h-[80vh] max-h-none flex flex-col">
                    <div class="flex justify-between items-center p-4 border-b sticky top-0 bg-white z-10 rounded-t-lg">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800 pr-8 line-clamp-2">{{ $berita->first()->judul }}</h3>
                        <button @click="open = false" class="text-3xl text-gray-600 hover:text-red-600 transition-colors duration-200 absolute top-3 right-4 w-8 h-8 flex items-center justify-center">&times;</button>
                    </div>
                    <div class="overflow-y-auto flex-1 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        <img src="{{ asset('storage/' . $berita->first()->foto) }}" class="w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover" alt="{{ $berita->first()->judul }}">
                        <div class="p-4 sm:p-6 lg:p-8">
                            <p class="text-sm text-gray-500 mb-6 font-medium">{{ \Carbon\Carbon::parse($berita->first()->tanggal)->translatedFormat('d F Y') }}</p>
                            <div class="text-gray-700 leading-relaxed text-sm sm:text-base lg:text-lg space-y-4">
                                {{ strip_tags($berita->first()->isi) }}
                            </div>
                        </div>
                        <div class="h-8"></div> <!-- Extra space at bottom -->
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Regular Grid News --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 reveal opacity-0 translate-y-8 transition-all duration-700">
            @foreach ($berita->skip(1) as $item)
            <div x-data="{ open: false }" class="bg-[#f6ecd0] rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                <div @click="open = true">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-500 mb-2">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                        <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $item->judul }}</h3>
                        <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit(strip_tags($item->isi), 150) }}</p>
                        <div class="flex items-center mt-3 text-sm text-amber-600 font-medium">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Grid Item Popup Modal -->
                <div 
                    x-show="open" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-start justify-center p-2 sm:p-4 overflow-y-auto"
                    style="display: none;"
                    @click.self="open = false">
                    <div class="bg-white w-full max-w-4xl rounded-lg shadow-2xl relative my-4 sm:my-8 min-h-[80vh] max-h-none flex flex-col">
                        <div class="flex justify-between items-center p-4 border-b sticky top-0 bg-white z-10 rounded-t-lg">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800 pr-8 line-clamp-2">{{ $item->judul }}</h3>
                            <button @click="open = false" class="text-3xl text-gray-600 hover:text-red-600 transition-colors duration-200 absolute top-3 right-4 w-8 h-8 flex items-center justify-center">&times;</button>
                        </div>
                        <div class="overflow-y-auto flex-1 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover" alt="{{ $item->judul }}">
                            <div class="p-4 sm:p-6 lg:p-8">
                                <p class="text-sm text-gray-500 mb-6 font-medium">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                                <div class="text-gray-700 leading-relaxed text-sm sm:text-base lg:text-lg space-y-4 whitespace-pre-line">
                                    {{ strip_tags($item->isi) }}
                                </div>
                            </div>
                            <div class="h-8"></div> <!-- Extra space at bottom -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
        
        // Prevent body scroll when modal is open
        document.addEventListener('alpine:init', () => {
            Alpine.magic('preventScroll', () => {
                return {
                    disable() {
                        document.body.style.overflow = 'hidden';
                        document.body.style.paddingRight = '15px'; // Prevent layout shift
                    },
                    enable() {
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }
                }
            });
        });

        // Add smooth scrolling behavior to all popups
        const style = document.createElement('style');
        style.textContent = `
            .scrollbar-thin {
                scrollbar-width: thin;
                scrollbar-color: #d1d5db #f3f4f6;
            }
            .scrollbar-thin::-webkit-scrollbar {
                width: 8px;
            }
            .scrollbar-thin::-webkit-scrollbar-track {
                background: #f3f4f6;
                border-radius: 4px;
            }
            .scrollbar-thin::-webkit-scrollbar-thumb {
                background: #d1d5db;
                border-radius: 4px;
            }
            .scrollbar-thin::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }
            /* Smooth scroll behavior */
            html {
                scroll-behavior: smooth;
            }
            /* Modal scroll improvements */
            .modal-content {
                scroll-behavior: smooth;
                -webkit-overflow-scrolling: touch;
            }
        `;
        document.head.appendChild(style);
    });

    document.querySelectorAll('a, button').forEach(el => {
        el.classList.add('transition', 'duration-300', 'ease-in-out');
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            // This will close any open Alpine.js modals
            document.querySelectorAll('[x-data]').forEach(el => {
                if (el.__x && el.__x.$data.open) {
                    el.__x.$data.open = false;
                }
            });
        }
    });
</script>