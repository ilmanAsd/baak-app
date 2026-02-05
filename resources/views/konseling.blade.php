@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-brand-blue">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-brand-blue to-purple-900"></div>
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="container relative z-10 mx-auto px-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-brand-yellow/10 text-brand-yellow text-sm font-semibold mb-6 border border-brand-yellow/20 backdrop-blur-sm">
                Layanan Kemahasiswaan
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                Layanan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Konseling
                    Mahasiswa</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Dukungan profesional dan rahasia untuk kesejahteraan mental dan kesuksesan akademik Anda.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-16 -mt-20 relative z-10">
        <!-- Intro Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-24">
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-brand-blue">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kerahasiaan Terjamin</h3>
                <p class="text-sm text-gray-500">Sesi konseling bersifat rahasia dan aman.</p>
            </div>
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl transition-all duration-300">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-green-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Konselor Profesional</h3>
                <p class="text-sm text-gray-500">Ditangani oleh ahli bersertifikasi.</p>
            </div>
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl transition-all duration-300">
                <div
                    class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-purple-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Pendekatan Komprehensif</h3>
                <p class="text-sm text-gray-500">Menyesuaikan kebutuhan unik setiap mahasiswa.</p>
            </div>
            <div
                class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl transition-all duration-300">
                <div
                    class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-yellow-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Dukungan Berkelanjutan</h3>
                <p class="text-sm text-gray-500">Proses untuk mencapai kesejahteraan optimal.</p>
            </div>
        </div>

        <!-- Team Counselors -->
        <div class="mb-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brand-blue mb-4">Tim Konselor Kami</h2>
                <p class="text-gray-500">Profesional yang siap mendengarkan dan membantu Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($counselors as $counselor)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
                        <div class="h-64 overflow-hidden bg-gray-200 relative">
                            @if($counselor->image)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($counselor->image) }}"
                                    alt="{{ $counselor->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-300">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            @endif
                            <div
                                class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent p-6 pt-12">
                                <h3 class="text-white font-bold text-lg leading-tight">{{ $counselor->name }}</h3>
                                <p class="text-brand-yellow text-sm font-medium">{{ $counselor->title }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $counselor->specialty }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Registration & Schedule -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-24">
            <!-- Schedule Info -->
            <div class="lg:col-span-1">
                <h2 class="text-3xl font-bold text-brand-blue mb-6">Pendaftaran Konseling</h2>
                <p class="text-gray-600 mb-8">Daftar untuk sesi konseling dengan mengisi formulir atau menghubungi kami.</p>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0 mt-1">
                            1</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Pilih Konselor</h4>
                            <p class="text-sm text-gray-500">Sesuaikan dengan kebutuhanmu.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0 mt-1">
                            2</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Isi Formulir</h4>
                            <p class="text-sm text-gray-500">Lengkapi data diri dan topik.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-brand-blue flex-shrink-0 mt-1">
                            3</div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Konfirmasi</h4>
                            <p class="text-sm text-gray-500">Tunggu jadwal dari admin.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-blue-50 rounded-2xl border border-blue-100">
                    <h4 class="font-bold text-brand-blue mb-2">Butuh Bantuan Cepat?</h4>
                    <p class="text-sm text-blue-800 mb-4">Chat kami via WhatsApp untuk respon instan.</p>
                    <a href="https://wa.me/6285735090472" target="_blank"
                        class="inline-flex items-center justify-center w-full px-4 py-2 bg-green-500 text-white rounded-xl font-bold hover:bg-green-600 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        Chat WhatsApp
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Formulir Pendaftaran</h3>
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue"
                                    placeholder="Nama Anda" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                                <input type="text" name="nim"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue"
                                    placeholder="Nomor Induk Mahasiswa" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Program Studi</label>
                                <input type="text" name="prodi"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue"
                                    placeholder="Contoh: Teknik Informatika" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor WhatsApp</label>
                                <input type="tel" name="phone"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue"
                                    placeholder="08xxxxxxxx" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Konselor (Opsional)</label>
                            <select name="counselor_id"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue">
                                <option value="">-- Bebas / Belum Memilih --</option>
                                @foreach($counselors as $counselor)
                                    <option value="{{ $counselor->id }}">{{ $counselor->name }} - {{ $counselor->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Topik Konseling</label>
                            <textarea name="topic" rows="4"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-brand-blue focus:border-brand-blue"
                                placeholder="Ceritakan singkat apa yang ingin Anda konsultasikan..." required></textarea>
                        </div>
                        <button type="button"
                            class="w-full py-4 bg-brand-blue text-white font-bold rounded-xl hover:bg-blue-800 transition-colors shadow-lg shadow-blue-900/20">
                            Kirim Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="max-w-3xl mx-auto" x-data="{ expanded: null }">
            <h2 class="text-3xl font-bold text-brand-blue mb-8 text-center">Pertanyaan Umum</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button @click="expanded = expanded === 1 ? null : 1"
                        class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                        Apakah layanan ini gratis?
                        <svg class="w-5 h-5 transition-transform" :class="expanded === 1 ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="expanded === 1"
                        class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                        Ya, layanan konseling di Universitas Kadiri disediakan secara gratis untuk semua mahasiswa aktif.
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button @click="expanded = expanded === 2 ? null : 2"
                        class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                        Apakah kerahasiaan terjamin?
                        <svg class="w-5 h-5 transition-transform" :class="expanded === 2 ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="expanded === 2"
                        class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                        Ya, semua sesi bersifat rahasia. Informasi Anda tidak akan dibagikan tanpa persetujuan, kecuali
                        dalam kondisi darurat tertentu.
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <button @click="expanded = expanded === 3 ? null : 3"
                        class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                        Berapa lama durasi konseling?
                        <svg class="w-5 h-5 transition-transform" :class="expanded === 3 ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="expanded === 3"
                        class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                        Setiap sesi berlangsung sekitar 50-60 menit. Sesi pertama mungkin lebih lama untuk asesmen awal.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection