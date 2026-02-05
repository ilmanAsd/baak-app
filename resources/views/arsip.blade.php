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
                            <span class="ml-1 font-medium text-gray-800">Arsip BAAK</span>
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
                        Archive System
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 uppercase italic tracking-tight">
                        Arsip <span class="text-brand-yellow">BAAK</span>
                    </h1>
                    <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90 leading-relaxed font-medium">
                        Kumpulan arsip dokumen digital BAAK Universitas Kadiri yang dikelola secara terpusat untuk memudahkan pencarian dan akses bagi bagian terkait.
                    </p>
                </div>
            </div>

            <div x-data="{ 
                activeTab: '{{ $sections->first() ? $sections->first()->slug : '' }}' ,
                search: '{{ request('search') }}',
                yearFilter: '{{ request('year') }}',
                categoryFilter: '{{ request('category_id') }}',
                matches(item) {
                    const s = this.search.toLowerCase();
                    const searchMatch = !this.search || item.title.toLowerCase().includes(s);
                    const yearMatch = !this.yearFilter || item.year == this.yearFilter;
                    const catMatch = !this.categoryFilter || item.category == this.categoryFilter;
                    return searchMatch && yearMatch && catMatch;
                }
            }">
                <!-- Redesigned Search & Filter Bar (Floating Card) -->
                <div class="bg-white rounded-[2rem] shadow-2xl p-8 mb-16 border border-gray-100 -mt-16 relative z-30 mx-4 md:mx-10">
                    <form action="{{ route('arsip.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Filter Kategori -->
                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Filter Kategori</label>
                            <div class="relative group">
                                <select name="category_id" x-model="categoryFilter"
                                    class="w-full pl-5 pr-10 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-brand-blue">
                                    <span class="material-symbols-outlined text-xl">expand_more</span>
                                </span>
                            </div>
                        </div>

                        <!-- Filter Tahun -->
                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Filter Tahun</label>
                            <div class="relative group">
                                <select name="year" x-model="yearFilter" 
                                    class="w-full pl-5 pr-10 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer">
                                    <option value="">Semua Tahun</option>
                                    @foreach($years as $yr)
                                        <option value="{{ $yr }}">
                                            {{ $yr }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-brand-blue">
                                    <span class="material-symbols-outlined text-xl">expand_more</span>
                                </span>
                            </div>
                        </div>

                        <!-- Cari Judul Dokumen -->
                        <div class="space-y-3">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Cari Judul Dokumen</label>
                            <div class="relative group">
                                <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <span class="material-symbols-outlined text-xl">search</span>
                                </span>
                                <input type="text" name="search" x-model="search" placeholder="Masukkan kata kunci..." 
                                    class="w-full pl-12 pr-12 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                                
                                <button type="button" x-show="search || yearFilter || categoryFilter" @click="search = ''; yearFilter = ''; categoryFilter = ''; window.history.replaceState({}, '', window.location.pathname)" 
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-rose-500 hover:text-rose-700 transition-colors" title="Clear Filters">
                                    <span class="material-symbols-outlined text-xl">close</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Horizontal Tabs -->
                <div class="flex flex-wrap justify-center gap-4 mb-10 relative z-20">
                    @foreach($sections as $section)
                        <button @click="activeTab = '{{ $section->slug }}'"
                            :class="activeTab === '{{ $section->slug }}' ? 'bg-brand-blue text-brand-yellow shadow-xl scale-105' : 'bg-white text-gray-500 hover:bg-gray-50 hover:scale-102'"
                            class="px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] transition-all border border-white/10 backdrop-blur-md">
                            {{ $section->name }}
                            @if($section->archives->count() > 0)
                                <span class="ml-2 px-2 py-0.5 bg-white/20 rounded-full text-[10px]">{{ $section->archives->count() }}</span>
                            @endif
                        </button>
                    @endforeach
                </div>

                <!-- Tabs Content -->
                @foreach($sections as $section)
                    <div x-show="activeTab === '{{ $section->slug }}'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                        
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-1 bg-brand-yellow rounded-full"></div>
                                <h2 class="text-3xl font-black text-brand-blue uppercase italic tracking-tight">Bagian {{ $section->name }}</h2>
                            </div>
                        </div>

                        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-brand-blue">
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Tanggal</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Kategori</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">Judul Dokumen</th>
                                            <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em] text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 bg-white">
                                        @foreach($section->archives as $archive)
                                            <tr x-show="matches({
                                                    title: '{{ strtolower(addslashes($archive->title)) }}',
                                                    year: '{{ $archive->date->format('Y') }}',
                                                    category: '{{ $archive->category_id }}'
                                                })" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="hover:bg-indigo-50/30 transition-all group">
                                                <td class="px-6 py-6 whitespace-nowrap">
                                                    <span class="inline-flex items-center px-4 py-1.5 bg-brand-blue/5 text-brand-blue text-[14px] font-black rounded-full border border-brand-blue/10">
                                                        {{ $archive->date->format('d M Y') }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-6">
                                                    <span class="px-3 py-1 bg-brand-yellow/10 text-brand-blue text-[14px] font-black uppercase rounded-lg border border-brand-yellow/20">
                                                        {{ $archive->category->name }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-6">
                                                    <span class="text-base font-black text-gray-800 group-hover:text-brand-blue transition-colors tracking-tight uppercase line-clamp-2">
                                                        {{ $archive->title }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-6 text-right">
                                                    <div class="flex justify-end gap-2">
                                                        @if($archive->attachment)
                                                            <a href="{{ asset('storage/' . $archive->attachment) }}" target="_blank"
                                                                class="inline-flex items-center gap-2 px-6 py-3 bg-brand-blue text-white rounded-xl hover:bg-blue-900 transition-all font-black text-[10px] shadow-lg shadow-brand-blue/20">
                                                                <span>DOWNLOAD</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                            </a>
                                                        @endif
                                                        @if($archive->link)
                                                            <a href="{{ $archive->link }}" target="_blank"
                                                                class="inline-flex items-center gap-2 px-6 py-3 bg-brand-yellow text-brand-blue rounded-xl hover:scale-105 transition-all font-black text-[10px] shadow-lg shadow-brand-yellow/20">
                                                                <span>LINK</span>
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($section->archives->count() === 0)
                                            <tr>
                                                <td colspan="4" class="px-6 py-20 text-center text-gray-400 italic">
                                                    Belum ada dokumen arsip untuk bagian {{ $section->name }}.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- end x-data -->
        </div>
    </div>
@endsection
