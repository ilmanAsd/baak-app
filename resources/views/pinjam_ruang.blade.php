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
                Layanan Fasilitas
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight leading-tight">
                Peminjaman Ruang <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">SPADA
                    (A2-11)</span>
            </h1>
            <p class="text-blue-100 text-lg md:text-xl font-light max-w-3xl mx-auto leading-relaxed">
                Jadwal dan prosedur peminjaman ruang meeting multimedia SPADA.
            </p>
        </div>
    </section>

    <!-- Main Content Container -->
    <div class="relative z-10 -mt-20 container mx-auto px-4 pb-24">


        <!-- Schedule Section -->
        <div
            class="bg-white rounded-3xl shadow-xl shadow-blue-900/5 border border-gray-100 overflow-hidden max-w-6xl mx-auto mb-10">
            <div class="p-6 md:p-8 bg-brand-blue relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-brand-blue opacity-50"></div>
                <h2 class="text-2xl md:text-3xl font-bold text-white relative z-10 text-center">
                    Jadwal Penggunaan Ruang A2-11 (SPADA)
                </h2>
            </div>
            <div class="p-4 bg-gray-50">
                <div
                    class="aspect-w-16 aspect-h-9 md:aspect-h-12 w-full h-[400px] bg-white rounded-xl shadow-inner overflow-hidden border border-gray-200">
                    <iframe src="https://sarpras.unik-kediri.ac.id/Schedule" class="w-full h-full border-0"
                        title="Jadwal Ruang SPADA" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <div
            class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 border border-gray-100 overflow-hidden max-w-4xl mx-auto">

            <div class="p-8 md:p-16 text-center">
                <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-10 h-10 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-6">Prosedur Peminjaman</h2>

                <div class="max-w-2xl mx-auto space-y-6 text-gray-600 leading-relaxed mb-10">
                    <p>
                        Sebelum mengajukan peminjaman, pastikan terlebih dahulu bahwa <strong>Ruang A2-11 (SPADA)</strong>
                        tidak sedang terpakai pada jadwal yang Anda inginkan.
                    </p>
                    <p class="bg-blue-50 p-4 rounded-xl border border-blue-100 text-blue-900 text-sm">
                        <span class="font-bold block mb-1">Tips:</span>
                        Jika jadwal masih kosong, silakan tentukan tanggal dan waktu penggunaan yang diinginkan, kemudian
                        klik tombol di bawah ini untuk mengisi formulir peminjaman resmi.
                    </p>
                </div>

                <a href="https://sarpras.unik-kediri.ac.id/Meeting" target="_blank"
                    class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-brand-blue rounded-xl hover:bg-blue-700 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-blue">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Isi Formulir Peminjaman
                </a>
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