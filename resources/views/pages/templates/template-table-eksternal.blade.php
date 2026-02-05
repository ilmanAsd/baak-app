@extends('layouts.app')

@section('content')
    @php
        $spreadsheetUrl = $sections['spreadsheet_url'] ?? '';
        $filterIndex = (int)($sections['filter_column_index'] ?? 0);
        $headers = [];
        $data = [];
        $filterOptions = [];
        $filterLabel = '';

        if (filled($spreadsheetUrl)) {
            if (preg_match('/spreadsheets\/d\/([a-zA-Z0-9-_]+)/', $spreadsheetUrl, $matches)) {
                $id = $matches[1];
                $csvUrl = "https://docs.google.com/spreadsheets/d/{$id}/export?format=csv";

                try {
                    $context = stream_context_create([
                        "ssl" => [
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                        ],
                    ]);

                    $csvContent = @file_get_contents($csvUrl, false, $context);
                    if ($csvContent !== false) {
                        $lines = explode("\n", $csvContent);
                        $csvData = array_map('str_getcsv', $lines);
                        
                        if (!empty($csvData)) {
                            $headers = array_shift($csvData);
                            
                            // Adjust filter index (1-based from admin to 0-based for array)
                            $idx = $filterIndex - 1;
                            if (isset($headers[$idx])) {
                                $filterLabel = $headers[$idx];
                                
                                foreach ($csvData as $row) {
                                    if (count($row) < count($headers)) continue;
                                    
                                    $val = trim($row[$idx]);
                                    if ($val && !in_array($val, $filterOptions)) {
                                        $filterOptions[] = $val;
                                    }
                                    $data[] = $row;
                                }
                                sort($filterOptions);
                            } else {
                                $data = array_filter($csvData, fn($r) => count($r) >= count($headers));
                            }
                        }
                    }
                } catch (\Exception $e) {
                    // Silently fail or handle error
                }
            }
        }
    @endphp

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
                            <span class="ml-1 font-medium text-gray-800">{{ $page->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-brand-yellow/20 rounded-full blur-2xl"></div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <div class="inline-flex items-center gap-3 px-6 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                        <span class="w-2 h-2 bg-brand-yellow rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-brand-yellow uppercase tracking-[0.3em]">Live Data System</span>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 uppercase italic tracking-tight">
                        @php
                            $titleParts = explode(' ', $sections['top_title'] ?? $page->title);
                            $lastWord = array_pop($titleParts);
                            $firstPart = implode(' ', $titleParts);
                        @endphp
                        {{ $firstPart }} <span class="text-brand-yellow">{{ $lastWord }}</span>
                    </h1>
                    @if(filled($sections['top_description'] ?? ''))
                    <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90 font-medium">
                        {{ $sections['top_description'] }}
                    </p>
                    @endif
                </div>
            </div>

            <main x-data="{ 
                search: '', 
                selectedFilter: '',
                filterIdx: {{ $filterIndex - 1 }},
                data: @js($data),
                matches(row) {
                    const s = this.search.toLowerCase();
                    const searchMatch = !this.search || row.some(cell => String(cell).toLowerCase().includes(s));
                    const filterMatch = !this.selectedFilter || (this.filterIdx !== -1 && String(row[this.filterIdx]).trim() === this.selectedFilter);
                    return searchMatch && filterMatch;
                },
                get hasResults() {
                    return this.data.some(row => this.matches(row));
                }
            }">
                <!-- Floating Filter Bar -->
                <div class="bg-white rounded-[2.5rem] shadow-2xl p-8 mb-16 border border-gray-100 -mt-16 relative z-30 mx-4 md:mx-10">
                    <div class="grid grid-cols-1 {{ !empty($filterOptions) ? 'md:grid-cols-12' : '' }} gap-6 items-end">
                        
                        @if(!empty($filterOptions))
                        <!-- Custom Filter -->
                        <div class="md:col-span-4 space-y-3">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Filter {{ $filterLabel }}</label>
                            <div class="relative group">
                                <select x-model="selectedFilter"
                                    class="w-full pl-5 pr-10 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer">
                                    <option value="">Semua {{ $filterLabel }}</option>
                                    @foreach($filterOptions as $opt)
                                        <option value="{{ $opt }}">{{ $opt }}</option>
                                    @endforeach
                                </select>
                                <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-brand-blue">
                                    <span class="material-symbols-outlined text-xl">expand_more</span>
                                </span>
                            </div>
                        </div>
                        @endif

                        <!-- Search Bar -->
                        <div class="{{ !empty($filterOptions) ? 'md:col-span-6' : '' }} space-y-3">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Cari Data</label>
                            <div class="relative group">
                                <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400">
                                    <span class="material-symbols-outlined text-xl">search</span>
                                </span>
                                <input type="text" x-model="search" placeholder="Masukkan kata kunci..."
                                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                            </div>
                        </div>

                        @if(!empty($filterOptions))
                        <div class="md:col-span-2">
                            <button @click="search = ''; selectedFilter = ''" x-show="search || selectedFilter"
                                class="w-full py-4 bg-rose-50 text-rose-500 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-rose-100 transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-sm">refresh</span>
                                RESET
                            </button>
                        </div>
                        @endif
                    </div>
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
                                @forelse($data as $row)
                                    <tr x-show="matches(@js($row))" x-transition.opacity class="border-b border-[#003366]/20 hover:bg-indigo-50/30 transition-all group">
                                        @foreach($row as $idx => $cell)
                                            <td class="px-6 py-6 {{ strtolower($headers[$idx] ?? '') === 'no' ? 'text-center' : '' }}">
                                                @if(str_starts_with($cell, 'http://') || str_starts_with($cell, 'https://'))
                                                    <a href="{{ $cell }}" target="_blank"
                                                        class="inline-flex items-center gap-2 px-4 py-2 bg-brand-blue text-brand-yellow rounded-xl hover:bg-black transition-all font-black text-[10px] shadow-lg shadow-brand-blue/10 uppercase tracking-widest">
                                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                                        Lihat
                                                    </a>
                                                @else
                                                    <span class="text-sm font-bold text-gray-800 group-hover:text-brand-blue transition-colors leading-relaxed break-words block min-w-[100px]">
                                                        {{ $cell }}
                                                    </span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ count($headers) ?: 1 }}" class="px-6 py-20 text-center">
                                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                                <span class="material-symbols-outlined text-gray-300 text-4xl">inventory_2</span>
                                            </div>
                                            <h3 class="text-lg font-black text-gray-400 uppercase italic">Data belum tersedia</h3>
                                            <p class="text-gray-400 text-xs font-medium mt-1">Silakan cek kembali URL spreadsheet di admin.</p>
                                        </td>
                                    </tr>
                                @endforelse
                                
                                <tr x-show="!hasResults" x-cloak>
                                    <td colspan="{{ count($headers) ?: 1 }}" class="px-6 py-20 text-center">
                                        <h3 class="text-lg font-black text-gray-400 uppercase italic">Tidak Ada Hasil</h3>
                                        <p class="text-gray-400 text-xs font-medium mt-1">Tidak ada data yang cocok dengan pencarian Anda.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
@endsection
