@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen">
        <!-- Hero Section -->
        <div class="relative h-[400px] lg:h-[500px] overflow-hidden">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-brand-blue to-blue-900"></div>
            @endif
            <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 flex items-center">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl">
                        <nav class="flex mb-8 text-white/70 text-sm font-medium items-center space-x-2" aria-label="Breadcrumb">
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <a href="{{ route('information.index') }}" class="hover:text-white transition-colors">Berita & Informasi</a>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="text-white truncate lg:max-w-xs">{{ $post->title }}</span>
                        </nav>
                        <span class="inline-block bg-brand-yellow text-brand-blue text-xs font-bold px-4 py-2 rounded-2xl mb-6 shadow-lg uppercase tracking-wider">
                            {{ $post->category->name ?? 'Umum' }}
                        </span>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight drop-shadow-sm">
                            {{ $post->title }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-6 text-white/90 text-sm font-medium">
                            <div class="flex items-center bg-white/10 backdrop-blur-md px-4 py-2 rounded-xl border border-white/20">
                                <svg class="w-5 h-5 mr-2 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}
                            </div>
                            <div class="flex items-center bg-white/10 backdrop-blur-md px-4 py-2 rounded-xl border border-white/20">
                                <svg class="w-5 h-5 mr-2 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Admin BAAK
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-16 -mt-20 relative z-20">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-[40px] shadow-2xl shadow-blue-900/5 p-8 md:p-12 overflow-hidden border border-gray-100">
                        <div class="prose prose-lg max-w-none prose-headings:text-brand-blue prose-headings:font-black prose-a:text-brand-blue prose-img:rounded-3xl prose-img:shadow-xl">
                            {!! $post->content !!}
                        </div>

                        @if($post->attachment)
                            <div class="mt-16 p-8 bg-gradient-to-br from-gray-50 to-blue-50/30 rounded-3xl border border-blue-100 flex flex-col md:flex-row items-center justify-between gap-6 transition-all hover:bg-white hover:shadow-xl group">
                                <div class="flex items-center gap-5">
                                    <div class="w-16 h-16 bg-brand-blue rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-extrabold text-gray-900 mb-1">Dokumen Lampiran</h4>
                                        <p class="text-gray-500 text-sm font-medium">{{ $post->attachment_name ?? 'Download file untuk informasi lebih lanjut' }}</p>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $post->attachment) }}" target="_blank"
                                    class="w-full md:w-auto inline-flex items-center justify-center px-8 py-4 bg-brand-blue text-white font-black rounded-2xl hover:bg-blue-800 transition-all duration-300 shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 active:scale-95">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download File
                                </a>
                            </div>
                        @endif

                        <div class="mt-16 pt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Bagikan:</span>
                                <div class="flex gap-2">
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-brand-blue hover:text-white transition-all duration-300">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-400 hover:text-white transition-all duration-300">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-green-500 hover:text-white transition-all duration-300">
                                        <i class="fab fa-whatsapp"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('information.index') }}" class="text-brand-blue font-bold flex items-center hover:translate-x-[-4px] transition-transform duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali ke Berita
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="space-y-8 sticky top-32">
                        <!-- Search Widget -->
                        <div class="bg-white rounded-3xl p-8 shadow-xl shadow-blue-900/5 border border-gray-100">
                            <h3 class="text-xl font-black text-brand-blue mb-6">Cari Berita</h3>
                            <div class="relative">
                                <input type="text" placeholder="Masukkan kata kunci..." class="w-full pl-6 pr-12 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-brand-blue/20 transition-all font-medium">
                                <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-brand-blue">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Related Posts -->
                        <div class="bg-white rounded-3xl p-8 shadow-xl shadow-blue-900/5 border border-gray-100">
                            <h3 class="text-xl font-black text-brand-blue mb-6">Berita Terbaru</h3>
                            <div class="space-y-6">
                                @php
                                    $recentPosts = \App\Models\InformationPost::published()->where('id', '!=', $post->id)->latest('published_at')->take(3)->get();
                                @endphp
                                @foreach($recentPosts as $recent)
                                    <a href="{{ route('information.show', $recent->slug) }}" class="group flex gap-4">
                                        <div class="w-20 h-20 rounded-2xl overflow-hidden shrink-0 border border-gray-100">
                                            @if($recent->image)
                                                <img src="{{ asset('storage/' . $recent->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-blue-50 flex items-center justify-center text-brand-blue/30">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-brand-blue transition-colors leading-snug mb-1">{{ $recent->title }}</h4>
                                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $recent->published_at ? $recent->published_at->format('d M Y') : $recent->created_at->format('d M Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
