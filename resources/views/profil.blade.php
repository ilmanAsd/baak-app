@extends('layouts.app')

@section('content')
    @php
        use App\Models\ProfileContent;
        $profile = ProfileContent::first();
    @endphp

    <!-- Header Section (Tentang Kami) -->
    <section class="bg-brand-blue py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-brand-yellow mb-6">Tentang Kami</h1>
            <div class="max-w-3xl mx-auto bg-white bg-opacity-10 backdrop-blur-sm p-6 rounded-xl border border-white border-opacity-20 shadow-2xl">
                <div class="text-white text-lg leading-relaxed font-light">
                    {!! $profile?->about_us ?? 'Konten belum tersedia.' !!}
                </div>
            </div>
            <div class="w-24 h-1 bg-brand-yellow mx-auto mt-8"></div>
        </div>
    </section>

    <!-- Structural Organization Image Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-brand-blue mb-8 text-center border-b-2 border-gray-100 pb-4">Struktur Organisasi</h2>
            
            <div class="w-full flex justify-center mb-16">
                <!-- 1140px x 603px Image Container -->
                <div class="w-full max-w-[1140px] aspect-[1140/603] bg-gray-50 rounded-lg shadow-lg overflow-hidden relative group border border-gray-100">
                    <!-- Placeholder using default if no image -->
                     @if($profile && $profile->structure_image)
                        <img src="{{ asset('storage/' . $profile->structure_image) }}" alt="Struktur Organisasi" class="w-full h-full object-contain">
                    @else
                        <!-- Placeholder -->
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <span class="text-lg font-medium">Bagan Struktur Organisasi (Isi di Admin Panel)</span>
                            </div>
                        </div>
                        <img src="https://placehold.co/1140x603/EEE/31343C?text=Struktur+Organisasi" alt="Struktur Organisasi" class="w-full h-full object-contain relative z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    @endif
                </div>
            </div>

            <!-- Personnel Profiles -->
            @php
                use App\Models\Staff;
                $kepala = Staff::where('category', 'kepala_biro')->first();
                $categories = ['akademik', 'pembelajaran', 'kemahasiswaan'];
            @endphp

            <div class="space-y-16">
                <!-- 1. Kepala Biro (Single - Centered) -->
                @if($kepala)
                <div class="flex justify-center">
                    <div class="w-full max-w-md">
                        <div class="bg-white rounded-xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 border-t-4 border-brand-yellow flex flex-col transform hover:-translate-y-2">
                            <!-- Photo -->
                            <div class="aspect-[4/3] overflow-hidden relative bg-brand-blue">
                                <img src="{{ $kepala->image ? asset('storage/' . $kepala->image) : 'https://ui-avatars.com/api/?name='.urlencode($kepala->name).'&background=192E5B&color=fff&size=500' }}" alt="{{ $kepala->name }}" class="w-full h-full object-cover">
                                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900 to-transparent p-4 pt-12 text-center">
                                    <span class="bg-brand-yellow text-brand-blue font-bold text-sm uppercase tracking-wider px-3 py-1 rounded-full shadow-lg">{{ $kepala->position }}</span>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-brand-blue mb-2 text-center">{{ $kepala->name }}</h3>
                                
                                <!-- Social Icons for Kepala -->
                                <div class="flex justify-center space-x-4 mb-4">
                                    @if($kepala->facebook) <a href="{{ $kepala->facebook }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a> @endif
                                    @if($kepala->twitter) <a href="{{ $kepala->twitter }}" target="_blank" class="text-gray-400 hover:text-blue-400 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></a> @endif
                                    @if($kepala->instagram) <a href="{{ $kepala->instagram }}" target="_blank" class="text-gray-400 hover:text-pink-600 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a> @endif
                                </div>

                                <!-- Tabs -->
                                <div x-data="{ activeTab: 'profil' }" class="flex-grow flex flex-col">
                                    <div class="flex border-b border-gray-200 mb-4 justify-center">
                                        <button @click="activeTab = 'profil'" class="px-6 py-2 text-sm font-medium transition-colors border-b-2" :class="{ 'border-brand-blue text-brand-blue': activeTab === 'profil', 'border-transparent text-gray-500': activeTab !== 'profil' }">Biodata</button>
                                        <button @click="activeTab = 'tugas'" class="px-6 py-2 text-sm font-medium transition-colors border-b-2" :class="{ 'border-brand-blue text-brand-blue': activeTab === 'tugas', 'border-transparent text-gray-500': activeTab !== 'tugas' }">Tugas Pokok</button>
                                    </div>
                                    <div class="min-h-[80px] text-center">
                                        <div x-show="activeTab === 'profil'" x-transition.opacity><p class="text-sm text-gray-600">{{ $kepala->bio }}</p></div>
                                        <div x-show="activeTab === 'tugas'" x-transition.opacity style="display: none;"><p class="text-sm text-gray-600">{{ $kepala->duties }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- 2. Kabag Sections (3 Columns) -->
                <div>
                    <h3 class="text-xl font-bold text-brand-blue mb-8 text-center uppercase tracking-widest opacity-80">Kepala Bagian</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($categories as $category)
                            @php
                                // Fetch Kabag for this category
                                $kabag = Staff::where('category', $category)->where('is_head', true)->first();
                                // Fetch Staff for this category
                                $staffMembers = Staff::where('category', $category)->where('is_head', false)->get();
                            @endphp

                            @if($kabag)
                            <div class="flex flex-col space-y-6">
                                <!-- Kabag Card -->
                                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col group relative z-10">
                                    <div class="aspect-[4/3] overflow-hidden relative bg-gray-200">
                                        <img src="{{ $kabag->image ? asset('storage/' . $kabag->image) : 'https://ui-avatars.com/api/?name='.urlencode($kabag->name).'&background=192E5B&color=fff&size=500' }}" alt="{{ $kabag->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900 to-transparent p-4 pt-10">
                                            <span class="text-white text-xs font-bold uppercase tracking-wider opacity-90">{{ $kabag->position }}</span>
                                        </div>
                                    </div>
                                    <div class="p-5 flex-grow flex flex-col">
                                        <h3 class="text-lg font-bold text-brand-blue mb-2 text-center">{{ $kabag->name }}</h3>
                                        
                                        <!-- Social Icons -->
                                        <div class="flex justify-center space-x-3 mb-4">
                                            @if($kabag->facebook) <a href="{{ $kabag->facebook }}" target="_blank" class="text-gray-300 hover:text-blue-600"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a> @endif
                                            @if($kabag->twitter) <a href="{{ $kabag->twitter }}" target="_blank" class="text-gray-300 hover:text-blue-400"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></a> @endif
                                            @if($kabag->instagram) <a href="{{ $kabag->instagram }}" target="_blank" class="text-gray-300 hover:text-pink-600"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a> @endif
                                        </div>
                                        <!-- Tabs -->
                                        <div x-data="{ activeTab: 'profil' }" class="flex-grow flex flex-col">
                                            <div class="flex border-b border-gray-100 mb-2">
                                                <button @click="activeTab = 'profil'" class="flex-1 py-1 text-xs font-medium text-center transition-colors" :class="{ 'text-brand-blue border-b-2 border-brand-blue': activeTab === 'profil', 'text-gray-400': activeTab !== 'profil' }">Biodata</button>
                                                <button @click="activeTab = 'tugas'" class="flex-1 py-1 text-xs font-medium text-center transition-colors" :class="{ 'text-brand-blue border-b-2 border-brand-blue': activeTab === 'tugas', 'text-gray-400': activeTab !== 'tugas' }">Tugas</button>
                                            </div>
                                            <div class="h-[60px] overflow-y-auto custom-scrollbar">
                                                 <div x-show="activeTab === 'profil'" class="text-xs text-center text-gray-500">{{ $kabag->bio }}</div>
                                                 <div x-show="activeTab === 'tugas'" class="text-xs text-center text-gray-500" style="display: none;">{{ $kabag->duties }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Staff Members -->
                                <div class="pl-4 border-l-2 border-gray-200 space-y-4">
                                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest pl-2">Anggota Bagian</h4>
                                    @foreach($staffMembers as $staff)
                                        <div class="bg-white rounded-lg p-3 shadow-sm border border-gray-100 flex items-center space-x-3 hover:shadow-md transition-shadow">
                                            <img src="{{ $staff->image ? asset('storage/' . $staff->image) : 'https://ui-avatars.com/api/?name='.urlencode($staff->name).'&background=f0f0f0&color=333&size=200' }}" alt="{{ $staff->name }}" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                                            <div class="flex-grow">
                                                <p class="text-sm font-bold text-gray-700 leading-tight">{{ $staff->name }}</p>
                                                <p class="text-xs text-gray-500">{{ $staff->position }}</p>
                                            </div>
                                            <!-- Staff Socials -->
                                            <div class="flex space-x-1"> 
                                                @if($staff->instagram) <a href="{{ $staff->instagram }}" class="text-gray-400 hover:text-pink-500"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a> @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection