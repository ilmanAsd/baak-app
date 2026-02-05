@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[500px] flex items-center justify-center overflow-hidden">
        <!-- Cinematic Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-brand-blue/80 via-brand-blue/40 to-white z-10"></div>
            @if(isset($sections['banner_image']))
                <div class="w-full h-full bg-cover bg-center opacity-40"
                    style="background-image: url('{{ asset('storage/' . $sections['banner_image']) }}');">
                </div>
            @else
                <div class="w-full h-full bg-brand-blue opacity-40"></div>
            @endif
        </div>

        <!-- Content Container -->
        <div class="relative z-20 w-full max-w-5xl px-6 py-20 text-center">
            <div class="flex flex-col items-center gap-8">
                <!-- Top Badge -->
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-brand-yellow/30 bg-brand-yellow/10 px-5 py-2 text-xs font-black uppercase tracking-[0.2em] text-brand-yellow backdrop-blur-sm">
                    <span class="material-symbols-outlined text-[16px]">auto_awesome</span>
                    {{ $page->title }}
                </div>

                <!-- Headline -->
                <h1 class="text-4xl md:text-7xl font-black leading-[1.1] tracking-[-0.04em] text-white">
                    {{ $sections['hero_title'] ?? $page->title }}
                </h1>

                <!-- Subheadline -->
                @if(isset($sections['hero_description']))
                    <p class="max-w-2xl text-lg md:text-xl font-medium leading-relaxed text-blue-50/80">
                        {{ $sections['hero_description'] }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 text-white">
            <span class="text-[10px] font-black uppercase tracking-[0.3em]">Explore</span>
            <span class="material-symbols-outlined text-brand-yellow animate-bounce">expand_more</span>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12 max-w-6xl space-y-20">

        <!-- Info Cards Section -->
        @if(isset($sections['info_cards']) && is_array($sections['info_cards']) && count($sections['info_cards']) > 0)
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                @foreach($sections['info_cards'] as $card)
                    @php
                        $colors = [
                            'blue' => 'bg-sky-50 text-sky-600 group-hover:bg-sky-600 group-hover:text-white',
                            'indigo' => 'bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white',
                            'teal' => 'bg-teal-50 text-teal-600 group-hover:bg-teal-600 group-hover:text-white',
                            'orange' => 'bg-orange-50 text-orange-600 group-hover:bg-orange-600 group-hover:text-white',
                        ];
                        $colorClass = $colors[$card['color'] ?? 'blue'] ?? $colors['blue'];
                    @endphp
                    <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">
                        <div class="flex items-start gap-6 mb-6">
                            <!-- Icon -->
                            <div class="flex-shrink-0 w-16 h-16 rounded-2xl flex items-center justify-center transition-colors duration-300 {{ $colorClass }} shadow-inner">
                                @if(isset($card['icon']) && filled($card['icon']))
                                    <x-icon :name="$card['icon']" class="w-8 h-8" />
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                @endif
                            </div>

                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-brand-blue transition-colors">{{ $card['title'] }}</h3>
                                <p class="text-gray-500 leading-relaxed line-clamp-3">
                                    {{ $card['description'] }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-auto pt-4 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-400 group-hover:text-gray-600 transition-colors">
                                {{ $card['count_info'] ?? '' }}
                            </span>
                            @if(isset($card['link_url']) && filled($card['link_url']))
                            <a href="{{ $card['link_url'] }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand-blue text-white font-bold rounded-xl hover:bg-blue-900 transition-all shadow-md hover:shadow-lg active:scale-95">
                                <span>{{ $card['link_text'] ?? 'Lihat Dokumen' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Accordion Section -->
        @if(isset($sections['accordion_items']) && is_array($sections['accordion_items']) && count($sections['accordion_items']) > 0)
            <section x-data="{ activeIndex: null }">
                <div class="space-y-4">
                    @foreach($sections['accordion_items'] as $index => $item)
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button @click="activeIndex === {{ $index }} ? activeIndex = null : activeIndex = {{ $index }}"
                                class="w-full flex justify-between items-center bg-gray-50 p-4 text-left hover:bg-gray-100 transition duration-150 ease-in-out focus:outline-none">
                                <span class="font-bold text-lg text-gray-800">{{ $item['title'] }}</span>
                                <svg class="w-5 h-5 transform transition-transform duration-200"
                                    :class="{'rotate-180': activeIndex === {{ $index }}}" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="activeIndex === {{ $index }}" x-collapse class="bg-white p-6 border-t border-gray-200">
                                <div class="prose prose-sm max-w-none">
                                    {!! $item['content'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Main Content -->
        @if(filled($sections['content'] ?? ''))
            <div class="prose prose-lg prose-slate max-w-none">
                {!! $sections['content'] !!}
            </div>
        @endif
    </div>
@endsection