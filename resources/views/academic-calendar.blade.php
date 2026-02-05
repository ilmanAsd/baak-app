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
                            <span class="ml-1 font-medium text-gray-800">Kalender Akademik</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Block -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 mb-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-brand-yellow/5 rounded-full -mr-32 -mt-32"></div>
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl font-extrabold text-brand-blue mb-4">Informasi Kalender Akademik</h1>
                        <p class="text-gray-500 text-lg leading-relaxed max-w-2xl">
                            Jadwal resmi kegiatan perkuliahan, ujian, dan periode administratif universitas untuk mendukung
                            perencanaan studi Anda.
                            <!-- Premium Header Section -->
                        <div
                            class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue to-sky-900 shadow-2xl">
                            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-sky-500/20 rounded-full blur-2xl">
                            </div>

                            <div class="relative z-10 container mx-auto px-10 text-center">
                                <span
                                    class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-sky-200 uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                                    Agenda Pendidikan
                                </span>
                                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight">
                                    Kalender <span
                                        class="text-transparent bg-clip-text bg-gradient-to-r from-sky-200 to-white">Akademik</span>
                                </h1>
                                <p class="text-sky-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90">
                                    Jadwal resmi seluruh kegiatan akademik untuk memastikan kelancaran proses belajar
                                    mengajar di Universitas Kadiri.
                                </p>
                            </div>
                        </div>

                        <div x-data="{ search: '' }">
                            <!-- Global Controls Card -->
                            <div
                                class="bg-white/70 backdrop-blur-xl border border-white rounded-3xl shadow-xl p-8 mb-10 -mt-20 relative z-20 mx-4 md:mx-10">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
                                    <!-- Filters -->
                                    <div class="md:col-span-1">
                                        <label
                                            class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider ml-1">Filter
                                            Jadwal</label>
                                        <form action="{{ route('akademik.calendar') }}" method="GET" class="flex gap-4">
                                            <select name="academic_year" onchange="this.form.submit()"
                                                class="flex-1 pl-4 pr-10 py-3 bg-gray-50 border-gray-100 rounded-2xl text-sm font-bold text-gray-700 focus:ring-brand-blue focus:border-brand-blue shadow-inner appearance-none transition-all">
                                                <option value="">Semua Tahun</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}" {{ request('academic_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                            <select name="category" onchange="this.form.submit()"
                                                class="flex-1 pl-4 pr-10 py-3 bg-gray-50 border-gray-100 rounded-2xl text-sm font-bold text-gray-700 focus:ring-brand-blue focus:border-brand-blue shadow-inner appearance-none transition-all">
                                                <option value="">Semua Kategori</option>
                                                <option value="Mahasiswa" {{ request('category') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                <option value="Fakultas" {{ request('category') == 'Fakultas' ? 'selected' : '' }}>Fakultas</option>
                                            </select>
                                        </form>
                                    </div>

                                    <!-- Search -->
                                    <div class="md:col-span-2">
                                        <label
                                            class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider ml-1">Cari
                                            Kegiatan</label>
                                        <div class="relative group">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </span>
                                            <input x-model="search" type="text"
                                                placeholder="Cari nama kegiatan atau tahun akademik..."
                                                class="w-full pl-14 pr-6 py-3 bg-gray-50 border-gray-100 rounded-2xl text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue shadow-inner transition-all">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Events Table -->
                            <div
                                class="bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden mx-4 md:mx-0 mb-12">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left border-collapse">
                                        <thead>
                                            <tr class="bg-brand-blue">
                                                <th
                                                    class="px-8 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">
                                                    Kegiatan Akademik</th>
                                                <th
                                                    class="px-8 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-center">
                                                    Kategori</th>
                                                <th
                                                    class="px-8 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-center">
                                                    Tanggal Pelaksanaan</th>
                                                <th
                                                    class="px-8 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-right">
                                                    Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            @forelse($events as $event)
                                                <tr x-show="'{{ strtolower($event->title) }} {{ strtolower($event->academic_year) }}'.includes(search.toLowerCase())"
                                                    x-transition.opacity class="hover:bg-sky-50/50 transition-all group">
                                                    <td class="px-8 py-8">
                                                        <div class="flex flex-col">
                                                            <span
                                                                class="text-xs font-black text-brand-blue/40 uppercase tracking-widest mb-2 group-hover:text-brand-blue group-hover:translate-x-1 transition-all">{{ $event->academic_year }}</span>
                                                            <span
                                                                class="text-xl font-black text-gray-800 mb-2 group-hover:text-brand-blue transition-colors">{{ $event->title }}</span>
                                                            @if($event->description)
                                                                <span
                                                                    class="text-sm text-gray-500 line-clamp-2 max-w-xl italic opacity-80">{{ $event->description }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-8 py-8 text-center">
                                                        <span
                                                            class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter {{ $event->category == 'Mahasiswa' ? 'bg-sky-100 text-sky-700 border border-sky-200' : 'bg-amber-100 text-amber-700 border border-amber-200' }}">
                                                            {{ $event->category }}
                                                        </span>
                                                    </td>
                                                    <td class="px-8 py-8 text-center">
                                                        <div class="flex flex-col items-center">
                                                            <span
                                                                class="text-lg font-black text-gray-700">{{ $event->start_date->translatedFormat('d F Y') }}</span>
                                                            @if($event->end_date)
                                                                <span
                                                                    class="text-xs font-bold text-gray-400 mt-1 uppercase tracking-widest">sampai</span>
                                                                <span
                                                                    class="text-md font-bold text-gray-600 mt-1">{{ $event->end_date->translatedFormat('d F Y') }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-8 py-8 text-right">
                                                        @php
                                                            $now = now();
                                                            $isPast = $event->end_date ? $event->end_date->isPast() : $event->start_date->isPast();
                                                            $isOngoing = $event->end_date ? ($now->between($event->start_date, $event->end_date->endOfDay())) : $now->isSameDay($event->start_date);
                                                        @endphp
                                                        @if($isOngoing)
                                                            <span
                                                                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 font-black text-[10px] uppercase border border-emerald-100">
                                                                <span
                                                                    class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                                                                Sedang Berjalan
                                                            </span>
                                                        @elseif($isPast)
                                                            <span
                                                                class="px-4 py-1.5 rounded-xl bg-gray-100 text-gray-500 font-black text-[10px] uppercase border border-gray-200">
                                                                Selesai
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-4 py-1.5 rounded-xl bg-indigo-50 text-indigo-700 font-black text-[10px] uppercase border border-indigo-100">
                                                                Mendatang
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="px-8 py-20 text-center">
                                                        <div class="flex flex-col items-center opacity-40">
                                                            <svg class="w-20 h-20 text-gray-300 mb-4" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                            <span class="text-xl font-bold text-gray-500">Belum ada jadwal
                                                                kegiatan.</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Action Card -->
                            @if($portalSetting && $portalSetting->calendar_pdf)
                                <div
                                    class="mt-12 bg-gradient-to-r from-brand-blue to-blue-900 rounded-3xl p-8 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
                                    <div class="text-center md:text-left">
                                        <h3 class="text-xl font-bold mb-2">Ingin mengunduh PDF Kalender?</h3>
                                        <p class="opacity-80">Dapatkan versi lengkap kalender akademik untuk arsip Anda.</p>
                                    </div>
                                    <a href="{{ $portalSetting->calendar_pdf }}" target="_blank"
                                        class="px-8 py-4 bg-brand-yellow text-brand-blue font-bold rounded-2xl hover:bg-yellow-400 transition-all transform hover:scale-105 shadow-lg">
                                        Unduh PDF Kalender
                                    </a>
                                </div>
                            @endif

                            <div class="mt-12 text-center">
                                <a href="{{ route('akademik.index') }}"
                                    class="inline-flex items-center text-brand-blue font-bold hover:underline gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Kembali ke Portal Akademik
                                </a>
                            </div>
                        </div>
                    </div>
@endsection