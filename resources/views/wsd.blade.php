@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-brand-blue">
        <!-- Background Pattern & Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-brand-blue to-purple-900"></div>
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <!-- Animated Shapes -->
        <div
            class="absolute -top-24 -right-24 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-24 -left-24 w-96 h-96 bg-brand-yellow rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000">
        </div>

        <div class="container relative z-10 mx-auto px-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-brand-yellow/10 text-brand-yellow text-sm font-semibold mb-6 border border-brand-yellow/20 backdrop-blur-sm">
                Informasi Akademik
            </span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight leading-tight">
                Informasi & Pengumuman <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Wisuda</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Panduan lengkap prosedur pendaftaran, alur, dan persyaratan wisuda Universitas Kadiri.
            </p>
        </div>
    </section>

    <!-- Main Content Container with Tabs -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24" x-data="{ activeTab: 'persyaratan' }">

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- Tab Navigation -->
            <div class="flex flex-wrap border-b border-gray-200 bg-gray-50/50">
                <button @click="activeTab = 'persyaratan'"
                    :class="{ 'bg-white text-brand-blue border-b-2 border-brand-yellow shadow-sm relative z-10': activeTab === 'persyaratan', 'text-gray-500 hover:text-gray-700': activeTab !== 'persyaratan' }"
                    class="flex-1 py-4 px-6 text-center font-bold text-sm md:text-base transition-all duration-300 focus:outline-none">
                    Persyaratan & Prosedur
                </button>
                <button @click="activeTab = 'jadwal'"
                    :class="{ 'bg-white text-brand-blue border-b-2 border-brand-yellow shadow-sm relative z-10': activeTab === 'jadwal', 'text-gray-500 hover:text-gray-700': activeTab !== 'jadwal' }"
                    class="flex-1 py-4 px-6 text-center font-bold text-sm md:text-base transition-all duration-300 focus:outline-none">
                    Jadwal Wisuda
                </button>
                <button @click="activeTab = 'dokumentasi'"
                    :class="{ 'bg-white text-brand-blue border-b-2 border-brand-yellow shadow-sm relative z-10': activeTab === 'dokumentasi', 'text-gray-500 hover:text-gray-700': activeTab !== 'dokumentasi' }"
                    class="flex-1 py-4 px-6 text-center font-bold text-sm md:text-base transition-all duration-300 focus:outline-none">
                    Dokumentasi Foto
                </button>
            </div>

            <!-- Tab Content: Persyaratan (Original Content) -->
            <div x-show="activeTab === 'persyaratan'" x-transition.opacity.duration.300ms>
                <!-- 1. Prosedur Pendaftaran Section -->
                <div class="p-8 md:p-16 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-3xl font-bold text-brand-blue">Prosedur Pendaftaran</h2>
                            <p class="text-gray-500 mt-2">Tahapan awal pendaftaran wisuda.</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                            1</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Step 1 -->
                        <div
                            class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                            <div
                                class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:scale-110 transition-transform">
                                <span class="font-bold">1</span>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">Status Lulus</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Proses dimulai setelah status kemahasiswaan
                                berubah menjadi Lulus di sistem.</p>
                        </div>

                        <!-- Step 2 -->
                        <div
                            class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-brand-blue mb-4 group-hover:scale-110 transition-transform">
                                <span class="font-bold">2</span>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">Pembayaran Ijazah</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Melakukan pembayaran tagihan ijazah yang
                                tersedia di menu keuangan SIAM.</p>
                        </div>

                        <!-- Step 3 -->
                        <div
                            class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                            <div
                                class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform">
                                <span class="font-bold">3</span>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">Daftar Fakultas</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Mendaftar melalui admin fakultas masing-masing
                                untuk pendataan awal.</p>
                        </div>

                        <!-- Step 4 -->
                        <div
                            class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1 lg:col-span-2">
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:scale-110 transition-transform">
                                <span class="font-bold">!</span>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">Verifikasi Data</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Perhatikan detail dan teliti dalam pengisian
                                data. Sangat penting karena <strong>tidak ada perbaikan data</strong> setelah lolos
                                verifikasi akhir.</p>
                        </div>

                        <!-- Step 5 -->
                        <div
                            class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                            <div
                                class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center text-pink-600 mb-4 group-hover:scale-110 transition-transform">
                                <span class="font-bold">✓</span>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">Atribut Wisuda</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">Pengambilan toga dan undangan dilaksanakan
                                sesuai jadwal yang diumumkan.</p>
                        </div>
                    </div>
                </div>

                <!-- 2. Skema Alur Section -->
                <div class="p-8 md:p-16 bg-gray-50/50 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-3xl font-bold text-brand-blue">Skema Alur Wisuda</h2>
                            <p class="text-gray-500 mt-2">Perjalanan dari Yudisium hingga Wisuda.</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                            2</div>
                    </div>

                    <div class="relative max-w-4xl mx-auto">
                        <!-- Connector Line -->
                        <div
                            class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-yellow via-gray-300 to-transparent">
                        </div>

                        <div class="space-y-10">
                            <!-- Node 1 -->
                            <div class="relative flex items-center group">
                                <div
                                    class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-brand-yellow rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                                </div>
                                <div
                                    class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-800">Yudisium</h3>
                                    <p class="text-gray-600 text-sm mt-1">Mahasiswa melaksanakan dan menyelesaikan proses
                                        yudisium sesuai prosedur yang berlaku.</p>
                                </div>
                            </div>

                            <!-- Node 2 -->
                            <div class="relative flex items-center group">
                                <div
                                    class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                                </div>
                                <div
                                    class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-800">Administrasi Akademik</h3>
                                    <p class="text-gray-600 text-sm mt-1">Menyelesaikan tanggungan administrasi seperti
                                        tugas akhir, laporan, dan dokumen wisuda lainnya.</p>
                                </div>
                            </div>

                            <!-- Node 3 -->
                            <div class="relative flex items-center group">
                                <div
                                    class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                                </div>
                                <div
                                    class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-800">Administrasi Keuangan</h3>
                                    <p class="text-gray-600 text-sm mt-1">Lunas semua tanggungan biaya keuangan akademik dan
                                        melakukan pembayaran wisuda.</p>
                                </div>
                            </div>

                            <!-- Node 4 -->
                            <div class="relative flex items-center group">
                                <div
                                    class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                                </div>
                                <div
                                    class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-800">Daftar Online (SIAM)</h3>
                                    <p class="text-gray-600 text-sm mt-1">Melakukan pendaftaran wisuda secara online melalui
                                        portal <a href="https://siam.unik-kediri.ac.id"
                                            class="text-blue-600 hover:underline">siam.unik-kediri.ac.id</a>.</p>
                                </div>
                            </div>

                            <!-- Node 5 -->
                            <div class="relative flex items-center group">
                                <div
                                    class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-green-500 rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                                </div>
                                <div
                                    class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow border-l-4 border-l-green-500">
                                    <h3 class="font-bold text-gray-800">Menunggu Jadwal</h3>
                                    <p class="text-gray-600 text-sm mt-1">Setelah semua persyaratan lengkap & terverifikasi,
                                        mahasiswa tinggal menunggu jadwal pelaksanaan wisuda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Rangkuman Persyaratan Section -->
                <div class="p-8 md:p-16">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                        <div class="mb-4 md:mb-0">
                            <h2 class="text-3xl font-bold text-brand-blue">Rangkuman Syarat</h2>
                            <p class="text-gray-500 mt-2">Daftar periksa kelengkapan persyaratan wisuda.</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                            3</div>
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100">
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Telah menyelesaikan seluruh kewajiban akademik.</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Telah menyelesaikan seluruh kewajiban administrasi & keuangan.</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Telah lulus ujian skripsi / tugas akhir.</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Mengisi formulir pendaftaran wisuda online.</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Menyerahkan pas foto warna 4x6 (4 lembar, background merah).</span>
                            </li>
                            <li class="flex items-center space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Melampirkan fotokopi KTP dan Kartu Keluarga.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @php
                $schedules = \App\Models\WisudaSchedule::where('is_active', true)->orderBy('year', 'desc')->get();
            @endphp

            <!-- Tab Content: Jadwal Wisuda -->
            <div x-show="activeTab === 'jadwal'" style="display: none;" x-transition.opacity.duration.300ms
                class="p-8 md:p-16 min-h-[400px]">
                <div class="max-w-4xl mx-auto space-y-4">
                    <h2 class="text-2xl font-bold text-center text-brand-blue mb-8">Arsip Jadwal Wisuda</h2>

                    @forelse($schedules as $schedule)
                        <div class="border border-gray-200 rounded-lg overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full flex items-center justify-between p-4 bg-brand-yellow text-brand-blue font-bold hover:bg-yellow-500 transition-colors">
                                <span>Wisuda Periode {{ $schedule->year }}</span>
                                <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': open}" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" class="p-6 bg-white border-t border-gray-100" style="display: none;">
                                <ul class="space-y-4 list-disc pl-5">
                                    @if($schedule->schedule_genap_link)
                                        <li>
                                            <strong>Jadwal Wisuda Periode {{ $schedule->year }} Genap</strong>
                                            <div class="mt-1">
                                                <a href="{{ $schedule->schedule_genap_link }}" target="_blank"
                                                    class="text-blue-600 hover:underline flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                    Klik disini
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                    @if($schedule->schedule_ganjil_link)
                                        <li>
                                            <strong>Jadwal Wisuda Periode {{ $schedule->year }} Ganjil</strong>
                                            <div class="mt-1">
                                                <a href="{{ $schedule->schedule_ganjil_link }}" target="_blank"
                                                    class="text-blue-600 hover:underline flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                        </path>
                                                    </svg>
                                                    Klik disini
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                    @if(!$schedule->schedule_genap_link && !$schedule->schedule_ganjil_link)
                                        <li class="text-gray-400 italic">Belum ada jadwal untuk periode ini.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <p class="text-gray-500">Belum ada data jadwal wisuda.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Tab Content: Dokumentasi Foto -->
            <div x-show="activeTab === 'dokumentasi'" style="display: none;" x-transition.opacity.duration.300ms
                class="p-8 md:p-16 min-h-[400px]">
                <div class="max-w-4xl mx-auto space-y-4">
                    <h2 class="text-2xl font-bold text-center text-brand-blue mb-8">Dokumentasi Foto Wisuda</h2>

                    @forelse($schedules as $schedule)
                        <div class="border border-gray-200 rounded-lg overflow-hidden" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full flex items-center justify-between p-4 bg-gray-100/80 text-gray-800 font-bold hover:bg-gray-200 transition-colors">
                                <span>Foto Wisuda Periode {{ $schedule->year }}</span>
                                <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': open}" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="open" class="p-6 bg-white border-t border-gray-100" style="display: none;">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @if($schedule->photo_genap_link)
                                        <a href="{{ $schedule->photo_genap_link }}" target="_blank" class="block group">
                                            <div
                                                class="p-6 bg-blue-50 border border-blue-100 rounded-xl hover:shadow-md transition-shadow text-center">
                                                <span class="text-blue-600 font-bold block mb-2">Periode Genap</span>
                                                <span
                                                    class="text-sm text-gray-600 group-hover:text-blue-500 flex justify-center items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    Lihat Foto
                                                </span>
                                            </div>
                                        </a>
                                    @endif
                                    @if($schedule->photo_ganjil_link)
                                        <a href="{{ $schedule->photo_ganjil_link }}" target="_blank" class="block group">
                                            <div
                                                class="p-6 bg-purple-50 border border-purple-100 rounded-xl hover:shadow-md transition-shadow text-center">
                                                <span class="text-purple-600 font-bold block mb-2">Periode Ganjil</span>
                                                <span
                                                    class="text-sm text-gray-600 group-hover:text-purple-500 flex justify-center items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    Lihat Foto
                                                </span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                @if(!$schedule->photo_genap_link && !$schedule->photo_ganjil_link)
                                    <p class="text-center text-gray-400 italic">Belum ada dokumentasi untuk periode ini.</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            <p class="text-gray-500">Belum ada data dokumentasi.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Animation Styles -->
    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
@endsection