@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <header class="bg-brand-blue pt-20 pb-40 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-yellow/10 rounded-full -mr-64 -mt-64 blur-3xl">
            </div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-white/5 rounded-full -ml-40 -mb-40 blur-2xl">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-3 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                <span class="w-2 h-2 bg-brand-yellow rounded-full animate-pulse"></span>
                <span class="text-[10px] font-black text-brand-yellow uppercase tracking-[0.3em]">Monitoring
                    Dokumen</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 italic tracking-tight uppercase">
                REKAP DOKUMEN <span class="text-brand-yellow">PROGRAM STUDI</span>
            </h1>
            <p class="text-white/70 text-lg max-w-2xl mx-auto font-medium">
                Sistem rekapitulasi dokumen program studi secara real-time dari Universitas Kadiri.
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 -mt-20 pb-20 relative z-20" x-data="{ 
        search: '{{ $search ?? '' }}', 
        selectedProdi: '{{ $selectedProdi ?? '' }}',
        prodiIndex: {{ $prodiIndex ?? -1 }},
        data: @js($data),
        matches(row) {
            const s = this.search.toLowerCase();
            const searchMatch = !this.search || row.some(cell => String(cell).toLowerCase().includes(s));
            const prodiMatch = !this.selectedProdi || (this.prodiIndex !== -1 && String(row[this.prodiIndex]).trim() === this.selectedProdi);
            return searchMatch && prodiMatch;
        },
        get hasResults() {
            return this.data.some(row => this.matches(row));
        }
    }">
        <!-- Floating Filter Bar -->
        <div class="bg-white rounded-[2.5rem] shadow-2xl p-8 mb-16 border border-gray-100 mx-4 md:mx-10">
            <form action="{{ route('rekap-prodi.index') }}" method="GET"
                class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                <!-- Filter Program Studi -->
                <div class="md:col-span-4 space-y-3">
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Pilih
                        Program Studi</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400">
                            <span class="material-symbols-outlined text-xl">school</span>
                        </span>
                        <select name="prodi" x-model="selectedProdi"
                            class="w-full pl-12 pr-10 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer">
                            <option value="">Semua Program Studi</option>
                            @foreach($prodiList as $prodi)
                                <option value="{{ $prodi }}">
                                    {{ $prodi }}
                                </option>
                            @endforeach
                        </select>
                        <span
                            class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-brand-blue">
                            <span class="material-symbols-outlined text-xl">expand_more</span>
                        </span>
                    </div>
                </div>

                <!-- Cari Kata Kunci -->
                <div class="md:col-span-6 space-y-3">
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Cari Data</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400">
                            <span class="material-symbols-outlined text-xl">search</span>
                        </span>
                        <input type="text" name="search" x-model="search" placeholder="Masukkan kata kunci..."
                            class="w-full pl-12 pr-4 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                    </div>
                </div>

                <div class="md:col-span-2 flex gap-2">
                    <button type="button" x-show="search || selectedProdi" @click="search = ''; selectedProdi = ''; window.history.replaceState({}, '', window.location.pathname)" 
                        class="flex-grow py-4 bg-gray-100 text-gray-500 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-gray-200 transition-all">
                        RESET
                    </button>
                    <a x-show="search || selectedProdi" href="{{ route('rekap-prodi.index') }}"
                        class="p-4 bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-100 transition-all flex items-center justify-center" title="Hard Reset">
                        <span class="material-symbols-outlined text-xl">refresh</span>
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-brand-blue">
                            @foreach($headers as $header)
                                <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em] {{ strtolower($header) === 'no' ? 'w-16 text-center' : '' }}">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($data as $row)
                            <tr x-show="matches(@js($row))" x-transition.opacity class="border-b border-[#003366]/20 hover:bg-indigo-50/30 transition-all group">
                                @foreach($row as $cellIndex => $cell)
                                    @php $isNo = strtolower($headers[$cellIndex] ?? '') === 'no'; @endphp
                                    <td class="px-6 py-6 {{ $isNo ? 'text-center' : '' }}">
                                        @if(str_starts_with($cell, 'http://') || str_starts_with($cell, 'https://'))
                                            <a href="{{ $cell }}" target="_blank"
                                                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-blue text-brand-yellow rounded-xl hover:bg-black transition-all font-black text-[10px] shadow-lg shadow-brand-blue/10 uppercase tracking-widest">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                                Lihat File
                                            </a>
                                        @else
                                            <span class="text-sm font-bold text-gray-800 group-hover:text-brand-blue transition-colors leading-relaxed break-words block {{ $isNo ? '' : 'min-w-[150px]' }}">
                                                {{ $cell }}
                                            </span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr x-show="!hasResults" x-cloak>
                            <td colspan="{{ count($headers) ?: 1 }}" class="px-6 py-20 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <span class="material-symbols-outlined text-gray-300 text-4xl">search_off</span>
                                </div>
                                <h3 class="text-lg font-black text-gray-400 uppercase italic">Tidak Ada Hasil</h3>
                                <p class="text-gray-400 text-xs font-medium mt-1">Tidak ada data yang cocok dengan kriteria pencarian Anda.</p>
                            </td>
                        </tr>
                        @if(empty($data))
                            <tr>
                                <td colspan="{{ count($headers) ?: 1 }}" class="px-6 py-20 text-center">
                                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                        <span class="material-symbols-outlined text-gray-300 text-4xl">inventory_2</span>
                                    </div>
                                    <h3 class="text-lg font-black text-gray-400 uppercase italic">Data belum tersedia</h3>
                                    <p class="text-gray-400 text-xs font-medium mt-1">Silakan cek kembali url spreadsheet di admin.</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-12 text-center text-gray-400 text-[10px] uppercase font-black tracking-[0.3em]">
            &copy; {{ date('Y') }} Satu Pintu BAAK Universitas Kadiri - Live Management System
        </div>
    </main>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection