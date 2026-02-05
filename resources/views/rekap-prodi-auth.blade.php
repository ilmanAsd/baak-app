<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satu Pintu BAAK - Rekap Dokumen Prodi Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .bg-brand-blue {
            background-color: #003366;
        }

        .text-brand-blue {
            color: #003366;
        }

        .bg-brand-yellow {
            background-color: #ffcc00;
        }

        .input-focus:focus {
            border-color: #003366;
            box-shadow: 0 0 0 4px rgba(0, 51, 102, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-[2.5rem] shadow-2xl p-10 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-brand-yellow/10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-brand-blue/5 rounded-full -ml-12 -mb-12"></div>

            <div class="relative z-10">
                <div
                    class="w-20 h-20 bg-brand-blue rounded-3xl flex items-center justify-center mb-8 mx-auto shadow-xl shadow-brand-blue/20">
                    <span class="material-symbols-outlined text-white text-4xl">lock</span>
                </div>

                <div class="text-center mb-8">
                    <h1 class="text-2xl font-black text-gray-900 mb-2">Halaman Terproteksi</h1>
                    <p class="text-gray-500 text-sm font-medium">Silakan masukkan password untuk mengakses Rekap Dokumen
                        Prodi</p>
                </div>

                <form action="{{ route('rekap-prodi.authenticate') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <span class="material-symbols-outlined text-xl">password</span>
                            </span>
                            <input type="password" name="password" required placeholder="Masukkan password..."
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-sm font-bold text-brand-blue input-focus transition-all outline-none">
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs font-bold text-rose-500 flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-brand-blue text-brand-yellow rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-black transition-all shadow-xl shadow-brand-blue/20">
                        Buka Akses
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <a href="/"
                        class="text-xs font-bold text-gray-400 hover:text-brand-blue transition-colors inline-flex items-center gap-2 uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        Kembali Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>