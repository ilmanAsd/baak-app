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
                            <span class="ml-1 font-medium text-gray-800">Rekap Suasana Akademik</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div
                class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue to-indigo-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-indigo-500/20 rounded-full blur-2xl"></div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <span
                        class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-indigo-200 uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Transparansi & Akuntabilitas
                    </span>
                    <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tight">
                        Rekap Suasana <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-200 to-white">Akademik</span>
                    </h1>
                    <p class="text-indigo-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90">
                        Dokumentasi menyeluruh kegiatan akademik Universitas Kadiri yang terintegrasi secara real-time untuk
                        pemantauan kualitas pendidikan yang berkelanjutan.
                    </p>
                </div>
            </div>

            <div x-data="{ 
                allData: {{ json_encode($allData) }},
                search: '',
                yearFilter: 'Semua',
                perPage: 25,
                page: 1,
                get filteredData() {
                    return this.allData.filter(row => {
                        const matchesSearch = JSON.stringify(row).toLowerCase().includes(this.search.toLowerCase());
                        const matchesYear = this.yearFilter === 'Semua' || (row[2] && row[2].toString() === this.yearFilter);
                        return matchesSearch && matchesYear;
                    });
                }
            }" @filter-year.window="yearFilter = $event.detail; page = 1">

                <!-- Global Controls Card -->
                <div
                    class="bg-white/70 backdrop-blur-xl border border-white rounded-3xl shadow-xl p-8 mb-10 -mt-20 relative z-20 mx-4 md:mx-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
                        <!-- Year Selection -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider ml-1">Pilih
                                Tahun</label>
                            <div class="relative">
                                <select x-model="yearFilter"
                                    class="w-full pl-5 pr-10 py-3 bg-gray-50 border-gray-100 rounded-2xl text-gray-700 font-semibold focus:ring-brand-blue focus:border-brand-blue shadow-inner transition-all appearance-none">
                                    <option value="Semua">Semua Tahun</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Modern Search Bar -->
                        <div class="md:col-span-2">
                            <label
                                class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider ml-1">Pencarian
                                Cepat</label>
                            <div class="relative group">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </span>
                                <input x-model="search" type="text"
                                    placeholder="Cari kegiatan, lokasi, narasumber, atau deskripsi..."
                                    class="w-full pl-14 pr-6 py-3 bg-gray-50 border-gray-100 rounded-2xl text-gray-700 focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue shadow-inner transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden mx-4 md:mx-0">
                    <!-- Table Header Actions -->
                    <div
                        class="px-8 py-6 bg-gray-50/50 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-gray-500">Tampilkan</span>
                            <select x-model="perPage"
                                class="bg-white border-gray-200 rounded-xl py-1.5 px-4 text-sm font-bold text-brand-blue shadow-sm focus:ring-brand-blue focus:border-brand-blue">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm font-bold text-gray-500">Baris</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Live Sync
                                Connected</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-brand-blue">
                                    <th
                                        class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-center w-16">
                                        No</th>
                                    <th
                                        class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] min-w-[140px]">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-center">
                                        Tahun</th>
                                    <th class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">Kegiatan
                                    </th>
                                    <th class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">Waktu
                                    </th>
                                    <th class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">Lokasi
                                    </th>
                                    <th class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">Peserta
                                    </th>
                                    <th
                                        class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] min-w-[300px]">
                                        Deskripsi</th>
                                    <th class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em]">
                                        Narasumber</th>
                                    <th
                                        class="px-6 py-5 text-white font-bold text-xs uppercase tracking-[0.15em] text-center">
                                        Skala</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <template x-for="(row, index) in filteredData.slice((page-1)*perPage, page*perPage)"
                                    :key="index">
                                    <tr class="hover:bg-indigo-50/30 transition-all group">
                                        <td class="px-6 py-5 text-center font-mono text-gray-400 group-hover:text-brand-blue font-bold"
                                            x-text="((page-1)*perPage) + index + 1"></td>
                                        <td class="px-6 py-5 font-bold text-gray-700" x-text="row[1]"></td>
                                        <td class="px-6 py-5 text-center">
                                            <span
                                                class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-black group-hover:bg-brand-blue group-hover:text-white transition-colors"
                                                x-text="row[2]"></span>
                                        </td>
                                        <td class="px-6 py-5">
                                            <span class="font-extrabold text-brand-blue block mb-1" x-text="row[3]"></span>
                                            <span class="text-[10px] uppercase font-bold text-gray-400 tracking-wider"
                                                x-text="row[4]"></span>
                                        </td>
                                        <td class="px-6 py-5 text-gray-600 text-sm italic" x-text="row[4]"></td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="text-sm font-semibold text-gray-600" x-text="row[5]"></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <span
                                                class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-[10px] font-black uppercase"
                                                x-text="row[6]"></span>
                                        </td>
                                        <td class="px-6 py-5 text-sm text-gray-500 leading-relaxed" x-text="row[7]"></td>
                                        <td class="px-6 py-5 text-sm font-bold text-indigo-900" x-text="row[8]"></td>
                                        <td class="px-6 py-5 text-center">
                                            <span
                                                class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-lg text-[10px] font-black uppercase tracking-tight"
                                                x-text="row[9]"></span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Stats & Pagination -->
                    <div
                        class="px-8 py-8 bg-gray-50/50 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="text-gray-500 text-sm font-semibold">
                            Menampilkan <span class="text-brand-blue font-black"
                                x-text="filteredData.length > 0 ? (page-1)*perPage + 1 : 0"></span> -
                            <span class="text-brand-blue font-black"
                                x-text="Math.min(page*perPage, filteredData.length)"></span> dari
                            <span class="text-brand-blue font-black" x-text="filteredData.length"></span> Baris Data
                        </div>

                        <div class="flex items-center gap-3">
                            <button @click="page--" :disabled="page <= 1"
                                class="flex items-center gap-2 px-6 py-2.5 bg-white text-gray-600 font-bold rounded-2xl border border-gray-200 hover:bg-brand-blue hover:text-white hover:border-brand-blue disabled:opacity-50 disabled:hover:bg-white disabled:hover:text-gray-600 transition-all shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Prev
                            </button>
                            <div class="flex items-center gap-1">
                                <template x-for="p in Math.ceil(filteredData.length/perPage)" :key="p">
                                    <button @click="page = p"
                                        :class="page === p ? 'bg-brand-blue text-white shadow-lg shadow-brand-blue/30' : 'bg-white text-gray-600 hover:bg-gray-100'"
                                        class="w-10 h-10 rounded-xl font-bold transition-all text-sm" x-text="p"></button>
                                </template>
                            </div>
                            <button @click="page++" :disabled="page >= Math.ceil(filteredData.length/perPage)"
                                class="flex items-center gap-2 px-6 py-2.5 bg-white text-gray-600 font-bold rounded-2xl border border-gray-200 hover:bg-brand-blue hover:text-white hover:border-brand-blue disabled:opacity-50 disabled:hover:bg-white disabled:hover:text-gray-600 transition-all shadow-sm">
                                Next
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection