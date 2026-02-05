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
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('akademik.index') }}" class="ml-1 hover:text-brand-blue">Portal Akademik</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 font-medium text-gray-800">{{ $category->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div
                class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue to-rose-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-rose-500/20 rounded-full blur-2xl"></div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <span
                        class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-rose-200 uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Pusat Informasi Dokumen
                    </span>
                    <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight">
                        {{ $category->name }}
                    </h1>
                    <p class="text-rose-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90">
                        Unduh file dan dokumen penting terkait layanan administrasi dan akademik Universitas Kadiri.
                    </p>
                </div>
            </div>

            <div x-data="{ 
                        search: '',
                        yearFilter: '',
                        matches(item) {
                            const searchMatch = !this.search || item.title.toLowerCase().includes(this.search.toLowerCase());
                            const yearMatch = !this.yearFilter || item.year == this.yearFilter;
                            return searchMatch && yearMatch;
                        }
                    }">
                <!-- Global Filter Card -->
                <div
                    class="bg-white/70 backdrop-blur-xl border border-white rounded-3xl shadow-xl p-8 mb-10 -mt-20 relative z-20 mx-4 md:mx-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Year Filter -->
                        <div>
                            <label
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 px-1">Filter
                                Tahun</label>
                            <select x-model="yearFilter"
                                class="w-full px-5 py-4 bg-gray-50 border-gray-100 rounded-2xl text-sm text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                                <option value="">Semua Tahun</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search Box -->
                        <div>
                            <label
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 px-1">Cari
                                Judul Dokumen</label>
                            <div class="relative group">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                                <input x-model="search" type="text" placeholder="Masukkan kata kunci..."
                                    class="w-full pl-12 pr-5 py-4 bg-gray-50 border-gray-100 rounded-2xl text-sm text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents View -->
                <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden mx-4 md:mx-0 mb-12">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-brand-blue">
                                    <th class="px-10 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em]">Tahun
                                    </th>
                                    <th class="px-10 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em]">Judul
                                        Dokumen</th>
                                    <th
                                        class="px-10 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em] text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse($category->academicDocuments as $doc)
                                    <tr x-show="matches({
                                                    title: '{{ strtolower(addslashes($doc->title)) }}',
                                                    year: '{{ $doc->year }}'
                                                })" x-transition.opacity class="hover:bg-rose-50/30 transition-all group">
                                        <td class="px-10 py-8">
                                            <span
                                                class="inline-flex items-center px-4 py-1.5 bg-brand-blue/5 text-brand-blue text-xs font-black rounded-full border border-brand-blue/10 uppercase tracking-wider">
                                                {{ $doc->year ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-10 py-8">
                                            <div class="flex items-center gap-6">
                                                <div
                                                    class="flex-shrink-0 w-16 h-16 rounded-2xl bg-gradient-to-br from-rose-50 to-rose-100 text-rose-600 flex items-center justify-center group-hover:from-rose-600 group-hover:to-rose-800 group-hover:text-white group-hover:rotate-3 group-hover:scale-110 transition-all duration-300 shadow-sm group-hover:shadow-xl group-hover:shadow-rose-500/30">
                                                    @if($doc->file_path)
                                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    @else
                                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.828a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-xl font-black text-gray-800 group-hover:text-rose-600 transition-colors tracking-tight uppercase italic">{{ $doc->title }}</span>
                                                    @if($doc->description)
                                                        <span
                                                            class="text-xs text-gray-400 mt-2 italic line-clamp-1">{!! strip_tags($doc->description) !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-10 py-8 text-right">
                                            @if($doc->file_path)
                                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                                    class="inline-flex items-center gap-2 px-8 py-3 bg-rose-600 text-white rounded-2xl hover:bg-rose-700 transition-all font-black text-sm shadow-lg shadow-rose-500/40 hover:scale-105 active:scale-95 group/btn">
                                                    <span>Unduh Sekarang</span>
                                                    <svg class="w-5 h-5 group-hover/btn:translate-y-0.5 transition-transform"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @elseif($doc->url)
                                                <a href="{{ $doc->url }}" target="_blank"
                                                    class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 text-white rounded-2xl hover:bg-indigo-700 transition-all font-black text-sm shadow-lg shadow-indigo-500/40 hover:scale-105 active:scale-95 group/btn">
                                                    <span>Buka Tautan</span>
                                                    <svg class="w-5 h-5 group-hover/btn:translate-x-0.5 transition-transform"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-10 py-32 text-center">
                                            <div class="flex flex-col items-center opacity-30">
                                                <svg class="w-24 h-24 text-gray-300 mb-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-2xl font-black text-gray-400">Belum ada dokumen yang diunggah.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Back Link -->
            <div class="mt-8 text-center">
                <a href="{{ route('akademik.index') }}"
                    class="inline-flex items-center text-brand-blue font-bold hover:underline gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18">
                        </path>
                    </svg>
                    Kembali ke Portal Akademik
                </a>
            </div>
        </div>
    </div>
@endsection