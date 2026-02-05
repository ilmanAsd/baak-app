@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-[70vh] flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full">
            <!-- Premium Card Container -->
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 overflow-hidden relative">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-brand-blue/5 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-24 h-24 bg-brand-yellow/10 rounded-full blur-xl"></div>

                <div class="relative z-10 p-10 text-center">
                    <!-- Icon -->
                    <div
                        class="w-20 h-20 bg-brand-blue/5 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-inner">
                        <span class="material-symbols-outlined text-brand-blue text-4xl">shield_lock</span>
                    </div>

                    <h2 class="text-3xl font-black text-brand-blue uppercase italic tracking-tight mb-4">
                        Arsip <span class="text-brand-yellow">BAAK</span>
                    </h2>

                    <p class="text-gray-500 text-sm font-medium leading-relaxed mb-10">
                        Halaman Arsip BAAK diproteksi dengan password keamanan. Silakan masukkan password untuk
                        melanjutkan akses ke dokumen internal, eksternal, dan surat keluar.
                    </p>

                    @if(session('error'))
                        <div
                            class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-center gap-3 text-rose-600 text-xs font-bold animate-shake">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('arsip.auth') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                <span class="material-symbols-outlined text-[20px]">key</span>
                            </span>
                            <input type="password" name="password" required placeholder="Masukkan password arsip..."
                                class="w-full pl-12 pr-5 py-4 bg-gray-50 border-gray-100 rounded-2xl text-sm font-bold text-brand-blue focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all">
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-brand-blue text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-brand-blue/20 hover:bg-blue-900 transition-all hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-2">
                            <span>Buka Akses Arsip</span>
                            <span class="material-symbols-outlined text-[18px]">lock_open</span>
                        </button>
                    </form>

                    <div class="mt-10 pt-8 border-t border-gray-50">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center text-xs font-bold text-gray-400 hover:text-brand-blue transition-colors gap-2">
                            <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

            <!-- Helper text -->
            <p class="text-center mt-8 text-[10px] font-black text-gray-400 uppercase tracking-widest leading-loose">
                Akses ini bersifat rahasia dan terbatas.<br>Universitas Kadiri &copy; {{ date('Y') }}
            </p>
        </div>
    </div>

    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-4px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(4px);
            }
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }
    </style>
@endsection