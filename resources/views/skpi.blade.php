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
                Layanan Akademik
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                Informasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Surat
                    Keterangan Pendamping Ijazah</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Panduan prosedur penerbitan dan pengambilan SKPI Universitas Kadiri.
            </p>
        </div>
    </section>

    <!-- Main Content Container -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- 1. Prosedur Pendaftaran Section -->
            <div class="p-8 md:p-16 border-b border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Prosedur Penerbitan</h2>
                        <p class="text-gray-500 mt-2">Syarat penerbitan dokumen SKPI.</p>
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
                        <h3 class="font-bold text-gray-800 mb-2">Akademik Lengkap</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Telah menyelesaikan seluruh persyaratan akademik
                            dan lulus semua mata kuliah yang dipersyaratkan.</p>
                    </div>

                    <!-- Step 2 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-brand-blue mb-4 group-hover:scale-110 transition-transform">
                            <span class="font-bold">2</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Lulus TA/Skripsi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Telah menyelesaikan dan dinyatakan lulus ujian
                            skripsi, tesis, atau tugas akhir lainnya.</p>
                    </div>

                    <!-- Step 3 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform">
                            <span class="font-bold">3</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Bebas Tanggungan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Tidak memiliki tunggakan biaya pendidikan atau
                            kewajiban finansial lainnya kepada universitas.</p>
                    </div>

                    <!-- Step 4 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1 lg:col-span-3">
                        <div
                            class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:scale-110 transition-transform">
                            <span class="font-bold">✓</span>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Data Prestasi & Sertifikat</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Telah mengumpulkan data prestasi, sertifikat
                            kompetensi, dan kegiatan kemahasiswaan selama masa studi untuk dicantumkan dalam SKPI.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Alur Pengambilan SKPI -->
            <div class="p-8 md:p-16 bg-gray-50/50 border-b border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Alur Ambil SKPI</h2>
                        <p class="text-gray-500 mt-2">Proses pengambilan dokumen SKPI.</p>
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
                                <h3 class="font-bold text-gray-800">Lunas Administrasi</h3>
                                <p class="text-gray-600 text-sm mt-1">Mahasiswa harus sudah terbebas dari tanggungan biaya
                                    kuliah dan administrasi lainnya.</p>
                            </div>
                        </div>

                        <!-- Node 2 -->
                        <div class="relative flex items-center group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                            </div>
                            <div
                                class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                <h3 class="font-bold text-gray-800">Validasi Data SKPI</h3>
                                <p class="text-gray-600 text-sm mt-1">Melakukan validasi draft SKPI melalui sistem atau
                                    admin fakultas sebelum dicetak.</p>
                            </div>
                        </div>

                        <!-- Node 3 -->
                        <div class="relative flex items-center group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                            </div>
                            <div
                                class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow">
                                <h3 class="font-bold text-gray-800">Cetak & Tanda Tangan</h3>
                                <p class="text-gray-600 text-sm mt-1">Dokumen SKPI dicetak dan ditandatangani oleh pejabat
                                    berwenang (Dekan/Wakil Dekan).</p>
                            </div>
                        </div>

                        <!-- Node 4 -->
                        <div class="relative flex items-center group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-5 h-5 bg-gray-300 group-hover:bg-green-500 rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform">
                            </div>
                            <div
                                class="ml-24 bg-white p-6 rounded-xl border border-gray-100 shadow-sm w-full group-hover:shadow-md transition-shadow border-l-4 border-l-green-500">
                                <h3 class="font-bold text-gray-800">Ambil SKPI (Fakultas)</h3>
                                <p class="text-gray-600 text-sm mt-1">Mengambil dokumen SKPI asli di bagian Tata Usaha
                                    Fakultas masing-masing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Layanan Legalisir Section (Optional for SKPI, but included for structure consistency) -->
            <div class="p-8 md:p-16">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Layanan Legalisir SKPI</h2>
                        <p class="text-gray-500 mt-2">Prosedur legalisir dokumen SKPI.</p>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                        3</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Card 1 -->
                    <div class="p-8 bg-blue-50 border border-blue-100 rounded-2xl">
                        <h3 class="text-xl font-bold text-brand-blue mb-4">Persyaratan Dokumen</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>SKPI Asli:</strong> Wajib dibawa untuk verifikasi.</span>
                            </li>
                            <li class="flex items-start space-x-3 text-gray-700">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Fotokopi SKPI:</strong> Bawa salinan dokumen yang ingin dilegalisir
                                    secukupnya.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Card 2 -->
                    <div class="p-8 bg-purple-50 border border-purple-100 rounded-2xl">
                        <h3 class="text-xl font-bold text-purple-900 mb-4">Lokasi Pelayanan</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3 text-gray-700">
                                <div class="px-2 py-0.5 bg-purple-200 text-purple-800 text-xs font-bold rounded mt-0.5">
                                    Fakultas</div>
                                <span><strong>Semua Angkatan:</strong> Legalisir SKPI dilakukan di <strong>Fakultas</strong>
                                    masing-masing.</span>
                            </li>
                        </ul>
                    </div>
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