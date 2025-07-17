<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold">Total Pendaftar</h2>
                <p class="text-3xl mt-1">{{ \App\Models\Pendaftaran::count() }}</p>
            </div>

            {{-- Tombol Export Excel --}}
            <a href="{{ route('export.pendaftaran') }}" target="_blank"
                class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-md shadow hover:bg-emerald-700 transition duration-200 group">
                
                {{-- Lucide File Down Icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 stroke-white group-hover:stroke-yellow-200 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 2v6h6"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-6m0 6l-3-3m3 3l3-3"/>
                </svg>

                Export Excel
            </a>
        </div>
    </x-filament::card>
</x-filament::widget>
