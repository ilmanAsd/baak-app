@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero Section -->
        <section class="relative py-24 overflow-hidden bg-brand-blue">
            <div class="absolute inset-0 bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 opacity-90"></div>
            <div
                class="absolute top-0 right-0 -mt-24 -mr-24 w-96 h-96 bg-brand-yellow/10 rounded-full blur-3xl animate-pulse">
            </div>
            <div class="absolute bottom-0 left-0 -mb-24 -ml-24 w-64 h-64 bg-indigo-500/20 rounded-full blur-2xl"></div>

            <div class="relative z-10 container mx-auto px-4 max-w-6xl text-center">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-8">
                    <span class="w-2 h-2 bg-brand-yellow rounded-full"></span>
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-brand-yellow italic">Academic
                        Foundation</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tighter uppercase italic">
                    Mata Kuliah <span class="text-brand-yellow">Wajib</span> Universitas
                </h1>
                <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-medium opacity-90">
                    Mata Kuliah Wajib Universitas (MKWU) dirancang untuk membentuk karakter, integritas, dan kompetensi
                    dasar bagi seluruh mahasiswa Universitas Kadiri.
                </p>
            </div>
        </section>

        <!-- Courses Grid Area -->
        <div class="container mx-auto px-4 py-24 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($mkwu as $mk)
                    <div
                        class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-xl hover:shadow-2xl transition-all flex flex-col overflow-hidden relative">
                        <!-- Card Header Icon -->
                        <div class="p-8 pb-0">
                            <div
                                class="w-16 h-16 bg-brand-blue/5 text-brand-blue rounded-2xl flex items-center justify-center group-hover:bg-brand-blue group-hover:text-white transition-all duration-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-8 pt-6 flex-grow">
                            <h3
                                class="text-2xl font-black text-brand-blue mb-4 tracking-tight group-hover:text-brand-yellow transition-colors italic uppercase">
                                {{ $mk->title }}</h3>
                            <div class="text-gray-500 text-sm leading-relaxed prose prose-sm max-w-none">
                                {!! $mk->description !!}
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="p-8 pt-0 mt-auto space-y-3">
                            @if($mk->file_path)
                                <a href="{{ asset('storage/' . $mk->file_path) }}" target="_blank"
                                    class="flex items-center justify-center gap-3 w-full py-4 bg-gray-50 text-brand-blue rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-brand-blue hover:text-white transition-all border border-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Unduh Silabus / RPS
                                </a>
                            @endif

                            @if($mk->url)
                                <a href="{{ $mk->url }}" target="_blank"
                                    class="flex items-center justify-center gap-3 w-full py-4 bg-brand-yellow text-brand-blue rounded-2xl font-black text-xs uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-brand-yellow/10">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 00-2 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                    Materi Pendukung
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-400 font-bold uppercase tracking-widest">Belum ada data mata kuliah MKWU.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Footer / Call to Action -->
        <section class="bg-brand-blue py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-brand-yellow/5"></div>
            <div class="container mx-auto px-4 text-center relative z-10">
                <h2 class="text-3xl font-black text-white mb-8 tracking-tighter uppercase italic">Informasi Lebih Lanjut
                    Mengenai <span class="text-brand-yellow">Layanan Pembelajaran</span>?</h2>
                <a href="{{ route('pembelajaran') }}"
                    class="px-12 py-5 border-2 border-brand-yellow text-brand-yellow rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-brand-yellow hover:text-brand-blue transition-all">
                    Kembali ke Beranda Pembelajaran
                </a>
            </div>
        </section>
    </div>
@endsection