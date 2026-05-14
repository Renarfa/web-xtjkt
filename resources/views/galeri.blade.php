<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri — X TJKT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .gal-item {
            background: var(--surface);
            border: 1px solid var(--garis);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.2s ease;
        }
        .gal-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            border-color: var(--ungu);
        }

        .gal-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        @media (min-width: 640px) {
            .gal-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (min-width: 1024px) {
            .gal-grid {
                grid-template-columns: 1.2fr 0.8fr 1fr;
            }
            .gal-grid > :nth-child(2) {
                margin-top: 2rem;
            }
            .gal-grid > :nth-child(3) {
                margin-top: 1rem;
            }
        }

        .ig-embed {
            background: var(--page);
            display: flex;
            align-items: center;
            justify-content: center;
            aspect-ratio: 1;
            position: relative;
            overflow: hidden;
        }
        .ig-embed > blockquote {
            position: absolute;
            inset: 0;
            width: 100% !important;
            height: 100% !important;
        }
        .ig-fallback {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: var(--teks-muted);
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

<nav class="nav-wrap fixed top-0 left-0 right-0 z-40">
    <div class="max-w-6xl mx-auto px-5 flex items-center justify-between h-14">
        <a href="/" class="flex items-center gap-2 shrink-0">
            <span class="w-2 h-2 rounded-sm" style="background: var(--ungu);"></span>
            <span class="font-bold text-sm tracking-tight">X TJKT</span>
        </a>
        <div class="hidden md:flex items-center gap-0.5">
            <a href="/" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Beranda</a>
            <a href="/siswa" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Siswa</a>
            <a href="/galeri" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--ungu); font-weight: 500;">Galeri</a>
            <a href="/jadwal" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Jadwal</a>
        </div>
        <div class="flex items-center gap-1.5">
            <button id="themeToggle" class="w-9 h-9 rounded-lg flex items-center justify-center transition cursor-pointer" style="border: 1px solid var(--garis); color: var(--teks-second);" title="Theme">
                <svg id="sunIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                <svg id="moonIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
            </button>
            <button id="menuToggle" class="md:hidden w-9 h-9 rounded-lg flex items-center justify-center transition cursor-pointer" style="border: 1px solid var(--garis); color: var(--teks-second);" title="Menu">
                <svg id="menuIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg id="closeIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    <div id="mobileMenu" class="md:hidden border-t px-5 py-3 space-y-1" style="background: var(--surface); border-color: var(--garis); display: none;">
        <a href="/" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Beranda</a>
        <a href="/siswa" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Siswa</a>
        <a href="/galeri" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--ungu);">Galeri</a>
        <a href="/jadwal" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Jadwal</a>
    </div>
</nav>

<div style="padding-top: 5.5rem;">
    <div class="max-w-6xl mx-auto px-5 py-10">
        <div style="margin-bottom: 2rem;">
            <span class="mono" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ungu);">Dokumentasi</span>
            <h1 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.4rem; letter-spacing: -0.02em;">Galeri</h1>
            <p style="font-size: 0.85rem; color: var(--teks-second); margin-top: 0.3rem;">Momen-momen kelas X TJKT</p>
        </div>

        <div class="gal-grid">
            <div class="gal-item">
                <div class="ig-embed">
                    <div class="ig-fallback">
                        <svg class="w-8 h-8" style="color: var(--teks-muted); opacity: 0.4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                        <span class="mono" style="font-size: 0.65rem;">Instagram</span>
                    </div>
                    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/DTwxupxj4Yb/" data-instgrm-version="14" style="display: none;"></blockquote>
                </div>
                <div style="padding: 0.8rem 1rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-weight: 600; font-size: 0.85rem;">Kegiatan Kelas</p>
                        <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">Instagram</p>
                    </div>
                    <a href="https://www.instagram.com/p/DTwxupxj4Yb/" target="_blank" rel="noopener noreferrer" class="mono" style="font-size: 0.65rem; color: var(--ungu);">Buka</a>
                </div>
            </div>

            <div class="gal-item">
                <div class="ig-embed">
                    <div class="ig-fallback">
                        <svg class="w-8 h-8" style="color: var(--teks-muted); opacity: 0.4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/></svg>
                        <span class="mono" style="font-size: 0.65rem;">Reels</span>
                    </div>
                    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DPTTkc2j8-8/" data-instgrm-version="14" style="display: none;"></blockquote>
                </div>
                <div style="padding: 0.8rem 1rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-weight: 600; font-size: 0.85rem;">Momen Seru</p>
                        <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">Reels</p>
                    </div>
                    <a href="https://www.instagram.com/reel/DPTTkc2j8-8/" target="_blank" rel="noopener noreferrer" class="mono" style="font-size: 0.65rem; color: var(--ungu);">Buka</a>
                </div>
            </div>

            <div class="gal-item">
                <div class="ig-embed">
                    <div class="ig-fallback">
                        <svg class="w-8 h-8" style="color: var(--teks-muted); opacity: 0.4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"/></svg>
                        <span class="mono" style="font-size: 0.65rem;">Reels</span>
                    </div>
                    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DN0S6sSXshw/" data-instgrm-version="14" style="display: none;"></blockquote>
                </div>
                <div style="padding: 0.8rem 1rem; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-weight: 600; font-size: 0.85rem;">Reel</p>
                        <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">Instagram</p>
                    </div>
                    <a href="https://www.instagram.com/reel/DN0S6sSXshw/" target="_blank" rel="noopener noreferrer" class="mono" style="font-size: 0.65rem; color: var(--ungu);">Buka</a>
                </div>
            </div>
        </div>

        <div class="card rounded-xl" style="max-width: 28rem; margin: 2rem auto 0; text-align: center; padding: 1.5rem;">
            <p style="font-size: 0.85rem; color: var(--teks-second);">
                Ikuti <span style="color: var(--ungu); font-weight: 600;">@x.tjktogether1</span> di Instagram
            </p>
        </div>
    </div>
</div>

<script async src="//www.instagram.com/embed.js"></script>

<footer style="border-top: 1px solid var(--garis); background: var(--surface);">
    <div class="max-w-6xl mx-auto px-5 py-8">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 0.5rem;">
            <p style="font-size: 0.75rem; color: var(--teks-muted);">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
            <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">TJKT</p>
        </div>
    </div>
</footer>

<script>
(function() {
    var menuToggle = document.getElementById('menuToggle');
    var mobileMenu = document.getElementById('mobileMenu');
    var menuIcon = document.getElementById('menuIcon');
    var closeIcon = document.getElementById('closeIcon');

    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            var open = mobileMenu.style.display === 'block';
            mobileMenu.style.display = open ? 'none' : 'block';
            if (menuIcon) menuIcon.classList.toggle('hidden', !open);
            if (closeIcon) closeIcon.classList.toggle('hidden', open);
        });
    }

    var themeToggle = document.getElementById('themeToggle');
    var sunIcon = document.getElementById('sunIcon');
    var moonIcon = document.getElementById('moonIcon');

    function setTheme(dark) {
        document.body.classList.toggle('dark', dark);
        if (sunIcon) sunIcon.classList.toggle('hidden', !dark);
        if (moonIcon) moonIcon.classList.toggle('hidden', dark);
        try { localStorage.setItem('theme', dark ? 'dark' : 'light'); } catch(e) {}
    }

    try {
        var saved = localStorage.getItem('theme');
        if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) setTheme(true);
    } catch(e) {}

    if (themeToggle) themeToggle.addEventListener('click', function() { setTheme(!document.body.classList.contains('dark')); });
})();
</script>

</body>
</html>