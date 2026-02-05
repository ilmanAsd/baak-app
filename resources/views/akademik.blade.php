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
                <div class="inline-flex items-center gap-2 rounded-full border border-brand-yellow/30 bg-brand-yellow/10 px-5 py-2 text-xs font-black uppercase tracking-[0.2em] text-brand-yellow backdrop-blur-sm">
                    <!-- <span class="material-symbols-outlined text-[16px]">auto_awesome</span>
                    Portal Akademik -->
                </div>

                <!-- Headline -->
                <h1 class="text-4xl md:text-7xl font-black leading-[1.1] tracking-[-0.04em] text-white">
                    {{ $portalSetting?->title ?? 'Selamat Datang di Portal Akademik' }}
                </h1>

                <!-- Subheadline -->
                <p class="max-w-2xl text-lg md:text-xl font-medium leading-relaxed text-blue-50/80">
                    {{ $portalSetting?->description ?? 'Universitas Kadiri menyediakan layanan akademik terpadu untuk mendukung proses pembelajaran dan administratif bagi mahasiswa, dosen, dan staf.' }}
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-4">
                    <a href="{{ $portalSetting?->button_1_url ?? '#' }}" target="_blank"
                        class="w-full sm:w-auto min-w-[220px] h-14 flex items-center justify-center rounded-2xl bg-brand-yellow text-brand-blue font-black text-sm uppercase tracking-widest hover:shadow-2xl hover:shadow-brand-yellow/30 transition-all hover:-translate-y-1 active:scale-95">
                        {{ $portalSetting?->button_1_text ?? 'Login Mahasiswa' }}
                    </a>
                    <a href="{{ $portalSetting?->button_2_url ?? '#' }}" target="_blank"
                        class="w-full sm:w-auto min-w-[220px] h-14 flex items-center justify-center rounded-2xl border-2 border-white text-white font-black text-sm uppercase tracking-widest hover:bg-white hover:text-brand-blue transition-all hover:-translate-y-1 active:scale-95">
                        {{ $portalSetting?->button_2_text ?? 'Login Dosen' }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 text-white">
            
            <span class="material-symbols-outlined text-brand-yellow animate-bounce">expand_more</span>
        </div>
    </section>

    <div class="container mx-auto px-4 py-12 max-w-6xl space-y-20">
        <!-- Services Section Removed as requested -->

        <!-- Academic Documents -->
        <section class="py-16">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-blue mb-4">Dokumen Akademik</h2>
                <div class="w-24 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
                <p class="mt-6 text-gray-500 max-w-2xl mx-auto text-lg">
                    Akses cepat ke berbagai dokumen pedoman, kebijakan, dan administrasi akademik yang Anda butuhkan.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                @foreach($documentCategories as $category)
                    <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">
                        <div class="flex items-start gap-6 mb-6">
                            <!-- Icon with soft background -->
                            <div class="flex-shrink-0 w-16 h-16 rounded-2xl flex items-center justify-center transition-colors duration-300 
                                @if(Str::contains($category->name, 'Administrasi')) bg-sky-50 text-sky-600 group-hover:bg-sky-600 group-hover:text-white
                                @elseif(Str::contains($category->name, 'Eksternal')) bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white
                                @elseif(Str::contains($category->name, 'Internal')) bg-teal-50 text-teal-600 group-hover:bg-teal-600 group-hover:text-white
                                @else bg-orange-50 text-orange-600 group-hover:bg-orange-600 group-hover:text-white
                                @endif shadow-inner">
                                @if(Str::contains($category->name, 'Administrasi'))
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                @elseif(Str::contains($category->name, 'Eksternal'))
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                @elseif(Str::contains($category->name, 'Internal'))
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                @endif
                            </div>

                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-brand-blue transition-colors">{{ $category->name }}</h3>
                                <p class="text-gray-500 leading-relaxed line-clamp-3">
                                    {{ $category->description ?? 'Informasi dokumen belum tersedia.' }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-auto pt-4 flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-400 group-hover:text-gray-600 transition-colors">
                                {{ $category->academicDocuments()->count() }} Dokumen tersedia
                            </span>
                            <a href="{{ route('akademik.documents', $category->slug) }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand-blue text-white font-bold rounded-xl hover:bg-blue-900 transition-all shadow-md hover:shadow-lg active:scale-95">
                                <span>Lihat Dokumen</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Faculties & Study Programs (Accordion) -->
        <section x-data="{ activeFaculty: null }">
            <h2 class="text-2xl font-bold text-brand-blue mb-8 border-b border-gray-200 pb-2">Program Studi & Fakultas</h2>
            <div class="space-y-4">
                @foreach($faculties as $faculty)
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button 
                            @click="activeFaculty === {{ $faculty->id }} ? activeFaculty = null : activeFaculty = {{ $faculty->id }}"
                            class="w-full flex justify-between items-center bg-gray-50 p-4 text-left hover:bg-gray-100 transition duration-150 ease-in-out focus:outline-none"
                        >
                            <span class="font-bold text-lg text-gray-800">{{ $faculty->name }}</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200" :class="{'rotate-180': activeFaculty === {{ $faculty->id }}}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="activeFaculty === {{ $faculty->id }}" x-collapse class="bg-white p-6 border-t border-gray-200">
                            @if($faculty->studyPrograms->count() > 0)
                                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($faculty->studyPrograms as $program)
                                        <li class="flex items-start space-x-2">
                                            <svg class="w-5 h-5 text-brand-yellow mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            <div>
                                                <h4 class="font-semibold text-gray-800">{{ $program->name }}</h4>
                                                @if($program->description)
                                                    <div class="text-sm text-gray-500 mt-1">{!! $program->description !!}</div>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 italic">Belum ada data program studi.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Education Levels (Jenjang Pendidikan) -->
        <section>
            <h2 class="text-2xl font-bold text-brand-blue mb-8 border-b border-gray-200 pb-2">Jenjang Pendidikan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($educationLevels as $level)
                    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-brand-yellow hover:shadow-lg transition-shadow">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $level->name }}</h3>
                        <div class="text-gray-600 prose prose-sm max-w-none">
                            {!! $level->description ?? 'Informasi belum tersedia.' !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection
