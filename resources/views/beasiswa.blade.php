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
                Layanan Kemahasiswaan
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                Informasi Layanan <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">Beasiswa</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Wujudkan impian pendidikan Anda dengan berbagai program beasiswa Universitas Kadiri.
            </p>
        </div>
    </section>

    <!-- Main Content Container key features -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">

        <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden">

            <!-- Intro Text -->
            <div class="p-8 md:p-16 text-center border-b border-gray-100">
                <h2 class="text-3xl font-bold text-brand-blue mb-4">Program Beasiswa Mahasiswa</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Universitas Kadiri berkomitmen untuk mendukung mahasiswa berprestasi dan kurang mampu melalui berbagai
                    jenis beasiswa. Pilih program yang sesuai dengan kualifikasi Anda.
                </p>
            </div>

            <!-- Scholarship Types Grid -->
            <div class="p-8 md:p-16 bg-gray-50/50">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- KIPK -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-brand-blue mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Beasiswa KIPK</h3>
                        <p class="text-gray-500 text-sm">Bantuan biaya pendidikan dari pemerintah bagi lulusan SMA/SMK yang
                            memiliki potensi akademik baik.</p>
                    </div>

                    <!-- Adik Disabilitas -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg> <!-- Changed Icon -->
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Adik Disabilitas</h3>
                        <p class="text-gray-500 text-sm">Beasiswa khusus untuk penyandang disabilitas (ADik) agar
                            mendapatkan akses pendidikan tinggi.</p>
                    </div>

                    <!-- Prestasi -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Beasiswa Prestasi</h3>
                        <p class="text-gray-500 text-sm">Penghargaan bagi mahasiswa dengan capaian luar biasa di bidang
                            akademik maupun non-akademik.</p>
                    </div>

                    <!-- Apresiasi -->
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center text-green-600 mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Beasiswa Apresiasi</h3>
                        <p class="text-gray-500 text-sm">Bentuk apresiasi universitas terhadap loyalitas dan dedikasi serta
                            kontribusi positif mahasiswa.</p>
                    </div>
                </div>
            </div>

            <!-- Detailed Content Tabs (Alpine.js) -->
            <div x-data="{ activeTab: 'kipk' }" class="p-8 md:p-16 border-b border-gray-100">
                <div class="flex flex-wrap gap-4 mb-10 justify-center">
                    <button @click="activeTab = 'kipk'"
                        :class="{ 'bg-brand-blue text-white shadow-lg transform scale-105': activeTab === 'kipk', 'bg-white text-gray-600 hover:bg-gray-50': activeTab !== 'kipk' }"
                        class="px-6 py-3 rounded-full font-bold transition-all duration-300 border border-gray-200">
                        KIP Kuliah
                    </button>
                    <button @click="activeTab = 'adik'"
                        :class="{ 'bg-purple-600 text-white shadow-lg transform scale-105': activeTab === 'adik', 'bg-white text-gray-600 hover:bg-gray-50': activeTab !== 'adik' }"
                        class="px-6 py-3 rounded-full font-bold transition-all duration-300 border border-gray-200">
                        Adik Disabilitas
                    </button>
                    <button @click="activeTab = 'prestasi'"
                        :class="{ 'bg-yellow-500 text-white shadow-lg transform scale-105': activeTab === 'prestasi', 'bg-white text-gray-600 hover:bg-gray-50': activeTab !== 'prestasi' }"
                        class="px-6 py-3 rounded-full font-bold transition-all duration-300 border border-gray-200">
                        Beasiswa Prestasi
                    </button>
                    <button @click="activeTab = 'apresiasi'"
                        :class="{ 'bg-green-500 text-white shadow-lg transform scale-105': activeTab === 'apresiasi', 'bg-white text-gray-600 hover:bg-gray-50': activeTab !== 'apresiasi' }"
                        class="px-6 py-3 rounded-full font-bold transition-all duration-300 border border-gray-200">
                        Beasiswa Apresiasi
                    </button>
                </div>

                <!-- Content Area -->
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 min-h-[300px]">

                    <!-- KIPK Content -->
                    <div x-show="activeTab === 'kipk'" x-transition.opacity.duration.500ms>
                        <h3 class="text-2xl font-bold text-brand-blue mb-4">Kartu Indonesia Pintar Kuliah (KIPK)</h3>
                        <p class="text-gray-600 mb-6">Program bantuan biaya pendidikan dari pemerintah bagi lulusan SMA/SMK
                            yang memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi.</p>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3 flex items-center"><span
                                        class="w-6 h-6 bg-brand-yellow rounded-full flex items-center justify-center text-xs mr-2">1</span>
                                    Persyaratan</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Lulusan SMA/SMK/Sederajat tahun berjalan atau maksimal 2 tahun sebelumnya.</li>
                                    <li>Memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi.</li>
                                    <li>Lulus seleksi penerimaan mahasiswa baru di PT Akademik atau PT Vokasi.</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3 flex items-center"><span
                                        class="w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center text-xs mr-2">2</span>
                                    Dokumen</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Kartu KIP / KKS / PKH (jika ada).</li>
                                    <li>Slip Gaji / Surat Keterangan Penghasilan Orang Tua.</li>
                                    <li>Foto Rumah (Tampak Depan, Ruang Tamu).</li>
                                    <li>Sertifikat Prestasi (jika ada).</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Adik Content -->
                    <div x-show="activeTab === 'adik'" x-transition.opacity.duration.500ms style="display: none;">
                        <h3 class="text-2xl font-bold text-purple-700 mb-4">Beasiswa Adik Disabilitas</h3>
                        <p class="text-gray-600 mb-6">Bantuan biaya pendidikan khusus untuk penyandang disabilitas (fisik,
                            sensorik, mental, intelektual) agar mendapatkan hak pendidikan tinggi yang setara.</p>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3">Kriteria Penerima</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Warga Negara Indonesia (WNI).</li>
                                    <li>Penyandang disabilitas yang dibuktikan dengan surat keterangan dari dokter/psikolog.
                                    </li>
                                    <li>Lulus seleksi masuk perguruan tinggi.</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3">Cakupan Beasiswa</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Biaya Pendidikan (UKT).</li>
                                    <li>Bantuan Biaya Hidup.</li>
                                    <li>Pendampingan akademik jika diperlukan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Prestasi Content -->
                    <div x-show="activeTab === 'prestasi'" x-transition.opacity.duration.500ms style="display: none;">
                        <h3 class="text-2xl font-bold text-yellow-600 mb-4">Beasiswa Prestasi</h3>
                        <p class="text-gray-600 mb-6">Diperuntukkan bagi mahasiswa yang memiliki capaian prestasi luar biasa
                            minimal tingkat Kabupaten/Kota, Provinsi, Nasional, atau Internasional.</p>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3">Jenis Prestasi</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Akademik: Juara Olimpiade Sains, Karya Tulis Ilmiah, dll.</li>
                                    <li>Olahraga & Seni: Juara PON, POPNAS, FLS2N, dll.</li>
                                    <li>Keagamaan: Hafidz Qur'an (min. 10 Juz), Juara MTQ.</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-3">Persyaratan Berkas</h4>
                                <ul class="space-y-2 text-sm text-gray-600 list-disc list-inside ml-2">
                                    <li>Sertifikat/Piagam Penghargaan Asli & Fotokopi.</li>
                                    <li>Rekomendasi dari Sekolah/Institusi terkait.</li>
                                    <li>Surat Pernyataan kesediaan aktif berorganisasi/berkompetisi untuk kampus.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Apresiasi Content -->
                    <div x-show="activeTab === 'apresiasi'" x-transition.opacity.duration.500ms style="display: none;">
                        <h3 class="text-2xl font-bold text-green-600 mb-4">Beasiswa Apresiasi</h3>
                        <p class="text-gray-600 mb-6">Program khusus dari Universitas Kadiri untuk keluarga besar yayasan,
                            alumni, atau mitra kerjasama.</p>

                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg> <span>Saudara Kandung Mahasiswa/Alumni Universitas Kadiri.</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg> <span>Putra/Putri Pegawai Universitas Kadiri.</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg> <span>Rekomendasi Mitra Kerjasama Strategis.</span></li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Proses Pendaftaran Timeline -->
            <div class="p-8 md:p-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-brand-blue mb-4">Proses Pendaftaran</h2>
                    <p class="text-gray-500">Langkah-langkah untuk mengajukan beasiswa.</p>
                </div>

                <div class="relative">
                    <!-- Connector Line Desktop -->
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-gray-100 -translate-y-1/2 z-0"></div>

                    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 relative z-10">
                        <!-- Step 1 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-white border-2 border-brand-yellow text-brand-blue font-bold rounded-full flex items-center justify-center mx-auto mb-4 relative z-10">
                                1</div>
                            <h4 class="font-bold text-sm">Cek Syarat</h4>
                            <p class="text-xs text-gray-500 mt-2">Pastikan sesuai kriteria.</p>
                        </div>
                        <!-- Step 2 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-white border-2 border-brand-blue text-brand-blue font-bold rounded-full flex items-center justify-center mx-auto mb-4 relative z-10">
                                2</div>
                            <h4 class="font-bold text-sm">Siapkan Dokumen</h4>
                            <p class="text-xs text-gray-500 mt-2">Scan berkas asli.</p>
                        </div>
                        <!-- Step 3 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-brand-blue text-white font-bold rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg relative z-10">
                                3</div>
                            <h4 class="font-bold text-sm">Isi Formulir</h4>
                            <p class="text-xs text-gray-500 mt-2">Online / Offline.</p>
                        </div>
                        <!-- Step 4 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-white border-2 border-brand-blue text-brand-blue font-bold rounded-full flex items-center justify-center mx-auto mb-4 relative z-10">
                                4</div>
                            <h4 class="font-bold text-sm">Submit Berkas</h4>
                            <p class="text-xs text-gray-500 mt-2">Kirim ke Bagian Kemahasiswaan.</p>
                        </div>
                        <!-- Step 5 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-white border-2 border-brand-blue text-brand-blue font-bold rounded-full flex items-center justify-center mx-auto mb-4 relative z-10">
                                5</div>
                            <h4 class="font-bold text-sm">Validasi & Seleksi</h4>
                            <p class="text-xs text-gray-500 mt-2">Wawancara jika perlu.</p>
                        </div>
                        <!-- Step 6 -->
                        <div class="text-center">
                            <div
                                class="w-12 h-12 bg-green-500 text-white font-bold rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg relative z-10">
                                6</div>
                            <h4 class="font-bold text-sm">Pengumuman</h4>
                            <p class="text-xs text-gray-500 mt-2">Cek portal resmi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="p-8 md:p-16 bg-gray-50 border-t border-gray-100" x-data="{ expanded: null }">
                <h2 class="text-2xl font-bold text-brand-blue mb-8 text-center">Pertanyaan Umum (FAQ)</h2>

                <div class="space-y-4 max-w-3xl mx-auto">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <button @click="expanded = expanded === 1 ? null : 1"
                            class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                            Apakah bisa mendaftar lebih dari satu beasiswa?
                            <svg class="w-5 h-5 transition-transform" :class="expanded === 1 ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="expanded === 1"
                            class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                            Pada umumnya, mahasiswa hanya diperbolehkan menerima satu jenis beasiswa yang bersumber dari
                            anggaran pemerintah (Double Funding tidak diperbolehkan). Namun, untuk beasiswa
                            swasta/apresiasi, tergantung kebijakan spesifik masing-masing.
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <button @click="expanded = expanded === 2 ? null : 2"
                            class="w-full text-left px-6 py-4 font-bold text-gray-800 flex justify-between items-center hover:bg-gray-50">
                            Bagaimana jika IPK turun saat menerima beasiswa?
                            <svg class="w-5 h-5 transition-transform" :class="expanded === 2 ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="expanded === 2"
                            class="px-6 py-4 text-gray-600 text-sm border-t border-gray-100 bg-gray-50">
                            Penerima beasiswa wajib mempertahankan prestasi akademik minimal (biasanya IPK >= 3.00). Jika
                            turun, akan ada evaluasi, pembinaan, hingga potensi penghentian beasiswa jika tidak ada
                            perbaikan.
                        </div>
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