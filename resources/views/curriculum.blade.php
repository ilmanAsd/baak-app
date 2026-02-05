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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('pembelajaran') }}" class="ml-1 hover:text-brand-blue">Pembelajaran</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 font-medium text-gray-800">Kurikulum Fakultas</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-yellow-500/20 rounded-full blur-2xl"></div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-brand-yellow uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Study Programs
                    </span>
                    <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight">
                        KURIKULUM FAKULTAS
                    </h1>
                    <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90">
                        Daftar lengkap kurikulum dan rencana studi untuk seluruh program studi di lingkungan Universitas Kadiri.
                    </p>
                </div>
            </div>

            <div x-data="{ 
                search: '', 
                facultyFilter: '', 
                prodiFilter: '',
                matches(item) {
                    const searchMatch = !this.search || item.title.toLowerCase().includes(this.search.toLowerCase());
                    const facultyMatch = !this.facultyFilter || item.faculty_id == this.facultyFilter;
                    const prodiMatch = !this.prodiFilter || item.prodi_id == this.prodiFilter;
                    return searchMatch && facultyMatch && prodiMatch;
                }
            }">
                <!-- Filter Section Card -->
                <div class="bg-white/70 backdrop-blur-xl border border-white rounded-3xl shadow-xl p-8 mb-10 -mt-20 relative z-20 mx-4 md:mx-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Faculty Filter -->
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 px-1">Filter Fakultas</label>
                            <select x-model="facultyFilter" class="w-full px-5 py-4 bg-gray-50 border-gray-100 rounded-2xl text-sm text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                                <option value="">Semua Fakultas</option>
                                @foreach($faculties as $f)
                                    <option value="{{ $f->id }}">{{ $f->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Study Program Filter -->
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 px-1">Filter Program Studi</label>
                            <select x-model="prodiFilter" class="w-full px-5 py-4 bg-gray-50 border-gray-100 rounded-2xl text-sm text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                                <option value="">Semua Program Studi</option>
                                @foreach($studyPrograms as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Search Box -->
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 px-1">Cari Nama Kurikulum</label>
                            <div class="relative group">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
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
                                    <th class="px-8 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em]">Fakultas</th>
                                    <th class="px-8 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em]">Program Studi</th>
                                    <th class="px-8 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em]">Nama & Deskripsi Kurikulum</th>
                                    <th class="px-8 py-6 text-white font-bold text-[14px] uppercase tracking-[0.2em] text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse($kurikulum as $item)
                                    <tr x-show="matches({
                                            title: '{{ strtolower($item->title) }}',
                                            faculty_id: '{{ $item->faculty_id }}',
                                            prodi_id: '{{ $item->study_program_id }}'
                                        })"
                                        x-transition.opacity class="hover:bg-indigo-50/30 transition-all group">
                                        <td class="px-8 py-8">
                                            <span class="text-sm font-bold text-gray-600 uppercase tracking-tight">{{ $item->faculty?->name ?? 'Semua Fakultas' }}</span>
                                        </td>
                                        <td class="px-8 py-8">
                                            <span class="text-sm font-black text-brand-blue tracking-tight">{{ $item->studyProgram?->name ?? 'Umum / Semua Prodi' }}</span>
                                        </td>
                                        <td class="px-8 py-8">
                                            <div class="flex flex-col">
                                                <span class="text-lg font-black text-gray-800 group-hover:text-brand-blue transition-colors tracking-tight">{{ $item->title }}</span>
                                                <div class="text-xs text-gray-500 mt-2 prose prose-sm max-w-none line-clamp-2">
                                                    {!! $item->description !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-8 text-right">
                                            <div class="flex justify-end gap-3">
                                                @if($item->file_path)
                                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-blue text-white rounded-xl hover:bg-blue-900 transition-all font-black text-xs shadow-lg shadow-brand-blue/20">
                                                        <span>PDF</span>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                    </a>
                                                @endif
                                                @if($item->url)
                                                    <a href="{{ $item->url }}" target="_blank"
                                                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-all font-black text-xs shadow-lg shadow-emerald-500/20">
                                                        <span>LINK</span>
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-10 py-32 text-center">
                                            <div class="flex flex-col items-center opacity-30">
                                                <svg class="w-24 h-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-2xl font-black text-gray-400">Data kurikulum belum tersedia.</p>
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
                <a href="{{ route('pembelajaran') }}" class="inline-flex items-center text-brand-blue font-bold hover:underline gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Pembelajaran
                </a>
            </div>
        </div>
    </div>
@endsection
