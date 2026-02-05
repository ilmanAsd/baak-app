@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero Section -->
        <section class="relative py-24 overflow-hidden bg-brand-blue">
            <div class="absolute inset-0 bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 opacity-90"></div>
            <div class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 bg-brand-yellow/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 left-0 -mb-24 -ml-24 w-64 h-64 bg-indigo-500/20 rounded-full blur-2xl"></div>

            <div class="relative z-10 container mx-auto px-4 max-w-6xl text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                    <span class="w-2 h-2 bg-brand-yellow rounded-full"></span>
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-brand-yellow italic">Merdeka Belajar</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tighter uppercase italic">
                    {{ $setting->hero_title }}
                </h1>
                <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-medium opacity-90">
                    {{ $setting->hero_description }}
                </p>
                
                <div class="mt-12 flex flex-wrap justify-center gap-6">
                    <a href="#partnership" class="group relative px-10 py-4 bg-brand-yellow text-brand-blue rounded-2xl font-black text-sm uppercase tracking-widest hover:scale-105 transition-all shadow-xl shadow-brand-yellow/20">
                        Lihat Partnership
                    </a>
                    <a href="#video" class="group relative px-10 py-4 bg-white/10 text-white border border-white/20 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-white hover:text-brand-blue transition-all">
                        Putar Video
                    </a>
                </div>
            </div>
        </section>

        <!-- Main Content Area -->
        <div class="container mx-auto px-4 py-24 max-w-6xl space-y-32">

            <!-- Section: Kampus Berdampak -->
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 text-brand-blue bg-brand-blue/5 px-4 py-1.5 rounded-full border border-brand-blue/10">
                        <span class="text-[10px] font-black uppercase tracking-widest">About MBKM</span>
                    </div>
                    <h2 class="text-4xl font-black text-brand-blue leading-tight tracking-tight">Apa itu <span class="text-brand-yellow">Kampus Berdampak?</span></h2>
                    <div class="text-gray-600 text-lg leading-relaxed space-y-4 font-medium italic">
                        <p>Kampus Berdampak adalah program yang dicanangkan oleh Kemdiktisaintek untuk menjadikan perguruan tinggi di Indonesia tidak hanya berperan dalam menghasilkan lulusan berkualitas, tetapi juga sebagai pusat solusi bagi permasalahan sosial, ekonomi, dan lingkungan.</p>
                        <p>Program ini memberikan kesempatan kepada mahasiswa untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai langkah persiapan karier.</p>
                    </div>
                    <div class="pt-4">
                        <a href="https://simbelmawa.kemdikbud.go.id/magang" target="_blank" class="inline-flex items-center gap-3 text-brand-blue font-black border-b-2 border-brand-yellow hover:gap-5 transition-all">
                            <span>PELAJARI MAGANG BERDAMPAK</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-brand-yellow to-brand-blue opacity-10 blur-2xl group-hover:opacity-20 transition-all"></div>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white aspect-[4/3]">
                        @if($setting->impact_image)
                            <img src="{{ asset('storage/' . $setting->impact_image) }}" alt="MBKM Impact" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1470&auto=format&fit=crop" alt="MBKM" class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-brand-blue/20 group-hover:bg-transparent transition-colors"></div>
                    </div>
                </div>
            </section>

            <!-- Section: Program Unggulan -->
            <section id="programs" class="space-y-16">
                <div class="text-center space-y-4">
                    <h2 class="text-4xl font-black text-brand-blue uppercase italic tracking-tighter">Program & Kegiatan <span class="text-brand-yellow">Unggulan</span></h2>
                    <div class="w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($programs as $program)
                        <div class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all flex flex-col justify-between overflow-hidden relative">
                            <div class="absolute top-0 right-0 -mt-8 -mr-8 w-24 h-24 bg-brand-blue/5 rounded-full blur-xl group-hover:bg-brand-blue/10 transition-colors"></div>
                            <div>
                                <h4 class="text-xl font-black text-brand-blue mb-4 leading-tight">{{ $program->title }}</h4>
                                <div class="text-gray-500 text-sm leading-relaxed mb-8 line-clamp-4">
                                    {!! $program->description !!}
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                @if($program->url)
                                    <a href="{{ $program->url }}" target="_blank" class="text-xs font-black text-brand-blue uppercase tracking-widest hover:underline">Info Program</a>
                                @endif
                                @if($program->file_path)
                                    <a href="{{ asset('storage/' . $program->file_path) }}" target="_blank" class="flex items-center gap-2 text-xs font-black text-rose-500 uppercase tracking-widest hover:underline">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        Panduan
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <!-- Static fallback programs if empty -->
                        @php
                            $staticPrograms = [
                                ['title' => 'Kampus Mengajar', 'url' => 'https://kampusmerdeka.kemdikbud.go.id/program/mengajar', 'desc' => 'Bantu tingkatkan kualitas pengajar pendidikan dasar melalui Kampus mengajar.'],
                                ['title' => 'Magang MSIB', 'url' => 'https://kampusmerdeka.kemdikbud.go.id/program/magang/detail', 'desc' => 'Rasakan pengalaman dunia kerja dengan terjun langsung melalui Magang MSIB.'],
                                ['title' => 'IISMA', 'url' => 'https://site.iisma.id/', 'desc' => 'Perluas wawasan dan koneksi melalui Pertukaran Mahasiswa secara Internasional.'],
                            ];
                        @endphp
                        @foreach($staticPrograms as $sp)
                             <div class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all flex flex-col justify-between">
                                <div>
                                    <h4 class="text-xl font-black text-brand-blue mb-4 leading-tight">{{ $sp['title'] }}</h4>
                                    <p class="text-gray-500 text-sm leading-relaxed mb-8">{{ $sp['desc'] }}</p>
                                </div>
                                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                    <a href="{{ $sp['url'] }}" target="_blank" class="text-xs font-black text-brand-blue uppercase tracking-widest hover:underline">DAFTAR SEKARANG</a>
                                </div>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </section>

            <!-- Section: Partnership MBKM -->
            <section id="partnership" class="space-y-16">
                <div class="text-center space-y-4">
                    <h2 class="text-4xl font-black text-brand-blue tracking-tight uppercase italic">Partnership <span class="text-brand-yellow">MBKM</span></h2>
                    <p class="text-gray-500 font-medium">Instansi dan perusahaan yang telah bekerja sama menyukseskan program MBKM Universitas Kadiri.</p>
                </div>

                <div class="bg-white rounded-[3rem] shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-brand-blue">
                                    <th class="px-12 py-8 text-white font-black text-sm uppercase tracking-[0.2em]">Nama Instansi / Perusahaan</th>
                                    <th class="px-12 py-8 text-white font-black text-sm uppercase tracking-[0.2em] text-center">Identitas Visual (Logo)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($partnerships as $partner)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-12 py-10">
                                            <div class="flex flex-col">
                                                <span class="text-xl font-black text-gray-800 tracking-tight">{{ $partner->title }}</span>
                                                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1">Official Partner</span>
                                            </div>
                                        </td>
                                        <td class="px-12 py-10">
                                            <div class="flex justify-center">
                                                @if($partner->file_path)
                                                    <div class="w-32 h-20 bg-gray-50 rounded-2xl p-4 flex items-center justify-center border border-gray-100 group-hover:bg-white transition-colors">
                                                        <img src="{{ asset('storage/' . $partner->file_path) }}" alt="{{ $partner->title }}" class="max-w-full max-h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-500">
                                                    </div>
                                                @else
                                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center text-gray-300">
                                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-12 py-24 text-center">
                                            <div class="flex flex-col items-center opacity-30">
                                                <svg class="w-20 h-20 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                <p class="text-xl font-black text-gray-400 tracking-widest uppercase">Kami terus memperluas jangkauan kerja sama.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Section: Video MBKM (Card Section) -->
            @if($videos->count() > 0)
                <section id="video" class="space-y-16">
                    <div class="text-center space-y-4">
                        <div class="inline-flex items-center gap-2 text-brand-blue bg-brand-blue/5 px-4 py-1.5 rounded-full border border-brand-blue/10">
                            <span class="text-[10px] font-black uppercase tracking-widest">Video Dokumentasi</span>
                        </div>
                        <h2 class="text-4xl font-black text-brand-blue uppercase italic">Aktivitas & <span class="text-brand-yellow">Dokumentasi Video</span></h2>
                        <div class="w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($videos as $video)
                            <div class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all overflow-hidden flex flex-col h-full">
                                <!-- Video Player Side -->
                                <div class="relative aspect-video bg-black overflow-hidden">
                                    @php
                                        $vUrl = $video->video_url;
                                        $embed = '';
                                        if (str_contains($vUrl, 'youtube.com/watch?v=')) {
                                            $videoId = explode('v=', $vUrl)[1];
                                            $videoId = explode('&', $videoId)[0];
                                            $embed = "https://www.youtube.com/embed/{$videoId}";
                                        } elseif (str_contains($vUrl, 'youtu.be/')) {
                                            $videoId = explode('youtu.be/', $vUrl)[1];
                                            $videoId = explode('?', $videoId)[0];
                                            $embed = "https://www.youtube.com/embed/{$videoId}";
                                        }
                                    @endphp

                                    @if($embed)
                                        <iframe class="w-full h-full" src="{{ $embed }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-center p-8 bg-brand-blue">
                                            <div class="w-16 h-16 bg-white/10 text-white rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                            <a href="{{ $vUrl }}" target="_blank" class="text-xs font-black text-white hover:text-brand-yellow uppercase tracking-widest transition-colors">Tonton Video di Youtube</a>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Content Side -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 mb-3">
                                        <span class="w-2 h-2 bg-brand-yellow rounded-full"></span>
                                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">MBKM Highlight</span>
                                    </div>
                                    <h4 class="text-xl font-black text-brand-blue leading-tight mb-4 group-hover:text-brand-yellow transition-colors">{{ $video->title }}</h4>
                                    <div class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                        {!! strip_tags($video->description) !!}
                                    </div>
                                    <div class="mt-auto pt-6 border-t border-gray-50 flex items-center justify-between">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Video Tutorial / Dokumentasi</span>
                                        <svg class="w-5 h-5 text-brand-blue transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>

        <!-- Call to Action -->
        <section class="bg-gray-900 py-24 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-yellow via-brand-blue to-rose-500"></div>
            <div class="container mx-auto px-4 text-center relative z-10">
                <h2 class="text-4xl font-black text-white mb-8 tracking-tighter uppercase italic">Siapkan Dirimu untuk <span class="text-brand-yellow">Masa Depan</span></h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="https://kampusmerdeka.kemdikbud.go.id/" target="_blank" class="px-12 py-5 bg-brand-blue text-white rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-blue-900 transition-all shadow-xl shadow-brand-blue/40">
                        Portal Nasional MBKM
                    </a>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 p-8 opacity-10">
                <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
            </div>
        </section>
    </div>
@endsection
