<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>X TJKT — SMK Negeri 1 Lemahabang</title>
    <link rel="icon" href="/favicon.ico">
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .section-alt { background: var(--bg-section, #f0ede9); }
        body.dark .section-alt { background: var(--bg-section, #242120); }

        .diagonal-bg {
            position: relative;
        }
        .diagonal-bg::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 18%;
            height: 100%;
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);
        }
        @media (min-width: 768px) {
            .diagonal-bg::before { width: 45%; }
        }
        .diagonal-bg::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 18%;
            height: 100%;
            background: linear-gradient(135deg, rgba(124,58,237,0.08), rgba(109,40,217,0.08));
            clip-path: polygon(28% 0, 100% 0, 100% 100%, 0% 100%);
            z-index: 1;
        }
        @media (min-width: 768px) {
            .diagonal-bg::after { width: 45%; }
        }
        .stat-card {
            border-left: 3px solid #7c3aed;
        }

        .pulse-dot {
            animation: pulse 2s ease-in-out infinite;
        }
        .pulse-dot:nth-child(2) { animation-delay: 0.4s; }
        .pulse-dot:nth-child(3) { animation-delay: 0.8s; }
        .pulse-dot:nth-child(4) { animation-delay: 1.2s; }
        .pulse-dot:nth-child(5) { animation-delay: 1.6s; }

        @keyframes pulse {
            0%, 100% { opacity: 0.4; r: 2.5; }
            50% { opacity: 1; r: 4.5; }
        }

        .data-flow {
            stroke-dasharray: 6 4;
            animation: flow 1.5s linear infinite;
        }
        @keyframes flow {
            to { stroke-dashoffset: -10; }
        }
    </style>
</head>
<body class="font-sans antialiased">

    <nav class="nav-bar border-b">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
            <a href="/" class="font-bold text-lg flex items-center gap-1.5">
                <span class="w-2 h-2 bg-purple-600 inline-block"></span>
                X TJKT
            </a>
            <div class="max-md:hidden md:flex items-center gap-6 text-sm">
                <a href="/" class="text-purple-600 font-medium">Beranda</a>
                <a href="/siswa" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Siswa</a>
                <a href="/galeri" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Galeri</a>
                <a href="/jadwal" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Jadwal</a>
                <button id="themeToggle" class="theme-toggle" title="Toggle dark mode">
                    <svg id="sunIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                    <svg id="moonIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                </button>
            </div>
            <div class="flex md:hidden items-center gap-2">
                <button id="themeToggleMobile" class="theme-toggle" title="Toggle dark mode">
                    <svg id="sunIconMobile" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                    <svg id="moonIconMobile" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                </button>
                <button id="menuToggle" class="theme-toggle" title="Menu">
                    <svg id="menuIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    <svg id="closeIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
        <div id="mobileMenu" class="md:hidden border-t px-6 py-4 space-y-3 text-sm" style="background: var(--bg-nav); border-color: var(--border); display: none;">
            <a href="/" class="block text-purple-600 font-medium">Beranda</a>
            <a href="/siswa" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Siswa</a>
            <a href="/galeri" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Galeri</a>
            <a href="/jadwal" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Jadwal</a>
        </div>
    </nav>

    <section class="diagonal-bg min-h-[90vh] flex items-center relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 w-full py-20 relative z-10">
            <div class="max-w-xl">
                <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-6">SMK Negeri 1 Lemahabang</p>
                <h1 class="text-6xl sm:text-8xl md:text-9xl font-black tracking-tight leading-none mb-3" style="color: var(--text-primary);">
                    X
                </h1>
                <h1 class="text-6xl sm:text-8xl md:text-9xl font-black tracking-tight leading-none text-purple-600 mb-8">
                    TJKT
                </h1>
                <p class="text-base sm:text-lg max-w-md mb-10 leading-relaxed" style="color: var(--text-secondary);">
                    Teknik Jaringan Komputer dan Telekomunikasi
                </p>
                <div class="flex items-center gap-4 sm:gap-6 mb-12">
                    <div class="stat-card pl-3 sm:pl-4">
                        <span class="mono text-xl sm:text-2xl font-bold block" style="color: var(--text-primary);">41</span>
                        <span class="text-xs" style="color: var(--text-muted);">Siswa</span>
                    </div>
                    <div class="stat-card pl-3 sm:pl-4">
                        <span class="mono text-xl sm:text-2xl font-bold block" style="color: var(--text-primary);">11</span>
                        <span class="text-xs" style="color: var(--text-muted);">Mapel</span>
                    </div>
                    <div class="stat-card pl-3 sm:pl-4">
                        <span class="mono text-xl sm:text-2xl font-bold block" style="color: var(--text-primary);">1</span>
                        <span class="text-xs" style="color: var(--text-muted);">Wali Kelas</span>
                    </div>
                </div>
                <a href="/siswa" class="inline-flex items-center gap-3 bg-purple-600 hover:bg-purple-500 text-white px-6 sm:px-8 py-3 sm:py-4 font-semibold transition-colors group text-sm sm:text-base">
                    <span>Jelajahi</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
        <div class="hidden lg:flex absolute right-10 top-8 z-20 flex-col items-center gap-2">
            <p class="text-white/70 text-base mono tracking-widest font-semibold">Cisco Packet Tracer</p>

            <svg viewBox="0 0 240 270" class="w-[34rem] h-auto max-w-full" fill="none">
                <!-- Cable: PC1 → Switch -->
                <path d="M44 57 L85 105" stroke="rgba(255,255,255,0.55)" stroke-width="1.5" class="data-flow"/>
                <!-- Cable: PC2 → Switch -->
                <path d="M44 157 L85 110" stroke="rgba(255,255,255,0.55)" stroke-width="1.5" class="data-flow"/>
                <!-- Cable: Switch → Router -->
                <path d="M147 105 L176 105" stroke="rgba(255,255,255,0.55)" stroke-width="1.5" class="data-flow"/>
                <!-- Cable: Switch → Server -->
                <path d="M116 118 L115 200" stroke="rgba(255,255,255,0.55)" stroke-width="1.5" class="data-flow"/>

                <!-- PC-1 (Packet Tracer style) -->
                <rect x="8" y="44" width="36" height="26" rx="2" stroke="rgba(255,255,255,0.9)" stroke-width="2"/>
                <line x1="26" y1="70" x2="26" y2="75" stroke="rgba(255,255,255,0.7)" stroke-width="2"/>
                <path d="M18 75 L34 75 L30 79 L22 79 Z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/>
                <rect x="12" y="48" width="28" height="18" rx="1" fill="rgba(255,255,255,0.1)"/>
                <text x="26" y="60" text-anchor="middle" fill="rgba(255,255,255,0.85)" font-size="6" font-family="monospace" font-weight="bold">PC-1</text>

                <!-- PC-2 -->
                <rect x="8" y="144" width="36" height="26" rx="2" stroke="rgba(255,255,255,0.9)" stroke-width="2"/>
                <line x1="26" y1="170" x2="26" y2="175" stroke="rgba(255,255,255,0.7)" stroke-width="2"/>
                <path d="M18 175 L34 175 L30 179 L22 179 Z" stroke="rgba(255,255,255,0.7)" stroke-width="1.5"/>
                <rect x="12" y="148" width="28" height="18" rx="1" fill="rgba(255,255,255,0.1)"/>
                <text x="26" y="160" text-anchor="middle" fill="rgba(255,255,255,0.85)" font-size="6" font-family="monospace" font-weight="bold">PC-2</text>

                <!-- Switch (Packet Tracer style) -->
                <rect x="85" y="92" width="62" height="26" rx="3" stroke="rgba(255,255,255,0.9)" stroke-width="2"/>
                <line x1="93" y1="106" x2="139" y2="106" stroke="rgba(255,255,255,0.2)" stroke-width="1"/>
                <circle cx="97" cy="111" r="2.5" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                <circle cx="107" cy="111" r="2.5" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                <circle cx="117" cy="111" r="2.5" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                <circle cx="127" cy="111" r="2.5" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                <circle cx="137" cy="111" r="2.5" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"/>
                <circle cx="97" cy="111" r="2" fill="#c084fc" class="pulse-dot"/>
                <circle cx="117" cy="111" r="2" fill="#c084fc" class="pulse-dot"/>
                <circle cx="137" cy="111" r="2" fill="#c084fc" class="pulse-dot"/>
                <text x="116" y="104" text-anchor="middle" fill="rgba(255,255,255,0.85)" font-size="7" font-family="monospace" font-weight="bold">Switch</text>

                <!-- Router (Packet Tracer style) -->
                <rect x="176" y="88" width="48" height="34" rx="9" stroke="rgba(255,255,255,0.9)" stroke-width="2"/>
                <path d="M182 105 L190 98 L190 102 L196 102 L196 108 L190 108 L190 112 Z" fill="rgba(255,255,255,0.7)"/>
                <path d="M218 105 L210 98 L210 102 L204 102 L204 108 L210 108 L210 112 Z" fill="rgba(255,255,255,0.7)"/>
                <text x="200" y="120" text-anchor="middle" fill="rgba(255,255,255,0.85)" font-size="7" font-family="monospace" font-weight="bold">Router</text>

                <!-- Server (Packet Tracer style) -->
                <rect x="90" y="196" width="52" height="48" rx="3" stroke="rgba(255,255,255,0.9)" stroke-width="2"/>
                <rect x="96" y="202" width="40" height="5" rx="1" fill="rgba(255,255,255,0.5)"/>
                <rect x="96" y="212" width="40" height="3" rx="0.5" fill="rgba(255,255,255,0.15)"/>
                <rect x="96" y="219" width="40" height="3" rx="0.5" fill="rgba(255,255,255,0.15)"/>
                <rect x="96" y="226" width="40" height="10" rx="1" fill="rgba(255,255,255,0.2)" stroke="rgba(255,255,255,0.4)" stroke-width="0.5"/>
                <rect x="96" y="240" width="40" height="3" rx="0.5" fill="rgba(255,255,255,0.15)"/>
                <text x="116" y="232" text-anchor="middle" fill="rgba(255,255,255,0.85)" font-size="7" font-family="monospace" font-weight="bold">Server</text>

                <!-- Animated data packets -->
                <circle r="3" fill="#e9d5ff"><animateMotion dur="2.5s" repeatCount="indefinite" path="M44 57 L85 105"/></circle>
                <circle r="3" fill="#e9d5ff"><animateMotion dur="3s" repeatCount="indefinite" begin="0.8s" path="M44 157 L85 110"/></circle>
                <circle r="3" fill="#e9d5ff"><animateMotion dur="2s" repeatCount="indefinite" begin="1s" path="M147 105 L176 105"/></circle>
                <circle r="3" fill="#e9d5ff"><animateMotion dur="3.5s" repeatCount="indefinite" begin="0.5s" path="M116 118 L115 200"/></circle>
                <text x="158" y="103" fill="rgba(255,255,255,0.12)" font-size="4" font-family="monospace">UTP</text>
            </svg>

            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-purple-300 animate-pulse"></span>
                <span class="text-white/60 text-base mono tracking-widest">Networking</span>
            </div>
        </div>
    </section>

    <section class="py-24 section-alt">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-dark p-8">
                    <span class="text-4xl mb-6 block" style="color: var(--text-secondary);">01</span>
                    <h3 class="font-bold text-xl mb-3">Coding</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--text-secondary);">HTML, CSS, JavaScript, PHP, Laravel. Dari nol sampai bisa bikin web sendiri.</p>
                </div>
                <div class="card-dark p-8">
                    <span class="text-4xl mb-6 block" style="color: var(--text-secondary);">02</span>
                    <h3 class="font-bold text-xl mb-3">Jaringan</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--text-secondary);">Mikrotik, routing, switching. Praktek langsung di lab komputer.</p>
                </div>
                <div class="card-dark p-8">
                    <span class="text-4xl mb-6 block" style="color: var(--text-secondary);">03</span>
                    <h3 class="font-bold text-xl mb-3">Kolaborasi</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--text-secondary);">Kerja tim, saling bantu. Suasana kelas yang kompak dan solid.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24" style="background: var(--bg-page);">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14">
                <div>
                    <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-3">Profile</p>
                    <h2 class="text-4xl font-bold" style="color: var(--text-primary);">Sekilas tentang<br>X TJKT</h2>
                </div>
                <div class="flex gap-4 sm:gap-8 mt-6 md:mt-0">
                    <div class="text-right">
                        <span class="mono text-2xl sm:text-3xl font-bold" style="color: var(--text-primary);">41</span>
                        <p class="text-xs mt-1" style="color: var(--text-muted);">Siswa</p>
                        <p class="mono text-[10px]" style="color: var(--text-muted);">25M / 16F</p>
                    </div>
                    <div class="text-right">
                        <span class="mono text-3xl font-bold" style="color: var(--text-primary);">11</span>
                        <p class="text-xs mt-1" style="color: var(--text-muted);">Mapel</p>
                        <p class="mono text-[10px]" style="color: var(--text-muted);">kejuruan + umum</p>
                    </div>
                    <div class="text-right">
                        <span class="mono text-3xl font-bold" style="color: var(--text-primary);">5</span>
                        <p class="text-xs mt-1" style="color: var(--text-muted);">Hari</p>
                        <p class="mono text-[10px]" style="color: var(--text-muted);">Senin &ndash; Jumat</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-900 p-10 md:p-14 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <p class="text-white/50 text-xs mono tracking-widest uppercase mb-2">Instagram</p>
                    <p class="text-white text-lg font-semibold">Ikuti @x.tjktogether1</p>
                </div>
                <div class="flex gap-3">
                    <a href="https://www.instagram.com/x.tjktogether1/" target="_blank" rel="noopener noreferrer" class="bg-purple-600 hover:bg-purple-500 text-white px-6 py-3 font-semibold text-sm transition-colors inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"/></svg>
                        Follow
                    </a>
                    <a href="/galeri" class="border border-white/20 hover:border-white/40 text-white px-6 py-3 font-semibold text-sm transition-colors">
                        Galeri
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="nav-bar border-t py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm" style="color: var(--text-muted);">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
            <p class="mono text-xs" style="color: var(--text-muted);">Teknik Jaringan Komputer dan Telekomunikasi</p>
        </div>
    </footer>

</body>
</html>
