@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="bg-brand-blue py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-brand-yellow mb-6">Kegiatan BAAK</h1>
            <p class="text-white text-lg font-light opacity-90">
                Dokumentasi dan agenda kegiatan Biro Administrasi Akademik dan Kemahasiswaan
            </p>
            <div class="w-24 h-1 bg-brand-yellow mx-auto mt-8"></div>
        </div>
    </section>

    <!-- Activities List Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            @if($activities->count() > 0)
                <div class="space-y-16">
                    @foreach($activities as $activity)
                        <!-- Activity Item -->
                        <div
                            class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
                            <!-- Title (Top) -->
                            <div class="p-8 pb-4">
                                <h2 class="text-2xl md:text-3xl font-bold text-brand-blue hover:text-blue-600 transition-colors">
                                    {{ $activity->title }}
                                </h2>
                            </div>

                            <!-- Image (Middle) -->
                            @if($activity->image)
                                <div class="w-full aspect-video bg-gray-100 relative group overflow-hidden">
                                    <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-opacity duration-300">
                                    </div>
                                </div>
                            @endif

                            <!-- Date & Details (Bottom) -->
                            <div class="p-8 pt-4">
                                <div class="flex items-center text-gray-500 mb-4">
                                    <svg class="w-5 h-5 mr-2 text-brand-yellow" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span
                                        class="font-medium text-sm md:text-base">{{ \Carbon\Carbon::parse($activity->date)->isoFormat('dddd, D MMMM Y') }}</span>
                                </div>

                                @if($activity->description)
                                    <div class="prose prose-blue text-gray-600 mb-6 line-clamp-3 text-justify">
                                        {!! Str::limit(strip_tags($activity->description), 250) !!}
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <a href="{{ route('kegiatan.show', $activity->slug) }}"
                                        class="inline-flex items-center px-6 py-2 bg-brand-yellow text-brand-blue font-bold rounded-full hover:bg-yellow-400 transition-colors shadow-md hover:shadow-lg">
                                        Lihat Selengkapnya
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-block p-6 rounded-full bg-blue-50 text-brand-blue mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700">Belum ada kegiatan terbaru</h3>
                    <p class="text-gray-500 mt-2">Nantikan update kegiatan dari kami.</p>
                </div>
            @endif
        </div>
    </section>
@endsection