@extends('layouts.app')

@section('content')
    <!-- Banner/Header Section -->
    <section class="bg-brand-blue py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-brand-yellow mb-4">{{ $activity->title }}</h1>
            <div class="flex justify-center items-center text-blue-200 space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ \Carbon\Carbon::parse($activity->date)->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Large Image -->
                @if($activity->image)
                    <div class="w-full aspect-video bg-gray-100">
                        <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}"
                            class="w-full h-full object-contain bg-black">
                    </div>
                @endif

                <!-- Content Body -->
                <div class="p-8 md:p-12">
                    <article class="prose prose-lg prose-blue max-w-none text-gray-700 text-justify">
                        {!! $activity->description !!}
                    </article>

                    <!-- Navigation/Share (Optional) -->
                    <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                        <a href="{{ route('kegiatan') }}"
                            class="inline-flex items-center text-brand-blue hover:text-blue-700 font-medium transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Daftar Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection