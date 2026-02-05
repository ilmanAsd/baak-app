@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[500px] flex items-center justify-center overflow-hidden">
        <!-- Cinematic Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-brand-blue/80 via-brand-blue/40 to-white z-10"></div>
            @if($portalSetting?->banner_image)
                <div class="w-full h-full bg-cover bg-center opacity-40"
                    style="background-image: url('{{ asset('storage/' . $portalSetting->banner_image) }}');">
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
                    <span class="material-symbols-outlined text-[16px]">school</span>
                    Lingkup Pembelajaran
                </div>

                <!-- Headline -->
                <h1 class="text-4xl md:text-7xl font-black leading-[1.1] tracking-[-0.04em] text-white">
                    {{ $portalSetting->title }}
                </h1>

                <!-- Subheadline -->
                <p class="max-w-2xl text-lg md:text-xl font-medium leading-relaxed text-blue-50/80">
                    {{ $portalSetting->description }}
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 text-white">
            <span class="text-[10px] font-black uppercase tracking-[0.3em]">Explore</span>
            <span class="material-symbols-outlined text-brand-yellow animate-bounce">expand_more</span>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-20 max-w-6xl space-y-24">

        <!-- Section: Bidang Pembelajaran & SPADA -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-brand-yellow/10 text-brand-blue rounded-full border border-brand-yellow/20">
                    <span class="w-2 h-2 bg-brand-yellow rounded-full animate-pulse"></span>
                    <span class="text-xs font-black uppercase tracking-widest italic">Profil Layanan</span>
                </div>
                <h2 class="text-4xl font-black text-brand-blue tracking-tight leading-tight">Bidang Pembelajaran</h2>
                <div class="text-gray-600 leading-relaxed text-lg">
                    <p>Biro Administrasi dan Kemahasiswaan (BAAK) bagian Pembelajaran adalah unit atau bagian yang
                        bertanggung jawab atas kegiatan yang berkaitan dengan proses pembelajaran serta mendukung kebutuhan
                        mahasiswa dalam hal pembelajaran di lingkungan perguruan tinggi.</p>
                    <p class="mt-4">Fungsi dan tugas bagian ini sangat penting untuk memastikan kelancaran proses
                        pendidikan, mulai dari perencanaan hingga evaluasi.</p>
                </div>
                <div class="pt-4">
                    <a href="{{ $portalSetting->spada_url ?? 'https://spada1.unik-kediri.ac.id' }}" target="_blank"
                        class="inline-flex items-center gap-3 px-10 py-4 bg-brand-blue text-white rounded-2xl font-black hover:bg-blue-900 transition-all shadow-xl shadow-brand-blue/20 group">
                        <span>AKSES SPADA UNIK</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="relative group">
                <div
                    class="absolute -inset-4 bg-gradient-to-r from-brand-yellow to-brand-blue opacity-20 blur-2xl group-hover:opacity-30 transition-opacity">
                </div>
                <div
                    class="relative bg-white p-2 rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden aspect-video flex items-center justify-center">
                    @if($portalSetting->video_url)
                        @php
                            $videoUrl = $portalSetting->video_url;
                            $embedUrl = '';
                            if (str_contains($videoUrl, 'youtube.com/watch?v=')) {
                                $videoId = explode('v=', $videoUrl)[1];
                                $videoId = explode('&', $videoId)[0];
                                $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                            } elseif (str_contains($videoUrl, 'youtu.be/')) {
                                $videoId = explode('youtu.be/', $videoUrl)[1];
                                $videoId = explode('?', $videoId)[0];
                                $embedUrl = "https://www.youtube.com/embed/{$videoId}";
                            }
                        @endphp

                        @if($embedUrl)
                            <iframe class="w-full h-full rounded-2xl" src="{{ $embedUrl }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        @else
                            <a href="{{ $videoUrl }}" target="_blank"
                                class="text-center p-12 w-full h-full flex flex-col items-center justify-center hover:bg-gray-50 transition-colors">
                                <div
                                    class="w-20 h-20 bg-brand-blue/5 rounded-full flex items-center justify-center mb-6 text-brand-blue">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 italic uppercase tracking-tighter">Lihat Video Layanan
                                </h4>
                                <p class="text-gray-400 text-sm mt-2">Klik untuk memutar video di tab baru.</p>
                            </a>
                        @endif
                    @else
                        <div class="text-center p-12">
                            <div
                                class="w-20 h-20 bg-brand-blue/5 rounded-full flex items-center justify-center mx-auto mb-6 text-brand-blue">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 italic uppercase tracking-tighter">Video Pembelajaran &
                                SPADA</h4>
                            <p class="text-gray-400 text-sm mt-2">Tutorial akses dan penggunaan sistem pembelajaran daring.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Section: KKO & Riset Inovasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- KKO Card -->
            <div
                class="bg-gradient-to-br from-white to-gray-50 p-10 rounded-[2.5rem] border border-gray-100 shadow-xl relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-brand-yellow opacity-5 rounded-bl-[5rem] group-hover:scale-150 transition-transform duration-700">
                </div>
                <div class="relative z-10">
                    <span
                        class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-yellow bg-brand-blue px-3 py-1 rounded-full mb-6 inline-block">Instructional
                        Design</span>
                    <h3 class="text-2xl font-black text-brand-blue mb-4">KATA KERJA OPERASIONAL (KKO)</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-8">
                        KATA KERJA OPERASIONAL (KKO) EDISI REVISI TEORI BLOOM digunakan untuk merinci atau menjelaskan
                        tingkat pemahaman dan penerapan konsep dalam konteks pembelajaran untuk merancang tujuan yang
                        spesifik dan terukur.
                    </p>
                    <a href="https://baak.unik-kediri.ac.id/kko" target="_blank"
                        class="inline-flex items-center gap-2 text-brand-blue font-black text-xs uppercase tracking-widest hover:gap-4 transition-all">
                        <span>Lihat Daftar KKO</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Riset Card -->
            <div class="bg-brand-blue p-10 rounded-[2.5rem] shadow-2xl relative overflow-hidden group">
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 text-white">
                    <span
                        class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-yellow border border-brand-yellow/30 px-3 py-1 rounded-full mb-6 inline-block">Tridharma
                        & Innovation</span>
                    <h3 class="text-2xl font-black mb-4">Pembelajaran dalam Riset & Inovasi</h3>
                    <p class="text-blue-100/70 text-sm leading-relaxed mb-6">
                        Penyelenggaraan kegiatan riset dan inovasi adalah wujud sumbangsih Universitas Kadiri dalam
                        pemikiran dan kerja nyata mengatasi permasalahan global (Sustainable Development Goals).
                    </p>
                    <div class="flex items-center gap-4 text-brand-yellow">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.989-2.386l-.548-.547z">
                            </path>
                        </svg>
                        <span class="text-xs font-black uppercase tracking-widest italic">SDGs Commitment</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Program & Kurikulum -->
        <section class="space-y-12">
            <div class="text-center space-y-4">
                <h2 class="text-4xl font-black text-brand-blue tracking-tight">Program & Kurikulum</h2>
                <div class="w-20 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Kurikulum Card -->
                <a href="{{ route('pembelajaran.curriculum') }}"
                    class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all relative overflow-hidden">
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-brand-blue/5 rounded-full blur-2xl group-hover:bg-brand-blue/10 transition-colors">
                    </div>
                    <div class="flex items-start gap-6">
                        <div
                            class="w-16 h-16 bg-brand-blue/5 text-brand-blue rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-brand-blue group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-brand-blue mb-2">Kurikulum Fakultas</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-4">Informasi lengkap mengenai kurikulum resmi
                                di seluruh Fakultas dan Program Studi Universitas Kadiri.</p>
                            <span
                                class="text-xs font-black text-brand-blue uppercase tracking-widest border-b-2 border-brand-yellow group-hover:gap-3 transition-all flex items-center gap-2 w-fit">
                                LIHAT KURIKULUM
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- MBKM Card -->
                <a href="{{ route('pembelajaran.mbkm') }}"
                    class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all relative overflow-hidden">
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-brand-yellow/5 rounded-full blur-2xl group-hover:bg-brand-yellow/10 transition-colors">
                    </div>
                    <div class="flex items-start gap-6">
                        <div
                            class="w-16 h-16 bg-brand-yellow/10 text-brand-blue rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-brand-yellow group-hover:text-brand-blue transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-brand-blue mb-2">Program MBKM</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-4">Temukan berbagai program Merdeka Belajar
                                Kampus Merdeka, Magang, dan Partnership Dunia Industri.</p>
                            <span
                                class="text-xs font-black text-brand-blue uppercase tracking-widest border-b-2 border-brand-yellow group-hover:gap-3 transition-all flex items-center gap-2 w-fit">
                                PELAJARI MBKM
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- MKWU Card -->
                <a href="{{ route('pembelajaran.mkwu') }}"
                    class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all relative overflow-hidden">
                    <div
                        class="absolute -right-8 -top-8 w-32 h-32 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition-colors">
                    </div>
                    <div class="flex items-start gap-6">
                        <div
                            class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-brand-blue mb-2">Kurikulum MKWU</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-4">Daftar mata kuliah wajib universitas
                                beserta akses silabus dan materi pembelajaran pusat.</p>
                            <span
                                class="text-xs font-black text-brand-blue uppercase tracking-widest border-b-2 border-brand-yellow group-hover:gap-3 transition-all flex items-center gap-2 w-fit">
                                AKSES MKWU
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Dokumen Pembelajaran Card -->

            </div>
        </section>

        <!-- Section: Fasilitas Zoom & SPADA Room -->
        <section class="space-y-12">
            <div class="text-center space-y-4">
                <h2 class="text-4xl font-black text-brand-blue tracking-tight">Fasilitas & Layanan</h2>
                <div class="w-20 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Zoom Facility -->
                <div
                    class="lg:col-span-1 bg-white p-8 rounded-3xl border border-gray-100 shadow-xl flex flex-col justify-between group">
                    <div>
                        <div
                            class="w-14 h-14 bg-blue-50 text-brand-blue rounded-2xl flex items-center justify-center mb-6 group-hover:bg-brand-blue group-hover:text-white transition-all duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-brand-blue mb-4">Fasilitas Zoom</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 italic">
                            ZOOM berlisensi Pro (maksimal 100 peserta) khusus untuk perkuliahan dan Rapat Civitas Akademika.
                        </p>
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-6">
                            <span class="text-rose-700 text-[10px] font-black uppercase tracking-widest block mb-1">PENTING
                                (NOTE):</span>
                            <p class="text-rose-900 text-xs font-medium italic leading-relaxed">Pengajuan jadwal zoom Wajib
                                minimal H-1 Hari Kerja.</p>
                        </div>
                    </div>
                    <a href="https://docs.google.com/spreadsheets/d/1QdeIo0Y7qOtfGIiv4GQSB4JjyGIMR32wi1Xb9EdpEPw/edit?resourcekey#gid=368710055"
                        target="_blank"
                        class="w-full py-4 bg-brand-blue text-white rounded-xl text-center font-black text-xs uppercase tracking-[0.2em] hover:bg-blue-900 transition-all shadow-lg shadow-brand-blue/20">
                        Cek Jadwal Zoom
                    </a>
                </div>

                <!-- SPADA Layout -->
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card 1 -->
                    <div
                        class="bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-brand-blue/5 rounded-full blur-2xl group-hover:bg-brand-blue/10 transition-colors">
                        </div>
                        <div
                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-brand-blue shadow-sm mb-6 group-hover:bg-brand-blue group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black text-brand-blue mb-2 italic tracking-tight">Pengajuan Ruang SPADA</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Layanan pengajuan ruang SPADA sebagai sarana
                            perkuliahan atau kegiatan akademik resmi.</p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-500/5 rounded-full blur-2xl group-hover:bg-emerald-500/10 transition-colors">
                        </div>
                        <div
                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-emerald-500 shadow-sm mb-6 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black text-emerald-600 mb-2 italic tracking-tight">SOP Sarana Pembelajaran
                        </h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Panduan resmi mengenai aturan dan alur layanan
                            peminjaman fasilitas pembelajaran.</p>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition-colors">
                        </div>
                        <div
                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-amber-500 shadow-sm mb-6 group-hover:bg-amber-500 group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black text-amber-600 mb-2 italic tracking-tight">Jadwal Ruang SPADA</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Sistem informasi untuk memantau ketersediaan ruang
                            secara real-time setiap harinya.</p>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-gray-50 p-8 rounded-[2rem] border border-gray-100 hover:bg-white hover:shadow-2xl transition-all group relative overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-500/5 rounded-full blur-2xl group-hover:bg-indigo-500/10 transition-colors">
                        </div>
                        <div
                            class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-indigo-500 shadow-sm mb-6 group-hover:bg-indigo-500 group-hover:text-white transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 21h6l-.75-4M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black text-indigo-600 mb-2 italic tracking-tight">Fasilitas Pembelajaran
                        </h4>
                        <p class="text-gray-500 text-xs leading-relaxed">Daftar inventaris sarana pendukung akademik untuk
                            menunjang kualitas pengajaran.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection