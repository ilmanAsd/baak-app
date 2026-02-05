@extends('layouts.app')

@section('content')
    <!-- Banner Section -->
    @if(isset($sections['banner_image']))
        <div class="w-full h-[400px] relative overflow-hidden">
            <img src="{{ asset('storage/' . $sections['banner_image']) }}" alt="{{ $page->title }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h1 class="text-5xl font-black text-white uppercase tracking-widest shadow-lg">{{ $page->title }}</h1>
            </div>
        </div>
    @else
        <div class="bg-brand-blue py-20 text-center">
            <h1 class="text-5xl font-black text-white uppercase tracking-widest">{{ $page->title }}</h1>
        </div>
    @endif

    <!-- Main Content -->
    <main class="py-16 bg-white min-h-screen">
        <div class="container mx-auto px-6">
            <div class="prose prose-xl prose-slate max-w-none">
                {!! $sections['content'] ?? '' !!}
            </div>
        </div>
    </main>
@endsection