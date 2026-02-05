@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-brand-blue flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 font-medium text-gray-800">Dokumen Eksternal</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-brand-yellow/20 rounded-full blur-2xl"></div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-brand-yellow uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Information Center
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 uppercase italic tracking-tight">
                        Dokumen <span class="text-brand-yellow">Eksternal</span>
                    </h1>
                    <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90 leading-relaxed font-medium">
                        Daftar Peraturan, Pedoman, dan SK yang berlaku di lingkungan Universitas Kadiri.
                    </p>
                </div>
            </div>

            <div x-data="{ activeTab: 'Akademik' }">
                <!-- Horizontal Tabs -->
                <div class="flex flex-wrap justify-center gap-4 mb-10 -mt-8 relative z-20">
                    @foreach(['Akademik', 'Pembelajaran', 'Kemahasiswaan'] as $tab)
                        <button @click="activeTab = '{{ $tab }}'"
                            :class="activeTab === '{{ $tab }}' ? 'bg-brand-blue text-brand-yellow shadow-xl' : 'bg-white text-gray-500 hover:bg-gray-50'"
                            class="px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] transition-all border border-white/10 backdrop-blur-md">
                            {{ $tab }}
                        </button>
                    @endforeach
                </div>

                <!-- Tabs Content -->
                @foreach(['Akademik', 'Pembelajaran', 'Kemahasiswaan'] as $tab)
                    <div x-show="activeTab === '{{ $tab }}'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                        @php $categoryDocs = $segments[$tab] ?? collect([]); @endphp
                        
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-12 h-1 bg-brand-yellow rounded-full"></div>
                            <h2 class="text-3xl font-black text-brand-blue uppercase italic tracking-tight">Kategori {{ $tab }}</h2>
                        </div>

                        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-brand-blue">
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Tahun</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">No. Peraturan/Pedoman/SK</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Judul Dokumen</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Status</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em] text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 bg-white">
                                        @php $docs = $documents->get($tab, collect([])); @endphp
                                        @forelse($docs as $doc)
                                            <tr class="hover:bg-indigo-50/30 transition-all group">
                                                <td class="px-6 py-6">
                                                    <span class="inline-flex items-center px-4 py-1.5 bg-brand-blue/5 text-brand-blue text-[11px] font-black rounded-full border border-brand-blue/10">
                                                        {{ $doc->year }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-6 font-bold text-gray-700 text-sm italic">
                                                    {{ $doc->document_number }}
                                                </td>
                                                <td class="px-6 py-6">
                                                    <span class="text-base font-black text-gray-800 group-hover:text-brand-blue transition-colors tracking-tight uppercase italic line-clamp-2">{{ $doc->title }}</span>
                                                </td>
                                                <td class="px-6 py-6 font-black uppercase text-[10px] tracking-widest">
                                                    @if($doc->status === 'Berlaku')
                                                        <span class="text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100">Berlaku</span>
                                                    @else
                                                        <span class="text-rose-600 bg-rose-50 px-3 py-1 rounded-lg border border-rose-100">Tidak Berlaku</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-6 text-right">
                                                    <div class="flex justify-end gap-2">
                                                        @if($doc->file_path)
                                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                                                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-blue text-white rounded-xl hover:bg-blue-900 transition-all font-black text-[10px] shadow-lg shadow-brand-blue/20">
                                                                <span>PDF</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                            </a>
                                                        @endif
                                                        @if($doc->url)
                                                            <a href="{{ $doc->url }}" target="_blank"
                                                                class="inline-flex items-center gap-2 px-4 py-2 bg-brand-yellow text-brand-blue rounded-xl hover:scale-105 transition-all font-black text-[10px] shadow-lg shadow-brand-yellow/20">
                                                                <span>LINK</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-6 py-20 text-center text-gray-400 italic">
                                                    Belum ada dokumen eksternal untuk kategori {{ $tab }}.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
