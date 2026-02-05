@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-brand-blue py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-black text-brand-yellow mb-4 uppercase italic tracking-tighter">
                {{ $sections['hero_title'] ?? $page->title }}
            </h1>
            @if(isset($sections['hero_subtitle']))
                <p class="text-white text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                    {{ $sections['hero_subtitle'] }}
                </p>
            @endif
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-16 bg-white min-h-screen">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="prose prose-lg prose-slate max-w-none">
                {!! $sections['content'] ?? '' !!}
            </div>
        </div>
    </main>
@endsection