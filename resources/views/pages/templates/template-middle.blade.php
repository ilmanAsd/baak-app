@extends('layouts.app')

@section('content')
    <!-- Hero Section (Top Section) -->
    <section class="relative py-24 overflow-hidden bg-brand-blue">
        <!-- Background Pattern & Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-brand-blue to-purple-900"></div>
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <!-- Animated Shapes -->
        <div
            class="absolute -top-24 -right-24 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-24 -left-24 w-96 h-96 bg-brand-yellow rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000">
        </div>

        <div class="container relative z-10 mx-auto px-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-brand-yellow/10 text-brand-yellow text-sm font-semibold mb-6 border border-brand-yellow/20 backdrop-blur-sm">
                {{ $page->title }}
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                {{ $sections['top_title'] ?? $page->title }}
            </h1>

            @if(filled($sections['top_description'] ?? ''))
                <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                    {{ $sections['top_description'] }}
                </p>
            @endif
        </div>
    </section>

    <!-- Main Content Container -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- Content 1 Section -->
            @if(filled($sections['content_1_title'] ?? '') || filled($sections['content_1_description'] ?? ''))
                <div class="p-8 md:p-16 text-center border-b border-gray-100">
                    @if(filled($sections['content_1_title'] ?? ''))
                        <h2 class="text-3xl font-bold text-brand-blue mb-4">{{ $sections['content_1_title'] }}</h2>
                    @endif
                    @if(filled($sections['content_1_description'] ?? ''))
                        <div class="text-gray-600 max-w-3xl mx-auto prose prose-lg">
                            {!! $sections['content_1_description'] !!}
                        </div>
                    @endif
                </div>
            @endif

            <!-- Info Cards Grid -->
            @if(isset($sections['info_cards_middle']) && count($sections['info_cards_middle']) > 0)
                <div class="p-8 md:p-16 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($sections['info_cards_middle'] as $card)
                            <div
                                class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                                <div
                                    class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-brand-blue mb-6 group-hover:scale-110 transition-transform">
                                    <!-- Generic Icon if not specified, or dynamic if we added icon field (schema simplified based on request) -->
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $card['title'] }}</h3>
                                <p class="text-gray-500 text-sm">{{ $card['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Tabs Section -->
            @if(isset($sections['tabs']) && count($sections['tabs']) > 0)
                <div x-data="{ activeTab: 0 }" class="p-8 md:p-16 border-b border-gray-100">
                    <!-- Tab Headers -->
                    <div class="flex flex-wrap gap-4 mb-10 justify-center">
                        @foreach($sections['tabs'] as $index => $tab)
                            <button @click="activeTab = {{ $index }}"
                                :class="{ 'bg-brand-blue text-white shadow-lg transform scale-105': activeTab === {{ $index }}, 'bg-white text-gray-600 hover:bg-gray-50': activeTab !== {{ $index }} }"
                                class="px-6 py-3 rounded-full font-bold transition-all duration-300 border border-gray-200">
                                {{ $tab['tab_label'] }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Tab Contents -->
                    <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 min-h-[300px]">
                        @foreach($sections['tabs'] as $index => $tab)
                            <div x-show="activeTab === {{ $index }}" x-transition.opacity.duration.500ms style="display: none;">
                                @if(filled($tab['tab_title'] ?? ''))
                                    <h3 class="text-2xl font-bold text-brand-blue mb-4">{{ $tab['tab_title'] }}</h3>
                                @endif
                                <div class="text-gray-600 prose prose-slate max-w-none">
                                    {!! $tab['tab_content'] ?? '' !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Accordion Section -->
            @if(isset($sections['accordions']) && count($sections['accordions']) > 0)
                <div class="p-8 md:p-16 bg-gray-50 border-t border-gray-100" x-data="{ expanded: null }">
                    <h2 class="text-2xl font-bold text-brand-blue mb-8 text-center">Informasi Tambahan (FAQ)</h2>

                    <div class="space-y-4 max-w-3xl mx-auto">
                        @foreach($sections['accordions'] as $index => $accordion)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                                <button @click="expanded = expanded === {{ $index }} ? null : {{ $index }}"
                                    class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                                    {{ $accordion['title'] }}
                                    <svg class="w-5 h-5 transition-transform" :class="expanded === {{ $index }} ? 'rotate-180' : ''"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                        </path>
                                    </svg>
                                </button>
                                <div x-show="expanded === {{ $index }}"
                                    class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50 prose prose-sm max-w-none">
                                    {!! $accordion['content'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Animation Styles (Reused) -->
    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
@endsection