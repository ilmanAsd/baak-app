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
                    <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-brand-yellow uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Information Portal
                    </span>
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

            @php
                $columns = $sections['columns'] ?? [];
                $rows = $sections['rows'] ?? [];
                
                // Group filtering data
                $filterableColumns = [];
                foreach($columns as $idx => $col) {
                    if($col['is_filterable']) {
                        $colKey = 'col_' . ($idx + 1);
                        $filterableColumns[$colKey] = collect($rows)->pluck($colKey)->filter()->unique()->sort()->values()->toArray();
                    }
                }
            @endphp

            <div x-data="{ 
                search: '',
                filters: {},
                init() {
                    @foreach(array_keys($filterableColumns) as $key)
                        this.filters.{{ $key }} = '';
                    @endforeach
                },
                matches(item) {
                    const s = this.search.toLowerCase();
                    const searchMatch = !this.search || 
                        Object.values(item).some(val => val && val.toString().toLowerCase().includes(s));
                    
                    let filterMatch = true;
                    for (let key in this.filters) {
                        if (this.filters[key] && item[key] !== this.filters[key]) {
                            filterMatch = false;
                            break;
                        }
                    }
                    
                    return searchMatch && filterMatch;
                }
            }">
                <!-- Redesigned Search & Filter Bar -->
                <div class="bg-white rounded-[2rem] shadow-2xl p-8 mb-16 border border-gray-100 -mt-16 relative z-30 mx-4 md:mx-10">
                    <div class="grid grid-cols-1 md:grid-cols-{{ count($filterableColumns) + 1 }} gap-8">
                        @foreach($columns as $idx => $col)
                            @if($col['is_filterable'])
                            <div class="space-y-3">
                                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">{{ $col['label'] }}</label>
                                <div class="relative group">
                                    <select x-model="filters.col_{{ $idx + 1 }}"
                                        class="w-full pl-5 pr-10 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all appearance-none cursor-pointer">
                                        <option value="">Semua {{ $col['label'] }}</option>
                                        @foreach($filterableColumns['col_' . ($idx + 1)] as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-brand-blue">
                                        <span class="material-symbols-outlined text-xl">expand_more</span>
                                    </span>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        <!-- Search Bar -->
                        <div class="space-y-3 {{ count($filterableColumns) == 0 ? 'md:col-span-full' : '' }}">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Cari Data</label>
                            <div class="relative group">
                                <span class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <span class="material-symbols-outlined text-xl">search</span>
                                </span>
                                <input type="text" x-model="search" placeholder="Masukkan kata kunci..." 
                                    class="w-full pl-12 pr-12 py-4 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                                
                                <button type="button" @click="search = ''; for(let k in filters) filters[k] = ''" x-show="search || Object.values(filters).some(v => v !== '')"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-rose-500 hover:text-rose-700 transition-colors">
                                    <span class="material-symbols-outlined text-xl">close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-brand-blue">
                                    @foreach($columns as $col)
                                        <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em]">{{ $col['label'] }}</th>
                                    @endforeach
                                    <th class="px-6 py-6 text-white font-bold text-[12px] uppercase tracking-[0.2em] text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach($rows as $row)
                                    <tr x-show="matches({
                                            @foreach($columns as $idx => $col)
                                                col_{{ $idx + 1 }}: '{{ addslashes($row['col_' . ($idx + 1)] ?? '') }}',
                                            @endforeach
                                        })" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" 
                                        class="hover:bg-indigo-50/30 transition-all group">
                                        
                                        @foreach($columns as $idx => $col)
                                            <td class="px-6 py-6 font-bold text-gray-800 group-hover:text-brand-blue transition-colors uppercase italic tracking-tight">
                                                {{ $row['col_' . ($idx + 1)] ?? '-' }}
                                            </td>
                                        @endforeach

                                        <td class="px-6 py-6 text-right">
                                            <div class="flex justify-end gap-2">
                                                @if(isset($row['file']) && filled($row['file']))
                                                    <a href="{{ asset('storage/' . $row['file']) }}" target="_blank"
                                                        class="inline-flex items-center gap-2 px-6 py-3 bg-brand-blue text-white rounded-xl hover:bg-blue-900 transition-all font-black text-[10px] shadow-lg shadow-brand-blue/20">
                                                        <span>DOWNLOAD</span>
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                    </a>
                                                @endif
                                                @if(isset($row['link']) && filled($row['link']))
                                                    <a href="{{ $row['link'] }}" target="_blank"
                                                        class="inline-flex items-center gap-2 px-6 py-3 bg-brand-yellow text-brand-blue rounded-xl hover:scale-105 transition-all font-black text-[10px] shadow-lg shadow-brand-yellow/20">
                                                        <span>LINK</span>
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                <!-- Empty State (Calculated on client side) -->
                                <template x-if="countMatched() === 0">
                                    <tr>
                                        <td colspan="{{ count($columns) + 1 }}" class="px-6 py-20 text-center text-gray-400 italic">
                                            Tidak ada data yang sesuai dengan pencarian atau filter Anda.
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end x-data -->
        </div>
    </div>

    <script>
        function countMatched() {
            let count = 0;
            const rows = document.querySelectorAll('tbody tr[x-show]');
            rows.forEach(r => {
                if(r.style.display !== 'none') count++;
            });
            return count;
        }
    </script>
@endsection
