<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $settings = \App\Models\SiteSetting::first();
        $menus = \App\Models\Menu::whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->where('is_active', true)->orderBy('order')->with(['children' => function ($q) {
                    $q->where('is_active', true)->orderBy('order');
                }]);
            }])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
        $siteName = $settings?->site_name ?? 'BAAK Universitas Kadiri';
        $logo = $settings?->header_logo ? asset('storage/' . $settings->header_logo) : 'https://baak.unik-kediri.ac.id/assets/img/logo.png';
        $favicon = $settings?->favicon ? asset('storage/' . $settings->favicon) : null;
    @endphp
    <title>{{ $siteName }}</title>
    @if($favicon)
        <link rel="icon" href="{{ $favicon }}">
    @endif
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .font-display {
            font-family: 'Manrope', sans-serif;
        }

        .bg-brand-yellow {
            background-color: #FFEB3B;
        }

        .bg-brand-blue {
            background-color: #192E5B;
        }

        .text-brand-blue {
            color: #192E5B;
        }

        .text-brand-yellow {
            color: #FFEB3B;
        }

        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 1);
        }

        .glass-nav-scrolled {
            background-color: rgba(255, 235, 59, 0.95);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            yellow: '#FFEB3B',
                            blue: '#192E5B',
                        }
                    },
                    fontFamily: {
                        display: ['Manrope', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="antialiased bg-gray-50 flex flex-col min-h-screen" x-data="{ scrolled: false, mobileMenuOpen: false }"
    @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Header / Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 px-4 py-4 lg:px-20 transition-all duration-500"
        :class="{ 'py-2': scrolled }">
        <nav class="mx-auto max-w-[1200px] border border-black/5 rounded-2xl px-4 py-2.5 flex items-center justify-between transition-all duration-500"
            :class="scrolled ? 'glass-nav-scrolled shadow-xl' : 'glass-nav shadow-lg'">
            
            <!-- Logo area -->
            <a href="{{ route('home') }}" class="flex items-center group">
                <div class="h-10 w-auto bg-transparent flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ $logo }}" onerror="this.style.display='none'; this.parentNode.innerText='UK'" alt="Logo" class="h-full w-auto object-contain">
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-8">
                @foreach($menus as $menu)
                    @php
                        $hasChildren = $menu->children->count() > 0;
                        $isMega = $menu->type === 'mega';
                    @endphp

                    @if($hasChildren)
                        <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" 
                            @if(Str::lower($menu->name) === 'layanan')
                                @mouseleave.debounce.750ms="open = false"
                            @else
                                @mouseleave="open = false"
                            @endif
                        >
                            <button class="flex items-center gap-1.5 py-4 text-[14px] font-black uppercase tracking-widest transition-all duration-300 hover:text-brand-blue"
                                :class="scrolled ? 'text-brand-blue/80' : 'text-gray-700'">
                                {{ $menu->name }}
                                <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:rotate-180">expand_more</span>
                            </button>

                            @if($isMega)
                                <!-- Mega Menu -->
                                <div x-show="open" x-cloak 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    @mouseenter="open = true"
                                    class="fixed left-1/2 -translate-x-1/2 w-[90vw] max-w-6xl mt-0 pt-4 bg-transparent z-[100]">
                                    <div class="bg-white/95 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-gray-100 p-10">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                                            @foreach($menu->children as $column)
                                                <div>
                                                    <h3 class="text-[14px] font-black text-brand-blue uppercase tracking-[0.2em] mb-6 pb-3 border-b-2 border-brand-blue/10 flex items-center gap-2">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-brand-blue"></span>
                                                        {{ $column->name }}
                                                    </h3>
                                                    <ul class="space-y-2">
                                                        @foreach($column->children as $item)
                                                            <li>
                                                                <a href="{{ $item->url }}" class="group/item flex items-center text-gray-500 hover:text-brand-blue hover:bg-brand-yellow px-4 py-2 rounded-xl transition-all duration-200 text-[14px] font-bold">
                                                                    <span class="w-0 group-hover/item:w-3 h-[2px] bg-brand-blue mr-0 group-hover/item:mr-2 transition-all duration-300 rounded-full"></span>
                                                                    {{ $item->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Standard Dropdown -->
                                <div x-show="open" x-cloak 
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    @mouseenter="open = true"
                                    class="absolute top-full left-0 w-72 pt-2 bg-transparent z-[100]">
                                    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 py-4 px-2">
                                        @foreach($menu->children as $child)
                                            <a href="{{ $child->url }}" class="block px-6 py-3 text-[14px] font-black text-gray-600 hover:text-brand-blue hover:bg-brand-yellow rounded-xl uppercase tracking-widest transition-all">
                                                {{ $child->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <a href="{{ $menu->url }}" class="py-2 text-[14px] font-black uppercase tracking-widest transition-all duration-300 hover:text-brand-blue"
                            :class="scrolled ? 'text-brand-blue/80' : 'text-gray-700'">
                            {{ $menu->name }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Action buttons -->
            <div class="flex items-center gap-4">
                <a href="https://siam.unik-kediri.ac.id/Login" target="_blank"
                    class="hidden sm:flex items-center justify-center rounded-xl px-6 py-2.5 text-xs font-black uppercase tracking-widest transition-all active:scale-95 shadow-lg shadow-brand-blue/10"
                    :class="scrolled ? 'bg-brand-blue text-white hover:bg-blue-900' : 'bg-brand-blue text-white hover:bg-blue-900'">
                    SIAM
                </a>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-brand-blue">
                    <span class="material-symbols-outlined text-3xl" x-text="mobileMenuOpen ? 'close' : 'menu_open'">menu_open</span>
                </button>
            </div>
        </nav>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            class="absolute top-full left-4 right-4 mt-2 bg-white rounded-3xl shadow-2xl border border-gray-100 p-6 flex flex-col gap-2 max-h-[80vh] overflow-y-auto lg:hidden">
            @foreach($menus as $menu)
                @php $hasChildren = $menu->children->count() > 0; @endphp
                @if($hasChildren)
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex justify-between items-center w-full p-4 rounded-2xl bg-gray-50 text-xs font-black uppercase tracking-widest text-brand-blue">
                            {{ $menu->name }}
                            <span class="material-symbols-outlined text-sm transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
                        </button>
                        <div x-show="open" x-collapse class="pl-4 mt-2 space-y-1 border-l-2 border-brand-yellow/30 ml-2">
                            @foreach($menu->children as $column)
                                @if($column->children->count() > 0)
                                    <div class="py-2">
                                        <div class="px-4 py-1 text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $column->name }}</div>
                                        @foreach($column->children as $item)
                                            <a href="{{ $item->url }}" class="block px-4 py-2 text-sm font-bold text-gray-600 hover:text-brand-blue">{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                @else
                                    <a href="{{ $column->url }}" class="block p-4 text-xs font-black uppercase tracking-widest text-gray-600">{{ $column->name }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $menu->url }}" class="p-4 rounded-2xl hover:bg-gray-50 text-xs font-black uppercase tracking-widest text-gray-700 hover:text-brand-blue transition-all">
                        {{ $menu->name }}
                    </a>
                @endif
            @endforeach
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-blue text-white py-12 mt-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 text-brand-yellow">Tentang Kami</h3>
                <p class="text-sm opacity-80 leading-relaxed">
                    Biro Administrasi Akademik dan Kemahasiswaan (BAAK) Universitas Kadiri bertugas melayani
                    administrasi akademik dan kegiatan kemahasiswaan.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 text-brand-yellow">Kontak</h3>
                <ul class="text-sm opacity-80 space-y-2">
                    <li>Jl. Selomangleng No. 1 Kediri</li>
                    <li>Telp: (0354) 771032</li>
                    <li>Email: baak@unik-kediri.ac.id</li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 text-brand-yellow">Tautan Cepat</h3>
                <ul class="text-sm opacity-80 space-y-2">
                    <li><a href="https://siam.unik-kediri.ac.id/Login" class="hover:text-brand-yellow">SIAM</a></li>
                    <li><a href="https://spada1.unik-kediri.ac.id/" class="hover:text-brand-yellow">E-Learning SPADA</a></li>
                    <li><a href="https://pendaftaran.unik-kediri.ac.id/Landing" class="hover:text-brand-yellow">PMB Online</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-700 flex flex-col items-center justify-center text-center gap-4 text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} Biro Administrasi Akademik dan Kemahasiswaan (BAAK). Universitas Kadiri.</p>
            <div class="flex items-center gap-4">
                @php
                    $langSettings = [];
                    if (\Illuminate\Support\Facades\Storage::exists('language_settings.json')) {
                        $langSettings = json_decode(\Illuminate\Support\Facades\Storage::get('language_settings.json'), true);
                    }
                    $showLangSwitcher = $langSettings['is_enabled'] ?? false;
                @endphp

                @if($showLangSwitcher)
                    <!-- Language Switcher (Google Translate) -->
                    <div class="flex items-center gap-2 border border-gray-600 rounded px-3 py-1 bg-gray-800" id="google_translate_element_container">
                        <span class="material-symbols-outlined text-xs">language</span>
                        
                        <!-- Hidden Google Translate Element -->
                        <div id="google_translate_element" style="display:none;"></div>

                        <button onclick="switchLanguage('id')" id="btn-id" class="font-bold hover:text-white transition-colors text-white">ID</button>
                        <span class="text-gray-600">|</span>
                        <button onclick="switchLanguage('en')" id="btn-en" class="font-bold hover:text-white transition-colors text-gray-400">EN</button>
                    </div>

                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'id',
                                includedLanguages: 'en,id',
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                autoDisplay: false
                            }, 'google_translate_element');
                        }

                        function switchLanguage(lang) {
                            var confirmSwitch = true;
                            
                            // Set Cookie for Google Translate
                            // Format: googtrans=/source/target
                            if (lang === 'en') {
                                document.cookie = "googtrans=/id/en; path=/; domain=" + window.location.hostname;
                                document.cookie = "googtrans=/id/en; path=/";
                            } else {
                                // To revert to original, we clear the cookie or set it to /id/id
                                document.cookie = "googtrans=/id/id; path=/; domain=" + window.location.hostname;
                                document.cookie = "googtrans=/id/id; path=/";
                            }
                            
                            // Reload page to apply
                            window.location.reload();
                        }

                        // Check cookie on load to style buttons
                        document.addEventListener('DOMContentLoaded', function() {
                            const cookies = document.cookie.split(';');
                            let currentLang = 'id';
                            
                            for(let i = 0; i < cookies.length; i++) {
                                let c = cookies[i].trim();
                                if (c.indexOf('googtrans=') == 0) {
                                    if (c.includes('/en')) currentLang = 'en';
                                }
                            }

                            if (currentLang === 'en') {
                                document.getElementById('btn-en').classList.add('text-white');
                                document.getElementById('btn-en').classList.remove('text-gray-400');
                                document.getElementById('btn-id').classList.add('text-gray-400');
                                document.getElementById('btn-id').classList.remove('text-white');
                            } else {
                                document.getElementById('btn-id').classList.add('text-white');
                                document.getElementById('btn-id').classList.remove('text-gray-400');
                                document.getElementById('btn-en').classList.add('text-gray-400');
                                document.getElementById('btn-en').classList.remove('text-white');
                            }
                        });
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                @endif
            </div>
        </div>
    </footer>

    <!-- Typing Effect Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typingElement = document.getElementById('typing-text');
            if (typingElement) {
                const textToType = "Motto Biro Administrasi Akademik dan Kemahasiswaan";
                const speed = 50;
                const pauseBetweenLoops = 2000;
                let i = 0;

                function typeWriter() {
                    if (i < textToType.length) {
                        typingElement.innerHTML += textToType.charAt(i);
                        i++;
                        setTimeout(typeWriter, speed);
                    } else {
                        setTimeout(() => {
                            typingElement.innerHTML = '';
                            i = 0;
                            typeWriter();
                        }, pauseBetweenLoops);
                    }
                }

                setTimeout(typeWriter, 500);
            }
        });
    </script>
</body>

</html>