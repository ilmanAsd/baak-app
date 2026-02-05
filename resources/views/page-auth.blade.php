@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen py-24 flex items-center justify-center">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <!-- Header Icon -->
                <div class="text-center mb-10">
                    <div
                        class="w-24 h-24 bg-brand-blue rounded-3xl shadow-2xl shadow-brand-blue/20 flex items-center justify-center mx-auto mb-8 transform hover:rotate-12 transition-transform duration-300">
                        <span class="material-symbols-outlined text-white text-5xl">lock_open</span>
                    </div>
                    <h1 class="text-3xl font-black text-brand-blue uppercase italic tracking-tight mb-4">Halaman <span
                            class="text-brand-yellow">Terproteksi</span></h1>
                    <p class="text-gray-500 font-medium">Halaman <strong>"{{ $title }}"</strong> memerlukan password untuk
                        dapat diakses.</p>
                </div>

                <!-- Auth Card -->
                <div
                    class="bg-white rounded-[2.5rem] shadow-2xl p-8 md:p-10 border border-gray-100 relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-brand-blue/5 rounded-full blur-2xl group-hover:bg-brand-blue/10 transition-colors">
                    </div>

                    @if(session('error'))
                        <div
                            class="mb-6 px-6 py-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-center gap-4 animate-shake">
                            <span class="material-symbols-outlined text-rose-500">error</span>
                            <p class="text-rose-600 text-sm font-bold uppercase tracking-wide">{{ session('error') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('page.password.auth') }}" method="POST" class="space-y-8">
                        @csrf
                        <input type="hidden" name="protection_id" value="{{ $protection_id }}">
                        <input type="hidden" name="redirect_url" value="{{ $redirect_url }}">

                        <div class="space-y-3">
                            <label for="password"
                                class="block text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Masukkan
                                Password</label>
                            <div class="relative group">
                                <span
                                    class="absolute inset-y-0 left-0 pl-5 flex items-center text-gray-400 group-focus-within:text-brand-blue transition-colors">
                                    <span class="material-symbols-outlined text-xl">key</span>
                                </span>
                                <input type="password" name="password" id="password" required autofocus
                                    class="w-full pl-12 pr-6 py-5 bg-gray-50 border-transparent rounded-2xl text-sm font-bold text-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:border-brand-blue transition-all"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-5 bg-brand-blue text-white rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-brand-blue/20 hover:bg-blue-900 transition-all active:scale-95 flex items-center justify-center gap-3 group">
                            <span>Buka Proteksi</span>
                            <span
                                class="material-symbols-outlined text-lg transition-transform group-hover:translate-x-1">arrow_forward</span>
                        </button>
                    </form>
                </div>

                <!-- Footer Info -->
                <div
                    class="mt-12 text-center text-gray-400 text-[10px] uppercase font-black tracking-[0.3em] leading-relaxed">
                    &copy; {{ date('Y') }} Satu Pintu BAAK Universitas Kadiri<br>
                    Security & Verification System
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }
    </style>
@endsection