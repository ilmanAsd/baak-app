@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-brand-blue py-16 md:py-24 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <!-- Left: Text -->
                <div class="w-full lg:w-1/2 text-left space-y-6 md:space-y-8" data-aos="fade-right">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-brand-yellow/10 text-brand-yellow rounded-full border border-brand-yellow/20">
                        <span class="w-2 h-2 bg-brand-yellow rounded-full animate-pulse"></span>
                        <span class="text-[10px] md:text-xs font-black uppercase tracking-widest italic">Rewards & Prestasi</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-7xl font-black leading-tight tracking-tight">
                        {{ $setting->hero_title }}
                    </h1>
                    <p class="text-lg md:text-xl opacity-80 leading-relaxed max-w-xl">
                        {{ $setting->hero_description }}
                    </p>
                </div>

                <!-- Right: Image -->
                <div class="w-full lg:w-1/2 relative" data-aos="fade-left">
                    <div class="absolute -inset-4 bg-brand-yellow/20 blur-3xl rounded-full"></div>
                    @if($setting->hero_image)
                        <img src="{{ asset('storage/' . $setting->hero_image) }}" alt="Prestasi Hero"
                            class="relative z-10 rounded-3xl md:rounded-[3rem] shadow-2xl border-4 border-white/10 object-cover w-full aspect-[4/3]">
                    @else
                        <div class="relative z-10 w-full aspect-[4/3] bg-white/5 rounded-3xl md:rounded-[3.5rem] border-2 border-dashed border-white/20 flex items-center justify-center">
                            <svg class="w-16 md:w-24 h-16 md:h-24 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 5H18V3H6V5H5C3.89 5 3 5.89 3 7V11C3 13.21 4.79 15 7 15H8.09C8.97 17.39 10.96 19 13.5 19V21H18V19.34C20.26 18.24 22 15.96 22 13V7C22 5.89 21.11 5 20 5H19ZM17 11V7H7V11C7 12.93 8.57 14.5 10.5 14.5C12.43 14.5 14 12.93 14 11H17Z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-16 md:py-24 space-y-24 md:space-y-32 max-w-7xl">
        <!-- Section: Layanan Kemahasiswaan -->
        <section class="space-y-12 md:space-y-16">
            <div class="text-center space-y-4" data-aos="zoom-in">
                <h2 class="text-3xl md:text-5xl font-black text-brand-blue tracking-tight">Layanan Kemahasiswaan UNIK</h2>
                <div class="w-16 md:w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($layanan as $item)
                    <div class="group relative bg-white p-8 md:p-10 rounded-3xl md:rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="w-16 h-16 bg-brand-blue/5 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-brand-blue group-hover:text-white transition-colors">
                            @if($item->icon)
                                <x-dynamic-component :component="$item->icon" class="w-8 h-8" />
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold text-brand-blue mb-4 leading-tight">{{ $item->title }}</h3>
                        <p class="text-gray-500 leading-relaxed mb-8">{{ $item->description }}</p>
                        <a href="{{ $item->link ?? '#' }}" class="inline-flex items-center text-brand-blue font-black uppercase text-xs tracking-widest gap-2 group-hover:gap-4 transition-all">
                            Pelajari Lebih Lanjut
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Section: Program Penghargaan -->
        <section class="space-y-12 md:space-y-16">
            <div class="text-center space-y-4" data-aos="zoom-in">
                <h2 class="text-3xl md:text-5xl font-black text-brand-blue tracking-tight">Program Penghargaan Mahasiswa</h2>
                <div class="w-16 md:w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
            </div>

            <div class="space-y-8 md:space-y-12">
                @foreach($penghargaan as $item)
                    <div class="bg-gray-50 rounded-3xl md:rounded-[3.5rem] overflow-hidden border border-gray-200" data-aos="{{ $loop->even ? 'fade-left' : 'fade-right' }}">
                        <div class="flex flex-col lg:flex-row items-stretch">
                            <!-- Left: Content -->
                            <div class="flex-1 p-8 md:p-12 lg:p-20 space-y-6 md:space-y-8">
                                <div class="space-y-3 md:space-y-4">
                                    <span class="text-[10px] md:text-xs font-black uppercase tracking-[0.3em] text-emerald-600">{{ $item->subtitle }}</span>
                                    <h3 class="text-2xl md:text-4xl lg:text-5xl font-black text-brand-blue leading-tight">{{ $item->title }}</h3>
                                    <p class="text-lg md:text-xl text-gray-500 leading-relaxed">{{ $item->description }}</p>
                                </div>

                                @if($item->benefits)
                                    <div class="space-y-6">
                                        <h4 class="text-lg font-bold text-brand-blue italic uppercase tracking-wider">Manfaat yang Diperoleh:</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($item->benefits as $benefit)
                                                <div class="flex items-center gap-4 bg-white p-4 rounded-2xl border border-gray-100 shadow-sm">
                                                    <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-bold text-gray-700">{{ $benefit['benefit'] }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <a href="{{ $item->link ?? '#' }}" class="inline-flex h-14 px-10 items-center justify-center bg-brand-blue text-white rounded-full font-black uppercase text-sm tracking-widest hover:bg-brand-yellow hover:text-brand-blue transition-all">
                                    Daftar Sekarang
                                </a>
                            </div>

                            <!-- Right: Image -->
                            <div class="w-full lg:w-[450px] relative min-h-[250px] md:min-h-[300px] aspect-video lg:aspect-auto">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $item->title }}">
                                @else
                                    <div class="absolute inset-0 bg-brand-blue/10 flex items-center justify-center">
                                        <svg class="w-16 md:w-20 h-16 md:h-20 text-brand-blue/20" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-gray-50 via-transparent to-transparent lg:block w-full md:w-32 h-32 md:h-full"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Section: Pencapaian Terbaik (Tabs) -->
        <section class="space-y-12 md:space-y-16" x-data="{ activeTab: '{{ $tabs->first() }}' }">
            <div class="text-center space-y-4" data-aos="zoom-in">
                <h2 class="text-3xl md:text-5xl font-black text-brand-blue tracking-tight">Milestone Pencapaian Terbaik</h2>
                <div class="w-16 md:w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
            </div>

            <!-- Horizontal Tabs -->
            <div class="flex flex-wrap justify-center gap-2 md:gap-4 border-b border-gray-100 pb-8" data-aos="fade-up">
                @foreach($tabs as $tab)
                    <button @click="activeTab = '{{ $tab }}'"
                        :class="activeTab === '{{ $tab }}' ? 'bg-brand-blue text-white shadow-xl scale-105' : 'bg-gray-50 text-gray-500 hover:bg-gray-100'"
                        class="px-5 md:px-8 py-3 md:py-4 rounded-full font-black uppercase text-[10px] md:text-xs tracking-widest transition-all duration-300">
                        {{ $tab }}
                    </button>
                @endforeach
            </div>

            <!-- Tab Content -->
            <div class="mt-8 md:mt-12">
                @foreach($pencapaianGrouped as $tabName => $items)
                    <div x-show="activeTab === '{{ $tabName }}'" x-cloak
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        @foreach($items as $item)
                            <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-lg hover:shadow-2xl transition-all group">
                                <div class="aspect-video relative overflow-hidden">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $item->title }}">
                                    @else
                                        <div class="w-full h-full bg-brand-blue/5 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-brand-blue/10" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 5H18V3H6V5H5C3.89 5 3 5.89 3 7V11C3 13.21 4.79 15 7 15H8.09C8.97 17.39 10.96 19 13.5 19V21H18V19.34C20.26 18.24 22 15.96 22 13V7C22 5.89 21.11 5 20 5H19ZM17 11V7H7V11C7 12.93 8.57 14.5 10.5 14.5C12.43 14.5 14 12.93 14 11H17Z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-brand-blue/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                                        <span class="text-white font-bold text-sm">{{ $item->subtitle }}</span>
                                    </div>
                                </div>
                                <div class="p-8 space-y-4">
                                    <h3 class="text-xl font-bold text-brand-blue leading-tight">{{ $item->title }}</h3>
                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">{{ $item->description }}</p>
                                    @if($item->link)
                                        <a href="{{ $item->link }}" class="inline-flex items-center text-brand-blue text-[10px] font-black uppercase tracking-[0.2em] gap-2 hover:gap-4 transition-all">
                                            Selengkapnya
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-brand-yellow p-8 md:p-12 lg:p-20 rounded-3xl md:rounded-[4rem] text-brand-blue overflow-hidden relative" data-aos="zoom-in">
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/20 rounded-full blur-3xl"></div>
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8 md:gap-12 text-center lg:text-left">
                <div class="space-y-4 md:space-y-6">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black tracking-tight leading-tight">Siap Mengembangkan Potensi<br class="hidden md:block">dan Meraih Prestasi?</h2>
                    <p class="text-base md:text-lg font-bold opacity-80 italic">Bergabunglah bersama komunitas mahasiswa berprestasi UNIK.</p>
                </div>
                <a href="#" class="h-14 md:h-16 px-10 md:px-12 inline-flex items-center justify-center bg-brand-blue text-white rounded-full font-black uppercase tracking-[0.2em] transform hover:scale-105 transition-all shadow-2xl w-full md:w-auto">
                    Hubungi Kami
                </a>
            </div>
        </section>
    </div>
@endsection
