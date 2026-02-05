@extends('layouts.app')

@section('content')
    @php
        use App\Models\ProfileContent;
        $profile = ProfileContent::first();
    @endphp

    <!-- Header Section -->
    <section class="bg-brand-blue py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-brand-yellow mb-6">Visi & Misi</h1>
            <div class="max-w-3xl mx-auto">
                <p class="text-white text-lg font-light opacity-90">
                    Arah dan tujuan strategis Biro Administrasi Akademik dan Kemahasiswaan
                </p>
            </div>
            <div class="w-24 h-1 bg-brand-yellow mx-auto mt-8"></div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Visi -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg border-t-8 border-brand-blue transform hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-center mb-8 border-b border-gray-100 pb-4">
                        <div
                            class="w-16 h-16 bg-blue-50 text-brand-blue rounded-2xl flex items-center justify-center mr-6 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-blue">Visi</h2>
                    </div>
                    <div class="prose prose-lg prose-blue text-gray-600 leading-relaxed">
                        {!! $profile?->vision ?? '<p class="text-gray-400 italic">Belum ada data visi.</p>' !!}
                    </div>
                </div>

                <!-- Misi -->
                <div
                    class="bg-white p-10 rounded-2xl shadow-lg border-t-8 border-brand-yellow transform hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-center mb-8 border-b border-gray-100 pb-4">
                        <div
                            class="w-16 h-16 bg-yellow-50 text-brand-blue rounded-2xl flex items-center justify-center mr-6 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-brand-blue">Misi</h2>
                    </div>
                    <div class="prose prose-lg prose-yellow text-gray-600 leading-relaxed">
                        {!! $profile?->mission ?? '<p class="text-gray-400 italic">Belum ada data misi.</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection