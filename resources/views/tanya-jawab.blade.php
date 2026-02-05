@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <section class="relative pt-32 pb-20 overflow-hidden bg-[#0A0F1D]">
        <!-- Decorative Background Elements (Matched with Beranda) -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-brand-yellow/5 rounded-full -mr-64 -mt-64 blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-indigo-500/10 rounded-full -ml-32 -mb-32 blur-[100px]"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white mb-8 uppercase italic tracking-tighter leading-tight animate-in fade-in slide-in-from-top-4 duration-700">
                PUSAT <span class="text-brand-yellow">Q & A</span>
            </h1>
            <div class="max-w-3xl mx-auto bg-white/5 backdrop-blur-md p-8 rounded-3xl border border-white/10 shadow-2xl animate-in fade-in slide-in-from-bottom-4 duration-700">
                <p class="text-gray-400 text-lg md:text-xl font-medium leading-relaxed">
                    Temukan jawaban dari pertanyaan yang sering diajukan atau ajukan pertanyaan Anda sendiri kepada tim BAAK Universitas Kadiri.
                </p>
            </div>
            <div class="w-24 h-1.5 bg-brand-yellow mx-auto mt-10 rounded-full animate-pulse transition-all"></div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="bg-[#F8FAFC] pb-40">
        <div class="container mx-auto px-6 -mt-16 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left: Form Section -->
                <div id="ask-form" class="lg:col-span-12 xl:col-span-4 order-2 xl:order-1">
                    <div
                        class="bg-white rounded-[3rem] shadow-2xl p-8 md:p-12 border border-white sticky top-32 overflow-hidden group">
                        <!-- Decorative Gradient -->
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-brand-yellow/5 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative z-10">
                            <div class="mb-10">
                                <h2 class="text-3xl font-black text-brand-blue uppercase italic leading-none mb-3">Tanya
                                    <span class="text-brand-yellow">BAAK</span>
                                </h2>
                                <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">Kirim pesan Anda di
                                    sini</p>
                            </div>

                            @if(session('success'))
                                <div
                                    class="mb-8 p-6 bg-emerald-500 rounded-3xl flex items-center gap-4 animate-in fade-in slide-in-from-bottom-4 duration-500">
                                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white">check</span>
                                    </div>
                                    <p class="text-white text-xs font-black uppercase tracking-widest">{{ session('success') }}
                                    </p>
                                </div>
                            @endif

                            <form action="{{ route('qa.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-2">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" required placeholder="Siapa nama Anda?"
                                        class="w-full px-8 py-5 bg-gray-50 border-2 border-transparent rounded-[2rem] text-sm font-bold text-brand-blue placeholder:text-gray-300 focus:bg-white focus:border-brand-yellow focus:ring-0 transition-all">
                                </div>

                                <div class="space-y-3">
                                    <label
                                        class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-2">Pertanyaan</label>
                                    <textarea name="question" required rows="6" placeholder="Apa yang ingin Anda tanyakan?"
                                        class="w-full px-8 py-5 bg-gray-50 border-2 border-transparent rounded-[2rem] text-sm font-bold text-brand-blue placeholder:text-gray-300 focus:bg-white focus:border-brand-yellow focus:ring-0 transition-all resize-none"></textarea>
                                </div>

                                <button type="submit"
                                    class="group relative w-full overflow-hidden py-6 bg-brand-blue text-brand-yellow rounded-[2rem] font-black text-xs uppercase tracking-[0.3em] shadow-2xl shadow-brand-blue/30 transition-all hover:scale-[1.02] active:scale-95">
                                    <span class="relative z-10 flex items-center justify-center gap-3">
                                        <span class="material-symbols-outlined text-sm">send</span>
                                        Kirim Sekarang
                                    </span>
                                    <div
                                        class="absolute inset-0 bg-brand-yellow translate-y-full group-hover:translate-y-0 transition-transform duration-500 origin-bottom">
                                    </div>
                                    <span
                                        class="absolute inset-0 flex items-center justify-center gap-3 text-brand-blue opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                                        <span class="material-symbols-outlined text-sm">send</span>
                                        Kirim Sekarang
                                    </span>
                                </button>
                            </form>

                            <div class="mt-12 p-8 bg-gray-50 rounded-[2.5rem] border border-gray-100">
                                <p
                                    class="text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center leading-relaxed">
                                    Butuh respon lebih cepat? <br>
                                    <a href="#"
                                        class="inline-block mt-3 text-brand-blue font-black hover:text-brand-yellow transition-colors relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-brand-yellow after:scale-x-0 hover:after:scale-x-100 after:transition-transform">
                                        CHAT WHATSAPP KAMI
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Q&A List -->
                <div id="qa-list" class="lg:col-span-12 xl:col-span-8 space-y-8 order-1 xl:order-2">
                    <!-- Filters/Stats Bar -->
                    <div
                        class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 bg-white/50 backdrop-blur-md p-6 rounded-[2.5rem] border border-white">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-brand-blue rounded-2xl flex items-center justify-center shadow-lg shadow-brand-blue/20">
                                <span class="material-symbols-outlined text-brand-yellow">forum</span>
                            </div>
                            <div>
                                <h3 class="font-black text-brand-blue uppercase italic tracking-tighter">Diskusi Publik</h3>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $qas->count() }}
                                    Pertanyaan Terjawab</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div
                                class="px-5 py-2.5 bg-brand-blue text-white rounded-full text-[10px] font-black uppercase tracking-widest">
                                Terbaru</div>
                            <div
                                class="px-5 py-2.5 bg-white text-gray-400 rounded-full text-[10px] font-black uppercase tracking-widest border border-gray-100">
                                Populer</div>
                        </div>
                    </div>

                    @forelse($qas as $qa)
                        <article
                            class="group relative bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 border border-transparent hover:border-brand-yellow/30 transition-all duration-500 overflow-hidden">
                            <!-- Animated Hover Background -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-brand-yellow/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                            </div>

                            <div class="p-10 md:p-14 relative z-10">
                                <!-- Question -->
                                <div class="flex flex-col md:flex-row gap-8 mb-12">
                                    <div
                                        class="w-16 h-16 bg-gray-50 rounded-[1.5rem] flex-shrink-0 flex items-center justify-center border border-gray-100 group-hover:bg-brand-blue group-hover:scale-110 transition-all duration-500">
                                        <span
                                            class="material-symbols-outlined text-gray-300 group-hover:text-brand-yellow text-3xl transition-colors">person</span>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center gap-4 mb-4">
                                            <h4 class="font-black text-brand-blue text-xs uppercase tracking-[0.2em]">
                                                {{ $qa->name }}
                                            </h4>
                                            <span class="w-1.5 h-1.5 bg-brand-yellow rounded-full"></span>
                                            <time class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                                {{ $qa->published_at ? $qa->published_at->diffForHumans() : $qa->created_at->diffForHumans() }}
                                            </time>
                                        </div>
                                        <h3
                                            class="text-2xl md:text-3xl font-black text-gray-900 leading-[1.1] italic uppercase tracking-tighter group-hover:text-brand-blue transition-colors duration-500">
                                            "{{ $qa->question }}"
                                        </h3>
                                    </div>
                                </div>

                                <!-- Response -->
                                @if($qa->answer)
                                    <div class="relative mt-8 pt-8 border-t border-gray-50">
                                        <div class="flex gap-8">
                                            <div class="hidden md:flex w-16 items-center justify-center">
                                                <div
                                                    class="w-0.5 h-full bg-gradient-to-b from-brand-yellow to-transparent rounded-full">
                                                </div>
                                            </div>
                                            <div
                                                class="flex-1 bg-brand-blue/[0.02] rounded-[2.5rem] p-8 md:p-12 border border-brand-blue/[0.03]">
                                                <div class="flex items-center gap-4 mb-6">
                                                    <div
                                                        class="w-10 h-10 bg-brand-blue rounded-xl flex items-center justify-center shadow-lg shadow-brand-blue/20">
                                                        <span
                                                            class="material-symbols-outlined text-brand-yellow text-lg">verified</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="block text-[10px] font-black text-brand-blue uppercase tracking-widest">Admin
                                                            BAAK</span>
                                                        <span
                                                            class="block text-[8px] font-bold text-gray-400 uppercase tracking-widest">Official
                                                            Response</span>
                                                    </div>
                                                </div>
                                                <div class="prose prose-sm prose-slate max-w-none">
                                                    <p class="text-gray-600 font-medium leading-[1.8] text-base">
                                                        {!! nl2br(e($qa->answer)) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="bg-white rounded-[3rem] shadow-2xl border border-gray-50 p-24 text-center">
                            <div class="relative w-32 h-32 mx-auto mb-10">
                                <div class="absolute inset-0 bg-brand-yellow/10 rounded-full animate-ping"></div>
                                <div
                                    class="relative w-full h-full bg-gray-50 rounded-full flex items-center justify-center border border-gray-100">
                                    <span class="material-symbols-outlined text-gray-200 text-6xl">forum</span>
                                </div>
                            </div>
                            <h3 class="text-3xl font-black text-gray-300 uppercase italic tracking-tighter">Hening Sekali...
                            </h3>
                            <p class="text-gray-400 text-sm font-bold mt-4 uppercase tracking-widest">Belum ada diskusi yang
                                tersedia.</p>
                        </div>
                    @endforelse

                    <!-- Pagination Placeholder -->
                    <div class="pt-10 flex justify-center">
                        <button
                            class="px-10 py-5 bg-white border border-gray-100 rounded-full shadow-xl shadow-gray-100 text-[10px] font-black text-brand-blue uppercase tracking-[0.3em] hover:bg-brand-blue hover:text-white transition-all">Muat
                            Lebih Banyak</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .animate-in {
            animation: animate-in 0.6s ease-out forwards;
        }

        @keyframes animate-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection