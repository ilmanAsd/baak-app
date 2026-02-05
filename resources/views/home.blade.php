@extends('layouts.app')

@section('content')
    <!-- Modern Hero Section -->
    <section class="relative min-h-[700px] flex items-center pt-32 pb-20 overflow-hidden bg-[#0a0f1d]">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 z-0">
            @if($hero && $hero->background_image)
                <img src="{{ asset('storage/' . $hero->background_image) }}" class="absolute inset-0 w-full h-full object-cover opacity-20" alt="Background">
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-[#0a0f1d] to-[#0a0f1d]"></div>
            @endif
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-brand-yellow/5 rounded-full -mr-64 -mt-64 blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-indigo-500/10 rounded-full -ml-32 -mb-32 blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Content -->
                <div class="lg:col-span-6 space-y-8">
                    <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md">
                        <span class="flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-brand-yellow opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-yellow"></span>
                        </span>
                        
                    </div>

                    <h1 class="text-5xl md:text-7xl font-black text-white leading-[1.1] tracking-tighter">
                        @if($hero)
                            {!! str_replace(['BAAK', 'Program Studi'], ['<span class="text-brand-yellow italic">BAAK</span>', '<span class="text-indigo-400 italic">Program Studi</span>'], $hero->title) !!}
                        @else
                            Solusi Cepat untuk <span class="text-brand-yellow italic">Administrasi</span> Akademik Anda
                        @endif
                    </h1>

                    <p class="text-gray-400 text-lg md:text-xl max-w-xl leading-relaxed">
                        {{ $hero ? $hero->description : 'Akses layanan administrasi akademik, kemahasiswaan, dan informasi penting lainnya dalam satu platform modern dan efisien.' }}
                    </p>

                    <!-- Modern Search Bar (Housing Style) -->
                    <!-- <div class="bg-white/10 backdrop-blur-2xl p-2 rounded-3xl border border-white/10 shadow-2xl max-w-2xl">
                        <form action="{{ route('information.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-2">
                            <div class="flex-1 flex w-full">
                                <div class="px-6 flex items-center text-gray-400 border-r border-white/10">
                                    <span class="material-symbols-outlined">search</span>
                                </div>
                                <input type="text" name="search" placeholder="Cari layanan, dokumen, atau berita..." 
                                    class="w-full bg-transparent border-none text-white placeholder-gray-500 font-bold text-sm focus:ring-0 py-4">
                            </div>
                            <button type="submit" class="w-full md:w-auto px-10 py-4 bg-brand-yellow text-brand-blue font-black text-xs uppercase tracking-widest rounded-2xl hover:bg-white transition-all transform active:scale-95 shadow-xl shadow-brand-yellow/20">
                                Cari Sekarang
                            </button>
                        </form>
                    </div> -->

                    <!-- Quick Links -->
                    <div class="flex flex-wrap items-center gap-6 pt-4">
                        <a href="{{ route('rekap-prodi.index') }}" class="flex items-center gap-3 text-white/60 hover:text-brand-yellow transition-colors group">
                            <span class="material-symbols-outlined text-xl group-hover:rotate-12 transition-transform">school</span>
                            <span class="text-[11px] font-black uppercase tracking-widest">Rekap Prodi</span>
                        </a>
                        <a href="{{ route('arsip.index') }}" class="flex items-center gap-3 text-white/60 hover:text-brand-yellow transition-colors group">
                            <span class="material-symbols-outlined text-xl group-hover:rotate-12 transition-transform">inventory_2</span>
                            <span class="text-[11px] font-black uppercase tracking-widest">Arsip Dokumen</span>
                        </a>
                    </div>
                </div>

                <!-- Right Content (Dynamic Slider Cards) -->
                <div class="lg:col-span-6 flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-lg aspect-square">
                        <!-- Card 1 (Back Right) -->
                        <div class="absolute top-0 right-0 w-[80%] h-[80%] rounded-[3rem] bg-gradient-to-br from-indigo-600 to-purple-800 shadow-2xl rotate-3 transform z-10 overflow-hidden group">
                           @if($hero && $hero->image_card_background)
                               <img src="{{ asset('storage/' . $hero->image_card_background) }}" class="w-full h-full object-cover" alt="Card Background">
                           @else
                               <img src="https://images.unsplash.com/photo-1523050335191-51de8662cecd?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover" alt="Default Card Background">
                           @endif
                           <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-8">
                               <div class="text-white">
                                   <span class="text-[10px] font-black text-brand-yellow uppercase tracking-widest block mb-2">Layanan Terpadu</span>
                                   
                               </div>
                           </div>
                        </div>
                        
                        <!-- Card 2 (Foreground Left) -->
                        <div class="absolute bottom-0 left-0 w-[60%] h-[60%] rounded-[2.5rem] bg-white backdrop-blur-xl shadow-2xl -rotate-6 transform z-20 border-8 border-[#0a0f1d] overflow-hidden">
                            @if($hero && $hero->image_card_foreground)
                                <img src="{{ asset('storage/' . $hero->image_card_foreground) }}" class="w-full h-full object-cover" alt="Card Foreground">
                            @else
                                <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover" alt="Default Card Foreground">
                            @endif
                        </div>

                        <!-- Floating Badge -->
                        <div class="absolute top-1/2 -left-12 transform -translate-y-1/2 z-30 animate-bounce">
                            <div class="bg-brand-yellow p-4 rounded-3xl shadow-2xl shadow-brand-yellow/40">
                                <span class="material-symbols-outlined text-brand-blue text-4xl">verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Services Section -->
    <!-- Program BAAK Section -->
    <section class="py-20 bg-gray-50/50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-brand-blue mb-3">Berita Terkini</h2>
                    <div class="w-20 h-1.5 bg-brand-yellow rounded-full"></div>
                </div>
                <a href="{{ route('information.index') }}" 
                   class="group inline-flex items-center text-brand-blue font-bold hover:text-blue-800 transition-all duration-300">
                    Lihat Semua
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            @if($latestNews->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($latestNews as $post)
                        <article class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col h-full hover:-translate-y-2">
                            <div class="relative h-48 overflow-hidden">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-brand-blue/5 to-brand-blue/20 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-brand-blue/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="mb-4">
                                    <span class="bg-brand-blue text-brand-yellow text-[10px] font-black px-3 py-1.5 rounded-lg uppercase tracking-wider">
                                        {{ $post->category->name ?? 'Umum' }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-extrabold text-gray-900 mb-4 line-clamp-2 group-hover:text-brand-blue transition-colors duration-300 leading-tight">
                                    <a href="{{ route('information.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <div class="mt-auto pt-4 border-t border-gray-50 flex items-center text-xs font-bold text-gray-400">
                                    <svg class="w-4 h-4 mr-2 text-brand-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-[40px] border-2 border-dashed border-gray-100">
                    <p class="text-gray-400 font-bold">Belum ada berita terbaru.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- Motto Section with Typing Effect -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="container mx-auto px-4 text-center">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-brand-blue min-h-[3rem]">
                    <span id="typing-text"></span><span class="animate-pulse">|</span>
                </h2>
                <div class="w-24 h-1 bg-brand-blue mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- R -->
                <div
                    class="border border-gray-200 p-6 hover:shadow-lg transition-shadow rounded-lg text-center group hover:border-brand-blue">
                    <div
                        class="w-16 h-16 bg-blue-700 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 group-hover:scale-110 transition-transform">
                        R</div>
                    <h3 class="font-bold text-xl mb-3">Responsif</h3>
                    <p class="text-sm text-gray-600">Menumbuhkan perilaku kerja proaktif, kooperatif, dan peka terhadap
                        kebutuhan kerja.</p>
                </div>

                <!-- A -->
                <div
                    class="border border-gray-200 p-6 hover:shadow-lg transition-shadow rounded-lg text-center group hover:border-brand-yellow">
                    <div
                        class="w-16 h-16 bg-yellow-400 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 group-hover:scale-110 transition-transform">
                        A</div>
                    <h3 class="font-bold text-xl mb-3">Adaptif</h3>
                    <p class="text-sm text-gray-600">Mampu merespons perubahan lingkungan dengan cepat dan fleksibel.</p>
                </div>

                <!-- M -->
                <div
                    class="border border-gray-200 p-6 hover:shadow-lg transition-shadow rounded-lg text-center group hover:border-brand-blue">
                    <div
                        class="w-16 h-16 bg-blue-700 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 group-hover:scale-110 transition-transform">
                        M</div>
                    <h3 class="font-bold text-xl mb-3">Melayani</h3>
                    <p class="text-sm text-gray-600">Menciptakan kondisi yang memungkinkan mahasiswa berkembang dan kreatif.
                    </p>
                </div>

                <!-- A -->
                <div
                    class="border border-gray-200 p-6 hover:shadow-lg transition-shadow rounded-lg text-center group hover:border-brand-yellow">
                    <div
                        class="w-16 h-16 bg-yellow-400 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 group-hover:scale-110 transition-transform">
                        A</div>
                    <h3 class="font-bold text-xl mb-3">Akuntabel</h3>
                    <p class="text-sm text-gray-600">Bertanggung jawab atas tindakan kepada atasan dan publik.</p>
                </div>

                <!-- H -->
                <div
                    class="border border-gray-200 p-6 hover:shadow-lg transition-shadow rounded-lg text-center group hover:border-brand-blue">
                    <div
                        class="w-16 h-16 bg-blue-700 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4 group-hover:scale-110 transition-transform">
                        H</div>
                    <h3 class="font-bold text-xl mb-3">Humanistik</h3>
                    <p class="text-sm text-gray-600">Mampu memahami dan menghargai kemanusiaan dalam pelayanan.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-brand-blue mb-8 border-b-4 border-brand-blue inline-block pb-2">
                Program <span style="color: #ffbc25;">BAAK</span>
            </h2>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($baakPrograms as $program)
                    <div class="bg-blue-50 p-6 rounded-lg text-center hover:shadow-lg transition-all group">
                        <div class="mb-4 overflow-hidden rounded-lg relative aspect-[4/3]">
                            @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="absolute inset-0 bg-gray-200 flex items-center justify-center text-gray-400">Image</div>
                            @endif
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-brand-blue">{{ $program->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $program->description }}</p>
                        @if($program->url)
                            <a href="{{ $program->url }}" class="inline-block mt-3 text-sm font-semibold text-brand-blue hover:text-blue-800 hover:underline">Lihat Detail →</a>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Icon Navigation Row (Optional: Keeping static icons for layout balance or making them dynamic if needed) -->
            <!-- For now, I will keep the structure but iterate if we wanted to map icons, but since icons are specific SVGs, 
                 I'll hide this second row or leave it hardcoded if it serves a specific different purpose. 
                 Looking at the user request, they likely want the main content dynamic. 
                 If the user removed the bottom row in their request image, I should remove it. 
                 The request image ONLY showed the top cards row. I will comment out the bottom row to be safe/cleaner. 
            -->
            
            <!-- 
            <div class="mt-8 relative">
               ... (Icon row commented out as it might be redundant with the cards above now that they are dynamic)
            </div> 
            -->

        </div>
    </section>

    <!-- Tugas Administrasi Section -->
    <section class="py-16 relative">
        <div class="absolute inset-0 bg-brand-blue h-1/2"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Akademik -->
                <div
                    class="bg-white p-8 rounded-lg shadow-lg text-center flex flex-col items-center group hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-brand-blue transition-colors">AKADEMIK
                    </h3>
                    <p class="text-gray-600 mb-6 flex-grow">Mempunyai tugas melakukan administrasi pendidikan, jadwal
                        kuliah, KRS, dll.</p>
                    <a href="/portal-akademik"
                        class="bg-brand-blue text-white py-2 px-6 rounded-full hover:bg-blue-900 transition flex items-center gap-2">
                        {{ __('selengkapnya') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Pembelajaran (Highlighted) -->
                <div
                    class="bg-gray-100 p-10 rounded-lg shadow-xl text-center flex flex-col items-center transform md:-translate-y-4 scale-105 border-t-4 border-gray-300 relative z-20">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">PEMBELAJARAN</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Mempunyai tugas melakukan administrasi pembelajaran, perkuliahan
                        dan MBKM.</p>
                    <a href="/pembelajaran"
                        class="bg-brand-blue text-white py-2 px-6 rounded-full hover:bg-blue-900 transition flex items-center gap-2">
                        Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Kemahasiswaan -->
                <div
                    class="bg-white p-8 rounded-lg shadow-lg text-center flex flex-col items-center group hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 group-hover:text-brand-blue transition-colors">
                        KEMAHASISWAAN</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Mempunyai tugas administrasi kemahasiswaan, prestasi, kegiatan
                        mahasiswa.</p>
                    <a href="/kemahasiswaan"
                        class="bg-brand-blue text-white py-2 px-6 rounded-full hover:bg-blue-900 transition flex items-center gap-2">
                        Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-brand-blue mb-12">
                Pimpinan Biro Administrasi <span style="color: #ffbc25;">Akademik dan Kemahasiswaan</span>
                <div class="w-24 h-1 bg-brand-blue mx-auto mt-4"></div>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($leaders as $leader)
                    @if($leader)
                        @php
                            $isKepala = $leader->category === 'kepala_biro';
                        @endphp
                        <div
                            class="rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300 border flex flex-col relative {{ $isKepala ? 'bg-brand-blue border-brand-yellow/50 transform md:-translate-y-2 z-10' : 'bg-white border-gray-100' }}">

                            @if($isKepala)
                                <div
                                    class="absolute top-0 right-0 bg-brand-yellow text-brand-blue text-xs font-bold px-3 py-1 rounded-bl-lg z-20">
                                    PIMPINAN
                                </div>
                            @endif

                            <div class="aspect-[3/4] overflow-hidden relative {{ $isKepala ? 'bg-gray-800' : 'bg-gray-200' }}">
                                @if($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}"
                                        class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($leader->name) }}&background=192E5B&color=fff&size=500"
                                        alt="{{ $leader->name }}" class="w-full h-full object-cover">
                                @endif

                                <!-- Overlay Gradient -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t {{ $isKepala ? 'from-black/90' : 'from-brand-blue/80' }} via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>

                            <div class="p-6 pt-8 relative flex-grow flex flex-col justify-center text-center">
                                <!-- Decorative element -->
                                <div
                                    class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-1 rounded-full {{ $isKepala ? 'bg-white shadow-[0_0_10px_rgba(255,255,255,0.5)]' : 'bg-brand-yellow' }}">
                                </div>

                                <h3
                                    class="text-lg font-bold mb-2 leading-tight transition-colors {{ $isKepala ? 'text-white' : 'text-brand-blue group-hover:text-blue-600' }}">
                                    {{ $leader->name }}
                                </h3>
                                <p
                                    class="text-xs font-semibold uppercase tracking-widest {{ $isKepala ? 'text-brand-yellow' : 'text-gray-500' }}">
                                    {{ $leader->position }}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    
@endsection