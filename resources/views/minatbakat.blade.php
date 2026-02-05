@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
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
                Layanan Kemahasiswaan
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                Pusat Layanan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Minat &
                    Bakat</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Wadah pengembangan potensi diri, kreativitas, dan prestasi mahasiswa Universitas Kadiri.
            </p>
        </div>
    </section>

    <!-- Main Content Container key features -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- Intro Features -->
            <div class="p-8 md:p-16 border-b border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Komunitas & Jaringan</h3>
                        <p class="text-sm text-gray-500">Bangun relasi profesional dengan rekan yang memiliki minat serupa.
                        </p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Soft Skills</h3>
                        <p class="text-sm text-gray-500">Kembangkan kepemimpinan, komunikasi, dan kerja tim.</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Kompetisi</h3>
                        <p class="text-sm text-gray-500">Raih prestasi di tingkat regional hingga internasional.</p>
                    </div>
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">Kreativitas</h3>
                        <p class="text-sm text-gray-500">Salurkan ide inovatif melalui berbagai proyek kolaboratif.</p>
                    </div>
                </div>
            </div>

            <!-- UKM Directory (Glassmorphism & Neumorphism) -->
            <div class="relative py-20 px-4 md:px-16 overflow-hidden bg-gray-50/30">
                 <!-- Ambient Background Blobs for Glass Effect -->
                <div class="absolute top-0 left-0 w-full h-full bg-[#f4f7fa] -z-10"></div>
                <div class="absolute top-20 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-brand-yellow rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                
                <div class="relative z-10">
                    <div class="text-center mb-16">
                        <span class="text-brand-blue font-semibold tracking-wider uppercase text-sm mb-2 block">Extracurricular</span>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-6 relative inline-block">
                             Unit Kegiatan Mahasiswa
                             <div class="absolute -bottom-2 left-0 w-full h-1.5 bg-brand-yellow rounded-full opacity-70"></div>
                        </h2>
                        <p class="text-gray-500 max-w-2xl mx-auto text-lg">Temukan wadah yang tepat untuk mengekspresikan bakat dan minatmu di lingkungan Universitas Kadiri.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                        @foreach($ukms as $ukm)
                        <!-- Card: Mixed Glass & Neumorphism -->
                        <div class="group relative rounded-[2rem] bg-white/40 backdrop-blur-xl border border-white/60 p-5 shadow-[20px_20px_60px_#d1d9e6,-20px_-20px_60px_#ffffff] hover:shadow-[10px_10px_30px_#d1d9e6,-10px_-10px_30px_#ffffff] transition-all duration-500 hover:-translate-y-2">
                            
                            <!-- Header Image Container -->
                            <div class="relative h-48 w-full rounded-3xl overflow-hidden shadow-inner border border-white/50 group-hover:shadow-none transition-all">
                                 @if($ukm->image)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($ukm->image) }}" alt="{{ $ukm->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                         <span class="text-4xl font-black text-gray-300 select-none uppercase tracking-widest">{{ substr($ukm->name, 4, 3) }}</span> 
                                    </div>
                                @endif
                                
                                <!-- Floating Badge -->
                                <div class="absolute top-4 right-4">
                                     <div class="bg-white/30 backdrop-blur-md border border-white/40 text-gray-800 text-xs font-bold px-4 py-2 rounded-2xl shadow-sm">
                                         {{ $ukm->category }}
                                     </div>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="mt-6 px-2">
                                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-brand-blue transition-colors">{{ $ukm->name }}</h3>
                                
                                <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ $ukm->description }}
                                </p>

                                <!-- Action (Neumorphic Button) -->
                                <div class="flex items-center justify-between mt-auto">
                                    <a href="{{ $ukm->instagram_link ?? '#' }}" target="_blank" 
                                       class="relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-bold text-brand-blue transition-all duration-300 bg-gray-100 rounded-xl group/btn hover:bg-brand-blue hover:text-white shadow-[5px_5px_10px_#bebebe,-5px_-5px_10px_#ffffff] hover:shadow-none">
                                        <span class="mr-2 text-sm">Lihat Detail</span>
                                        <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Join Process -->
            <div class="p-8 md:p-16 border-t border-gray-100">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-brand-blue mb-4">Bagaimana Cara Bergabung?</h2>
                    <p class="text-gray-500">Langkah mudah untuk menjadi bagian dari Unit Kegiatan Mahasiswa.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-brand-blue font-bold text-xl border-4 border-white shadow-md">
                            1</div>
                        <h4 class="font-bold text-gray-900">Identifikasi Minat</h4>
                        <p class="text-sm text-gray-500 mt-2">Kenali bakatmu lewat sesi orientasi UKM.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-brand-blue font-bold text-xl border-4 border-white shadow-md">
                            2</div>
                        <h4 class="font-bold text-gray-900">Pilih UKM</h4>
                        <p class="text-sm text-gray-500 mt-2">Pilih yang paling sesuai dengan passionmu.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-brand-blue rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl border-4 border-white shadow-md">
                            3</div>
                        <h4 class="font-bold text-gray-900">Daftar</h4>
                        <p class="text-sm text-gray-500 mt-2">Daftar online atau ke sekretariat UKM.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white font-bold text-xl border-4 border-white shadow-md">
                            4</div>
                        <h4 class="font-bold text-gray-900">Aktif</h4>
                        <p class="text-sm text-gray-500 mt-2">Ikuti kegiatan dan kembangkan dirimu.</p>
                    </div>
                </div>
            </div>


            <!-- FAQ Section -->
            <div class="p-8 md:p-16 bg-gray-50" x-data="{ expanded: null }">
                <h2 class="text-2xl font-bold text-brand-blue mb-8 text-center">Pertanyaan Umum</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <button @click="expanded = expanded === 1 ? null : 1"
                            class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                            Bagaimana cara mendaftar ke UKM?
                            <svg class="w-5 h-5 transition-transform" :class="expanded === 1 ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="expanded === 1"
                            class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                            Anda bisa mendaftar saat acara UKM Fair (biasanya saat PKKMB) atau langsung mendatangi
                            sekretariat UKM yang diminati di lingkungan kampus.
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <button @click="expanded = expanded === 2 ? null : 2"
                            class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                            Apakah ada biaya bergabung?
                            <svg class="w-5 h-5 transition-transform" :class="expanded === 2 ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="expanded === 2"
                            class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                            Sebagian besar UKM tidak memungut biaya pendaftaran, namun mungkin ada iuran kas untuk
                            operasional kegiatan yang disepakati bersama oleh anggota.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Animation Styles -->
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