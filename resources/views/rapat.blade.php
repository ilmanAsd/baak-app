@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-brand-blue flex items-center">
                            <span class="material-symbols-outlined text-sm mr-2">home</span>
                            Beranda
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-gray-400 text-[20px]">chevron_right</span>
                            <span class="ml-1 font-medium text-gray-800">Agenda Rapat</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Premium Header Section -->
            <div
                class="relative py-16 mb-12 overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-brand-blue via-brand-blue to-indigo-900 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 bg-brand-yellow/20 rounded-full blur-2xl">
                </div>

                <div class="relative z-10 container mx-auto px-10 text-center">
                    <span
                        class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.2em] text-brand-yellow uppercase bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                        Institutional Repository
                    </span>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-6 uppercase italic tracking-tight">
                        Agenda <span class="text-brand-yellow">Rapat</span>
                    </h1>
                    <p class="text-blue-100 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed opacity-90 font-medium">
                        Daftar agenda rapat, berita acara, dan dokumentasi rapat koordinasi Universitas Kadiri.
                    </p>
                </div>
            </div>

            @if($agendas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($agendas as $agenda)
                        <article
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col h-full hover:-translate-y-2">
                            <div
                                class="relative h-48 bg-gradient-to-br from-brand-blue/5 to-brand-blue/10 flex items-center justify-center overflow-hidden">
                                <span
                                    class="material-symbols-outlined text-6xl text-brand-blue/20 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500">groups</span>
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="bg-white/90 backdrop-blur-sm text-brand-blue text-[10px] font-black px-4 py-2 rounded-2xl shadow-sm border border-white/20 uppercase tracking-widest">
                                        {{ $agenda->date->format('Y') }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-8 flex-1 flex flex-col">
                                <div
                                    class="flex items-center gap-3 mb-4 text-[11px] font-black text-gray-400 uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[16px] text-brand-blue/60">calendar_today</span>
                                    {{ $agenda->date->format('d M Y') }}
                                </div>

                                <h2
                                    class="text-xl font-black text-gray-900 mb-4 line-clamp-2 group-hover:text-brand-blue transition-colors duration-300 leading-tight uppercase italic">
                                    <a href="{{ route('rapat.show', $agenda->slug) }}">{{ $agenda->title }}</a>
                                </h2>

                                <div class="text-gray-500 text-sm line-clamp-3 mb-8 flex-1 leading-relaxed">
                                    {!! strip_tags($agenda->description) !!}
                                </div>

                                <div class="pt-6 border-t border-gray-50">
                                    <a href="{{ route('rapat.show', $agenda->slug) }}"
                                        class="inline-flex items-center text-brand-blue font-black text-xs uppercase tracking-widest group/link">
                                        <span class="relative">
                                            Selengkapnya
                                            <span
                                                class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-blue transition-all duration-300 group-hover/link:w-full"></span>
                                        </span>
                                        <span
                                            class="material-symbols-outlined text-[18px] ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300 text-brand-blue">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $agendas->links() }}
                </div>
            @else
                <div class="text-center py-24 bg-white rounded-[2.5rem] border border-gray-100 shadow-xl mx-4 md:mx-0">
                    <div class="flex flex-col items-center opacity-30">
                        <span class="material-symbols-outlined text-7xl text-gray-300 mb-6 font-thin">event_busy</span>
                        <h3 class="text-2xl font-black text-gray-400 uppercase italic tracking-tight">Belum Ada Agenda</h3>
                        <p class="text-gray-400 text-sm mt-2 font-medium">Informasi agenda rapat terbaru akan segera hadir.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection