@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[500px] flex items-center justify-center overflow-hidden">
        <!-- Cinematic Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-brand-blue/80 via-brand-blue/40 to-white z-10"></div>
            @if($setting->banner_image)
                <div class="w-full h-full bg-cover bg-center opacity-40"
                    style="background-image: url('{{ asset('storage/' . $setting->banner_image) }}');">
                </div>
            @else
                <div class="w-full h-full bg-brand-blue opacity-40"></div>
            @endif
        </div>

        <!-- Content Container -->
        <div class="relative z-20 w-full max-w-5xl px-6 py-20 text-center">
            <div class="flex flex-col items-center gap-8">
                <!-- Top Badge -->
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-brand-yellow/30 bg-brand-yellow/10 px-5 py-2 text-xs font-black uppercase tracking-[0.2em] text-brand-yellow backdrop-blur-sm">
                    <span class="material-symbols-outlined text-[16px]">groups</span>
                    Laman Kemahasiswaan
                </div>

                <!-- Headline -->
                <h1 class="text-4xl md:text-7xl font-black leading-[1.1] tracking-[-0.04em] text-white">
                    {{ $setting->title }}
                </h1>

                <!-- Subheadline -->
                <p class="max-w-2xl text-lg md:text-xl font-medium leading-relaxed text-blue-50/80">
                    {{ $setting->description }}
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50 text-white">
            <span class="text-[10px] font-black uppercase tracking-[0.3em]">Explore</span>
            <span class="material-symbols-outlined text-brand-yellow animate-bounce">expand_more</span>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-20 max-w-6xl space-y-24">

        <!-- Section: Sambutan Wakil Rektor -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Foto Rector -->
            <div class="relative group order-2 lg:order-1">
                <div
                    class="absolute -inset-4 bg-gradient-to-r from-brand-yellow to-brand-blue opacity-20 blur-2xl group-hover:opacity-30 transition-opacity">
                </div>
                <div
                    class="relative bg-white p-2 rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden aspect-[3/4] flex items-center justify-center">
                    @if($setting->rector_image)
                        <img src="{{ asset('storage/' . $setting->rector_image) }}" alt="{{ $setting->rector_name }}"
                            class="w-full h-full object-cover rounded-2xl">
                    @else
                        <div class="text-center p-12">
                            <div
                                class="w-20 h-20 bg-brand-blue/5 rounded-full flex items-center justify-center mx-auto mb-6 text-brand-blue">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 italic uppercase tracking-tighter">Foto Wakil Rektor</h4>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Greeting Text -->
            <div class="space-y-6 order-1 lg:order-2">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-brand-yellow/10 text-brand-blue rounded-full border border-brand-yellow/20">
                    <span class="w-2 h-2 bg-brand-yellow rounded-full animate-pulse"></span>
                    <span
                        class="text-xs font-black uppercase tracking-widest italic">{{ $setting->rector_greeting_title }}</span>
                </div>
                <h2 class="text-4xl font-black text-brand-blue tracking-tight leading-tight">{{ $setting->rector_name }}
                </h2>
                <div class="text-gray-600 leading-relaxed text-lg prose max-w-none">
                    {!! $setting->rector_greeting_content !!}
                </div>
            </div>
        </section>

        <!-- Section: Tentang Kemahasiswaan -->
        <section class="relative -mx-4 px-4 py-24 bg-brand-blue text-white overflow-hidden">
            <!-- Background Decorative Elements -->
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-brand-yellow/10 rounded-full blur-3xl"></div>
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>

            <div class="container mx-auto max-w-6xl relative z-10">
                <div class="text-center mb-16 space-y-4">
                    <h2 class="text-4xl font-black uppercase tracking-tight">Tentang Kemahasiswaan</h2>
                    <div class="w-16 h-1 bg-brand-yellow mx-auto rounded-full"></div>
                    <p class="max-w-3xl mx-auto text-lg opacity-80 leading-relaxed">
                        {{ $setting->about_description ?? 'Kemahasiswaan Universitas Kadiri merupakan salah satu unit pelayanan bagi mahasiswa Universitas Kadiri yang berada di bawah naungan Wakil Rektor III (Bidang Kemahasiswaan dan Alumni). Kami berkomitmen untuk memberikan pelayanan terbaik agar informasi terkait kegiatan kemahasiswaan dapat tersampaikan dengan baik.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                    <!-- Left: Services Checklist -->
                    <div class="space-y-8">
                        <h3 class="text-2xl font-bold italic border-l-4 border-brand-yellow pl-4">Pelayanan yang diberikan
                            antara lain:</h3>
                        <ul class="space-y-4">
                            @php
                                $services = [
                                    'Pelayanan Minat Bakat Mahasiswa',
                                    'Pelayanan Beasiswa',
                                    'Pelayanan Konseling',
                                    'Pelayanan Mahasiswa Asing',
                                    'Pelayanan Kegiatan Ormawa dan Kompetisi',
                                    'Pelayanan Pengaduan Mahasiswa'
                                ];
                            @endphp
                            @foreach($services as $service)
                                <li class="flex items-center gap-4 group">
                                    <div
                                        class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span
                                        class="text-lg font-medium opacity-90 group-hover:opacity-100 transition-opacity">{{ $service }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Right: Stats Cards -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Staff Card -->
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl text-center hover:bg-white/20 transition-all group">
                            <div
                                class="w-16 h-16 bg-brand-yellow/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-brand-yellow" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold uppercase tracking-widest opacity-60 mb-2">Staff</h4>
                            <span class="text-4xl font-black">{{ $setting->stat_staff ?? 0 }}</span>
                        </div>

                        <!-- Prestasi Card -->
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl text-center hover:bg-white/20 transition-all group">
                            <div
                                class="w-16 h-16 bg-brand-yellow/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-brand-yellow" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 5H18V3H6V5H5C3.89 5 3 5.89 3 7V11C3 13.21 4.79 15 7 15H8.09C8.97 17.39 10.96 19 13.5 19V21H18V19.34C20.26 18.24 22 15.96 22 13V7C22 5.89 21.11 5 20 5H19ZM5 7H6V11C6 11.55 5.55 12 5 12C4.45 12 4 11.55 4 11V7ZM7 11V7H17V11C17 12.93 15.43 14.5 13.5 14.5C11.57 14.5 10 12.93 10 11H7ZM20 11C20 11.55 19.55 12 19 12C18.45 12 18 11.55 18 11V7H20V11Z" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold uppercase tracking-widest opacity-60 mb-2">Prestasi</h4>
                            <span class="text-4xl font-black">{{ $achievementCount ?? 0 }}</span>
                        </div>

                        <!-- Ormawa Card -->
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl text-center hover:bg-white/20 transition-all group">
                            <div
                                class="w-16 h-16 bg-brand-yellow/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-brand-yellow" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 7V3H2V21H22V7H12ZM10 19H4V17H10V19ZM10 15H4V13H10V15ZM10 11H4V9H10V11ZM10 7H4V5H10V7ZM20 19H12V17H20V19ZM20 15H12V13H20V15ZM20 11H12V9H20V11Z" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold uppercase tracking-widest opacity-60 mb-2">Ormawa</h4>
                            <span class="text-4xl font-black">{{ $setting->stat_ormawa ?? 0 }}</span>
                        </div>

                        <!-- UKM Card -->
                        <div
                            class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl text-center hover:bg-white/20 transition-all group">
                            <div
                                class="w-16 h-16 bg-brand-yellow/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-brand-yellow" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-9 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V18h6v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold uppercase tracking-widest opacity-60 mb-2">UKM</h4>
                            <span class="text-4xl font-black">{{ $setting->stat_ukm ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="space-y-12" x-data="{ selectedYear: '' }">
            <div class="text-center space-y-4">
                <h2 class="text-4xl font-black text-brand-blue tracking-tight">Prestasi Mahasiswa</h2>
                <div class="w-20 h-1.5 bg-brand-yellow mx-auto rounded-full"></div>
                <p class="text-gray-500 max-w-2xl mx-auto">Bangga dengan pencapaian luar biasa mahasiswa kami di berbagai
                    kompetisi dan ajang bergengsi.</p>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-xl overflow-hidden">
                <div class="p-8 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <h3 class="text-xl font-bold text-brand-blue italic">Data Prestasi Mahasiswa</h3>

                    <div class="flex items-center gap-3">
                        <span class="text-sm font-bold text-gray-500 uppercase tracking-widest">Filter Tahun:</span>
                        <select x-model="selectedYear"
                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-brand-blue focus:border-brand-blue block p-2.5">
                            <option value="">Semua Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-brand-blue text-white">
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">No</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Nama Mahasiswa</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Program Studi</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Kompetisi</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Tingkat</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Prestasi</th>
                                <th class="px-6 py-4 font-black uppercase tracking-widest text-xs">Tahun</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($achievements as $index => $item)
                                <tr x-show="selectedYear === '' || selectedYear === '{{ $item->tahun }}'"
                                    class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-bold text-brand-blue">{{ $item->nama_mahasiswa }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->program_studi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->kompetisi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span
                                            class="px-3 py-1 bg-gray-100 rounded-full text-[10px] font-black uppercase tracking-widest">{{ $item->tingkat }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-emerald-600 font-bold">{{ $item->prestasi }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->tahun }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-400 italic">Belum ada data prestasi
                                        mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
@endsection