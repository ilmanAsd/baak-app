@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 overflow-hidden bg-brand-blue">
        <!-- Background Pattern & Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-brand-blue to-blue-800"></div>
        <div class="absolute inset-0 opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <!-- Animated Shapes -->
        <div
            class="absolute -top-24 -right-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute -bottom-24 -left-24 w-96 h-96 bg-brand-yellow rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000">
        </div>

        <div class="container relative z-10 mx-auto px-4 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-brand-yellow/10 text-brand-yellow text-sm font-semibold mb-6 border border-brand-yellow/20 backdrop-blur-sm">
                Layanan Akademik Mahasiswa
            </span>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 tracking-tight leading-tight">
                Informasi <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">KRS</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Panduan lengkap pengisian Kartu Rencana Studi (KRS) dan ketentuan beban SKS untuk memastikan kelancaran
                studi Anda di setiap semester.
            </p>
        </div>
    </section>

    <!-- Main Content Container via Wrapper to pull up content -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">

        <!-- Content Card -->
        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- 1. Prosedur Section -->
            <div class="p-8 md:p-16 border-b border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Prosedur KRS</h2>
                        <p class="text-gray-500 mt-2">Langkah-langkah persiapan sebelum pengisian.</p>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                        1</div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Step Card 1 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Administrasi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mahasiswa memastikan telah memenuhi persyaratan
                            administratif (misalnya, pembayaran biaya kuliah).</p>
                    </div>

                    <!-- Step Card 2 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-brand-blue mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Cek SKS</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mahasiswa memastikan jumlah SKS yang diambil sesuai
                            dengan ketentuan beban studi maksimal.</p>
                    </div>

                    <!-- Step Card 3 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Konsultasi Dosen</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Mahasiswa mengajukan konsultasi KRS kepada dosen
                            pembimbing akademik (jika diperlukan).</p>
                    </div>

                    <!-- Step Card 4 -->
                    <div
                        class="group p-6 bg-white border border-gray-100 rounded-2xl hover:shadow-lg hover:border-blue-100 transition-all duration-300 hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Finalisasi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">KRS yang telah difinalisasi menjadi bukti sah mata
                            kuliah yang diikuti pada semester tersebut.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Ketentuan SKS Section -->
            <div class="p-8 md:p-16 bg-gray-50/50 border-b border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Ketentuan SKS</h2>
                        <p class="text-gray-500 mt-2">Beban studi maksimal berdasarkan Indeks Prestasi Semester (IPS).</p>
                    </div>
                    <div
                        class="w-12 h-12 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                        2</div>
                </div>

                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <div class="lg:w-1/3 text-gray-600 leading-relaxed">
                        <p class="mb-4">Beban Studi Per Semester untuk Program Pendidikan Sarjana (S1) dan Sarjana Terapan
                            (D-IV) ditentukan berdasarkan prestasi akademik semester sebelumnya.</p>
                        <p>Hal ini bertujuan untuk memastikan mahasiswa dapat mengikuti perkuliahan dengan optimal sesuai
                            dengan kemampuannya.</p>
                        <div class="mt-6 p-4 bg-yellow-50 border-l-4 border-brand-yellow rounded-r-lg">
                            <p class="text-xs text-yellow-800 font-medium">✨ Tips: Pertahankan IPK Anda di atas 3.00 untuk
                                memaksimalkan pengambilan SKS agar lulus tepat waktu.</p>
                        </div>
                    </div>

                    <div class="lg:w-2/3 w-full">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-brand-blue text-white">
                                        <th class="p-5 text-sm font-semibold tracking-wider">Indeks Prestasi Semester (IPS)
                                        </th>
                                        <th class="p-5 text-sm font-semibold tracking-wider text-right">Beban Maksimal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td
                                            class="p-5 font-medium text-gray-600 rounded-l-lg group-hover:text-brand-blue transition-colors">
                                            < 2.00 </td>
                                        <td class="p-5 text-right font-bold text-gray-800 rounded-r-lg">18 SKS</td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td
                                            class="p-5 font-medium text-gray-600 group-hover:text-brand-blue transition-colors">
                                            2.00 - 2.49</td>
                                        <td class="p-5 text-right font-bold text-gray-800">20 SKS</td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td
                                            class="p-5 font-medium text-gray-600 group-hover:text-brand-blue transition-colors">
                                            2.50 - 2.99</td>
                                        <td class="p-5 text-right font-bold text-gray-800">22 SKS</td>
                                    </tr>
                                    <tr class="hover:bg-blue-50/50 transition-colors group">
                                        <td
                                            class="p-5 font-medium text-gray-600 text-lg group-hover:text-brand-blue transition-colors">
                                            ≥ 3.00</td>
                                        <td class="p-5 text-right font-bold text-brand-blue text-lg">24 SKS</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Alur Pengisian KRS Section -->
            <div class="p-8 md:p-16">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-16">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-3xl font-bold text-brand-blue">Alur Pengisian</h2>
                        <p class="text-gray-500 mt-2">Panduan langkah demi langkah di sistem SIAM.</p>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-brand-blue font-bold text-xl">
                        3</div>
                </div>

                <div class="relative">
                    <!-- Connector Line -->
                    <div
                        class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-brand-yellow via-gray-200 to-transparent">
                    </div>

                    <div class="space-y-12">
                        <!-- Step 1 -->
                        <div class="relative flex items-start group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-4 h-4 bg-brand-yellow rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-transform duration-300">
                            </div>
                            <div class="ml-20 flex-grow">
                                <span class="text-xs font-bold text-brand-blue uppercase tracking-widest mb-1 block">Langkah
                                    1</span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Login ke SIAM</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Akses portal akademik melalui <a href="https://siam.unik-kediri.ac.id" target="_blank"
                                        class="text-brand-blue font-semibold hover:underline decoration-2 underline-offset-2">siam.unik-kediri.ac.id</a>.
                                    Gunakan akun mahasiswa Anda untuk masuk.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative flex items-start group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-4 h-4 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-all duration-300">
                            </div>
                            <div class="ml-20 flex-grow">
                                <span
                                    class="text-xs font-bold text-gray-400 group-hover:text-brand-blue uppercase tracking-widest mb-1 block transition-colors">Langkah
                                    2</span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pilih Menu KRS</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Pada dashboard utama, navigasikan ke menu <span class="font-medium text-gray-800">Kartu
                                        Rencana Studi</span>, kemudian pilih Tahun Akademik yang aktif saat ini.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative flex items-start group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-4 h-4 bg-gray-300 group-hover:bg-brand-blue rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-all duration-300">
                            </div>
                            <div class="ml-20 flex-grow">
                                <span
                                    class="text-xs font-bold text-gray-400 group-hover:text-brand-blue uppercase tracking-widest mb-1 block transition-colors">Langkah
                                    3</span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Input Mata Kuliah</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Pilih mata kuliah yang akan diambil. Perhatikan kode mata kuliah, jadwal, dan kuota
                                    kelas. Sistem akan otomatis membatasi jika melebihi kuota SKS.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative flex items-start group">
                            <div
                                class="absolute left-8 -translate-x-1/2 w-4 h-4 bg-gray-300 group-hover:bg-green-500 rounded-full border-4 border-white shadow-md z-10 group-hover:scale-125 transition-all duration-300">
                            </div>
                            <div class="ml-20 flex-grow">
                                <span
                                    class="text-xs font-bold text-gray-400 group-hover:text-green-600 uppercase tracking-widest mb-1 block transition-colors">Langkah
                                    4</span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Verifikasi & Simpan</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Periksa kembali daftar mata kuliah yang dipilih. Jika sudah sesuai, klik tombol <span
                                        class="inline-block px-2 py-0.5 rounded bg-green-100 text-green-700 text-xs font-bold">Simpan</span>.
                                    Status KRS akan menunggu persetujuan Dosen Wali.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Decorative Styles for Animation -->
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