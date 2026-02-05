@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen font-sans">
        <!-- Immersive Hero Section -->
        <div class="relative min-h-[85vh] flex items-center bg-brand-blue overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="https://baak.unik-kediri.ac.id/assets/img/slider/slider-1.jpg"
                    class="w-full h-full object-cover opacity-30 scale-105 animate-[pulse_20s_infinite_ease-in-out]"
                    alt="Global Campus">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-blue via-brand-blue/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
            </div>

            <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10 pt-20">
                <div class="max-w-3xl animate-[fadeInUp_1s_ease-out]">
                    <span
                        class="inline-block py-1 px-3 rounded-full bg-brand-yellow/20 text-brand-yellow border border-brand-yellow/30 text-xs font-bold tracking-widest uppercase mb-6 backdrop-blur-sm">
                        Universitas Kadiri Global
                    </span>
                    <h1 class="text-5xl sm:text-6xl md:text-7xl font-black text-white leading-tight mb-6">
                        Mulai Perjalanan <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Internasional</span>
                        Anda
                    </h1>
                    <p
                        class="text-lg sm:text-xl text-gray-200 mb-10 leading-relaxed font-light max-w-2xl border-l-4 border-brand-yellow pl-6">
                        Bergabunglah dengan komunitas global kami. Universitas Kadiri menyediakan lingkungan akademik kelas
                        dunia dengan dukungan penuh untuk keberhasilan studi Anda di Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#services"
                            class="group relative px-8 py-4 bg-brand-yellow text-brand-blue font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-yellow-500/50 transition-all duration-300 transform hover:-translate-y-1">
                            <span class="relative z-10 flex items-center">
                                Jelajahi Layanan
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </span>
                            <div
                                class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                            </div>
                        </a>
                        <a href="#contact"
                            class="group px-8 py-4 bg-white/5 backdrop-blur-md border border-white/20 text-white font-bold rounded-xl hover:bg-white/10 transition-all duration-300 flex items-center justify-center">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Stats Section -->
        <div class="container mx-auto px-4 -mt-24 relative z-20">
            <div
                class="bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] p-8 md:p-12 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 divide-y md:divide-y-0 md:divide-x divide-gray-100">
                    <div class="text-center md:px-6 group cursor-default">
                        <div
                            class="text-5xl font-black text-brand-blue mb-2 group-hover:scale-110 transition-transform duration-300 inline-block">
                            {{ $data->total_students ?? 0 }}</div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Mahasiswa Asing</div>
                    </div>
                    <div class="text-center md:px-6 group cursor-default">
                        <div
                            class="text-5xl font-black text-brand-yellow mb-2 group-hover:scale-110 transition-transform duration-300 inline-block">
                            3+</div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Negara Asal</div>
                    </div>
                    <div class="text-center md:px-6 group cursor-default">
                        <div
                            class="text-5xl font-black text-green-500 mb-2 group-hover:scale-110 transition-transform duration-300 inline-block">
                            95%</div>
                        <div class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Services Grid -->
        <div id="services" class="py-32 bg-gray-50 relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-gray-100/50 to-transparent"></div>
            <div class="absolute bottom-20 left-10 w-64 h-64 bg-brand-yellow/5 rounded-full blur-3xl"></div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center mb-20">
                    <h2 class="text-sm font-bold text-brand-blue uppercase tracking-widest mb-3">Layanan Kami</h2>
                    <h3 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Dukungan Akademik <span
                            class="text-brand-blue">Komprehensif</span></h3>
                    <p class="max-w-2xl mx-auto text-gray-500 text-lg">Kami menyediakan ekosistem pendukung yang lengkap
                        agar Anda dapat fokus meraih prestasi terbaik.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Card 1 -->
                    <div
                        class="group bg-white rounded-[2rem] p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-brand-blue/10 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-[100%] transition-transform duration-500 group-hover:scale-150 z-0">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-brand-blue text-white rounded-2xl flex items-center justify-center text-2xl mb-8 shadow-lg shadow-blue-900/20 group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-brand-blue transition-colors">
                                Administrasi & Admisi</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-yellow rounded-full mr-3"></span>Konsultasi Program</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-yellow rounded-full mr-3"></span>Evaluasi Dokumen</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-yellow rounded-full mr-3"></span>Bantuan Aplikasi</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="group bg-white rounded-[2rem] p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-brand-blue/10 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-yellow-50 rounded-bl-[100%] transition-transform duration-500 group-hover:scale-150 z-0">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-brand-yellow text-brand-blue rounded-2xl flex items-center justify-center text-2xl mb-8 shadow-lg shadow-yellow-500/20 group-hover:-rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-brand-blue transition-colors">
                                Visa & Legalitas</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-blue rounded-full mr-3"></span>Izin Pelajar</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-blue rounded-full mr-3"></span>Imigrasi & EPO</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-brand-blue rounded-full mr-3"></span>Lapor Diri</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="group bg-white rounded-[2rem] p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-brand-blue/10 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-green-50 rounded-bl-[100%] transition-transform duration-500 group-hover:scale-150 z-0">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-green-500 text-white rounded-2xl flex items-center justify-center text-2xl mb-8 shadow-lg shadow-green-500/20 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-brand-blue transition-colors">
                                Student Life</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3"></span>Buddy System</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3"></span>Cultural Exchange</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3"></span>Student Club</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="group bg-white rounded-[2rem] p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-brand-blue/10 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-bl-[100%] transition-transform duration-500 group-hover:scale-150 z-0">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-purple-600 text-white rounded-2xl flex items-center justify-center text-2xl mb-8 shadow-lg shadow-purple-600/20 group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-brand-blue transition-colors">
                                Pengembangan</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-3"></span>Bahasa Indonesia</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-3"></span>Career Center</li>
                                <li class="flex items-center text-gray-500 text-sm"><span
                                        class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-3"></span>Lab Bahasa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Section with Horizontal Flow -->
        <div class="py-24 bg-brand-blue relative overflow-hidden text-white">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-6">
                    <div class="max-w-xl">
                        <h2 class="text-sm font-bold text-brand-yellow uppercase tracking-widest mb-3">Langkah Mudah</h2>
                        <h3 class="text-4xl font-black mb-4">Proses Pendaftaran</h3>
                        <p class="text-blue-200">Panduan langkah demi langkah untuk menjadi bagian dari keluarga besar
                            Universitas Kadiri.</p>
                    </div>
                    <div>
                        @if($data->sop_document)
                            <a href="{{ asset('storage/' . $data->sop_document) }}" target="_blank"
                                class="group inline-flex items-center px-6 py-3 bg-brand-yellow text-brand-blue font-bold rounded-xl hover:bg-white transition-all duration-300 shadow-xl shadow-brand-blue/50">
                                <span>Unduh Panduan Lengkap</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-y-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="relative">
                    <!-- Connecting Line -->
                    <div class="hidden md:block absolute top-12 left-0 right-0 h-1 bg-white/10 rounded-full"></div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <!-- Step 1 -->
                        <div class="relative group">
                            <div
                                class="w-24 h-24 bg-brand-blue border-4 border-brand-yellow rounded-full flex items-center justify-center text-3xl font-black text-brand-yellow mb-6 relative z-10 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-brand-blue">
                                1</div>
                            <h4 class="text-xl font-bold mb-3">Konsultasi</h4>
                            <p class="text-blue-100 text-sm leading-relaxed">Hubungi tim admisi kami untuk mendiskusikan
                                minat studi dan persyaratan masuk.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative group">
                            <div
                                class="w-24 h-24 bg-brand-blue border-4 border-white/20 rounded-full flex items-center justify-center text-3xl font-black text-white mb-6 relative z-10 group-hover:scale-110 transition-transform duration-300 group-hover:border-brand-yellow group-hover:text-brand-yellow">
                                2</div>
                            <h4 class="text-xl font-bold mb-3">Pemberkasan</h4>
                            <p class="text-blue-100 text-sm leading-relaxed">Persiapkan dan kirimkan dokumen akademik serta
                                identitas yang diperlukan.</p>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative group">
                            <div
                                class="w-24 h-24 bg-brand-blue border-4 border-white/20 rounded-full flex items-center justify-center text-3xl font-black text-white mb-6 relative z-10 group-hover:scale-110 transition-transform duration-300 group-hover:border-brand-yellow group-hover:text-brand-yellow">
                                3</div>
                            <h4 class="text-xl font-bold mb-3">Seleksi</h4>
                            <p class="text-blue-100 text-sm leading-relaxed">Proses verifikasi dokumen dan wawancara (jika
                                diperlukan) oleh universitas.</p>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative group">
                            <div
                                class="w-24 h-24 bg-brand-blue border-4 border-white/20 rounded-full flex items-center justify-center text-3xl font-black text-white mb-6 relative z-10 group-hover:scale-110 transition-transform duration-300 group-hover:border-brand-yellow group-hover:text-brand-yellow">
                                4</div>
                            <h4 class="text-xl font-bold mb-3">Penerimaan</h4>
                            <p class="text-blue-100 text-sm leading-relaxed">Terima Letter of Acceptance (LoA) dan mulai
                                proses pengurusan visa pelajar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section (Masonry-like) -->
        <div class="py-32 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-end justify-between mb-16">
                    <div>
                        <h2 class="text-sm font-bold text-brand-blue uppercase tracking-widest mb-3">Kehidupan Kampus</h2>
                        <h3 class="text-4xl font-black text-gray-900">Suasana & <span
                                class="bg-brand-yellow/30 px-2">Fasilitas</span></h3>
                    </div>
                    <p class="mt-4 md:mt-0 max-w-md text-gray-500 text-right">Menjelajahi lingkungan belajar yang modern,
                        hijau, dan kondusif untuk pengembangan diri.</p>
                </div>

                @if($data->facilities && $data->facilities->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[300px]">
                        @foreach($data->facilities as $index => $facility)
                            <div
                                class="group relative rounded-3xl overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500 {{ $index % 3 == 0 ? 'md:col-span-2' : '' }}">
                                <img src="{{ asset('storage/' . $facility->image) }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                                    alt="{{ $facility->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300">
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <h4 class="text-2xl font-bold text-white mb-2">{{ $facility->title }}</h4>
                                    <p
                                        class="text-white/80 line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                        {{ $facility->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-500 font-medium">Galeri belum tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- CTA Section -->
        <div class="py-24 bg-gray-900 relative overflow-hidden text-center">
            <div
                class="absolute inset-0 opacity-20 bg-[url('https://baak.unik-kediri.ac.id/assets/img/slider/slider-1.jpg')] bg-cover bg-center bg-fixed">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 to-gray-900"></div>

            <div class="container mx-auto px-4 relative z-10">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-8">Siap Memulai Masa Depan Anda?</h2>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="#"
                        class="px-10 py-5 bg-brand-yellow text-brand-blue font-bold rounded-full hover:bg-white hover:scale-105 transition-all duration-300 shadow-lg shadow-yellow-500/20">
                        Daftar Sekarang
                    </a>
                    <a href="#"
                        class="px-10 py-5 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-gray-900 hover:scale-105 transition-all duration-300">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection