@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-brand-blue mb-4">Berita & Informasi</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Update terkini seputar kegiatan akademik dan kemahasiswaan
                    Universitas Kadiri.</p>
            </div>

            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article
                            class="group bg-white rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col h-full hover:-translate-y-2">
                            <div class="relative h-64 overflow-hidden">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-brand-blue/5 to-brand-blue/20 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-brand-blue/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                <div class="absolute top-4 right-4 z-10">
                                    <span
                                        class="bg-white/90 backdrop-blur-sm text-brand-blue text-xs font-bold px-4 py-2 rounded-2xl shadow-sm border border-white/20">{{ $post->category->name ?? 'Umum' }}</span>
                                </div>
                            </div>
                            <div class="p-8 flex-1 flex flex-col relative">
                                <div class="flex items-center space-x-4 mb-4 text-xs font-medium text-gray-400">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-brand-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-brand-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ rand(100, 500) }} Views
                                    </div>
                                </div>
                                <h2
                                    class="text-xl font-extrabold text-gray-900 mb-4 line-clamp-2 group-hover:text-brand-blue transition-colors duration-300 leading-tight">
                                    <a href="{{ route('information.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <div class="text-gray-500 text-sm line-clamp-3 mb-8 flex-1 leading-relaxed">
                                    {!! Str::limit(strip_tags($post->content), 120) !!}
                                </div>
                                <div class="pt-6 border-t border-gray-100 mt-auto">
                                    <a href="{{ route('information.show', $post->slug) }}"
                                        class="inline-flex items-center text-brand-blue font-bold text-sm group/link">
                                        <span class="relative">
                                            Baca Selengkapnya
                                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-brand-blue transition-all duration-300 group-hover/link:w-full"></span>
                                        </span>
                                        <svg class="w-5 h-5 ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">Belum ada informasi</h3>
                    <p class="text-gray-500">Informasi terbaru akan segera hadir.</p>
                </div>
            @endif
        </div>
    </div>
@endsection