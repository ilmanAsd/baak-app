@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-brand-blue flex items-center">
                            <span class="material-symbols-outlined text-sm mr-2">home</span>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-gray-400 text-[20px]">chevron_right</span>
                            <a href="{{ route('rapat.index') }}" class="ml-1 hover:text-brand-blue">Agenda Rapat</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-gray-400 text-[20px]">chevron_right</span>
                            <span class="ml-1 font-medium text-gray-800 line-clamp-1">Detail Agenda</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <article class="bg-white rounded-[3rem] shadow-2xl border border-gray-100 overflow-hidden">
                <!-- Header Section -->
                <div class="relative p-12 bg-gradient-to-br from-brand-blue to-indigo-900 overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-8">
                            <span
                                class="px-5 py-2 bg-brand-yellow text-brand-blue text-[10px] font-black rounded-full uppercase tracking-widest shadow-lg shadow-brand-yellow/20">
                                Agenda Info
                            </span>
                            <div
                                class="flex items-center gap-2 text-blue-100 text-xs font-bold uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                                <span class="material-symbols-outlined text-sm text-brand-yellow">calendar_today</span>
                                {{ $agenda->date->format('d F Y') }}
                            </div>
                        </div>

                        <h1
                            class="text-3xl md:text-5xl font-black text-white uppercase italic tracking-tight mb-0 leading-tight">
                            {{ $agenda->title }}
                        </h1>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-12">
                    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed font-medium mb-12">
                        {!! $agenda->description !!}
                    </div>

                    @if($agenda->file_path)
                        <div
                            class="bg-gray-50 rounded-[2.5rem] p-10 border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
                            <div class="flex items-center gap-6">
                                <div
                                    class="w-20 h-20 bg-brand-blue/5 rounded-3xl flex items-center justify-center text-brand-blue shadow-inner group transition-all">
                                    <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black text-brand-blue uppercase tracking-[0.2em] mb-1">Lampiran
                                        Dokumen</span>
                                    <span class="text-xl font-black text-gray-800 italic uppercase">Berkas Agenda Rapat</span>
                                </div>
                            </div>

                            <a href="{{ asset('storage/' . $agenda->file_path) }}" target="_blank"
                                class="w-full md:w-auto px-10 py-5 bg-brand-blue text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-brand-blue/20 hover:bg-blue-900 transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-3">
                                <span>Unduh PDF</span>
                                <span class="material-symbols-outlined text-lg">download</span>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Footer / Nav -->
                <div class="px-12 py-8 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('rapat.index') }}"
                        class="flex items-center gap-2 text-xs font-black text-gray-400 hover:text-brand-blue transition-colors uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        Kembali ke Daftar
                    </a>
                </div>
            </article>
        </div>
    </div>
@endsection