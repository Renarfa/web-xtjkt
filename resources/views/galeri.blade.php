<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri — X TJKT</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased">

    <nav class="nav-bar border-b">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
            <a href="/" class="font-bold text-lg flex items-center gap-1.5">
                <span class="w-2 h-2 bg-purple-600 inline-block"></span>
                X TJKT
            </a>
            <div class="flex items-center gap-6 text-sm">
                <a href="/" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Beranda</a>
                <a href="/siswa" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Siswa</a>
                <a href="/galeri" class="text-purple-600 font-medium">Galeri</a>
                <a href="/jadwal" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Jadwal</a>
                <button id="themeToggle" class="theme-toggle" title="Toggle dark mode">
                    <svg id="sunIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                    <svg id="moonIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                </button>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-6 py-16">
        <div class="mb-12">
            <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-3">Dokumentasi</p>
            <h1 class="text-4xl font-bold" style="color: var(--text-primary);">Galeri</h1>
            <p class="mt-2" style="color: var(--text-secondary);">Momen-momen kelas X TJKT</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-16">
            <div class="card-dark border rounded-xl overflow-hidden">
                <div class="aspect-square flex items-center justify-center p-4" style="background: var(--bg-page);">
                    <blockquote class="instagram-media w-full" data-instgrm-permalink="https://www.instagram.com/p/DTwxupxj4Yb/" data-instgrm-version="14"></blockquote>
                </div>
                <div class="p-4 border-t flex items-center justify-between" style="border-color: var(--border);">
                    <h3 class="text-sm font-semibold" style="color: var(--text-primary);">Kegiatan Kelas</h3>
                    <a href="https://www.instagram.com/p/DTwxupxj4Yb/" target="_blank" rel="noopener noreferrer" class="mono text-xs text-purple-600 hover:text-purple-500">Buka</a>
                </div>
            </div>
            <div class="card-dark border rounded-xl overflow-hidden">
                <div class="aspect-square flex items-center justify-center p-4" style="background: var(--bg-page);">
                    <blockquote class="instagram-media w-full" data-instgrm-permalink="https://www.instagram.com/reel/DPTTkc2j8-8/" data-instgrm-version="14"></blockquote>
                </div>
                <div class="p-4 border-t flex items-center justify-between" style="border-color: var(--border);">
                    <h3 class="text-sm font-semibold" style="color: var(--text-primary);">Momen Seru</h3>
                    <a href="https://www.instagram.com/reel/DPTTkc2j8-8/" target="_blank" rel="noopener noreferrer" class="mono text-xs text-purple-600 hover:text-purple-500">Buka</a>
                </div>
            </div>
            <div class="card-dark border rounded-xl overflow-hidden">
                <div class="aspect-square flex items-center justify-center p-4" style="background: var(--bg-page);">
                    <blockquote class="instagram-media w-full" data-instgrm-permalink="https://www.instagram.com/reel/DN0S6sSXshw/" data-instgrm-version="14"></blockquote>
                </div>
                <div class="p-4 border-t flex items-center justify-between" style="border-color: var(--border);">
                    <h3 class="text-sm font-semibold" style="color: var(--text-primary);">Reel</h3>
                    <a href="https://www.instagram.com/reel/DN0S6sSXshw/" target="_blank" rel="noopener noreferrer" class="mono text-xs text-purple-600 hover:text-purple-500">Buka</a>
                </div>
            </div>
        </div>

        <script async src="//www.instagram.com/embed.js"></script>

        <div class="card-dark border p-8 text-center max-w-md mx-auto rounded-xl">
            <p style="color: var(--text-secondary);">Ikuti <span class="text-purple-600 font-semibold">@xk_tjkt</span> di Instagram</p>
        </div>
    </div>

    <footer class="nav-bar border-t py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm" style="color: var(--text-muted);">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
            <p class="mono text-xs" style="color: var(--text-muted);">Teknik Jaringan Komputer dan Telekomunikasi</p>
        </div>
    </footer>

<script>
const themeToggle = document.getElementById('themeToggle');
const sunIcon = document.getElementById('sunIcon');
const moonIcon = document.getElementById('moonIcon');

function setTheme(dark) {
    document.body.classList.toggle('dark', dark);
    if (sunIcon) sunIcon.classList.toggle('hidden', !dark);
    if (moonIcon) moonIcon.classList.toggle('hidden', dark);
    localStorage.setItem('theme', dark ? 'dark' : 'light');
}

if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    setTheme(true);
}

if (themeToggle) {
    themeToggle.addEventListener('click', () => setTheme(!document.body.classList.contains('dark')));
}
</script>
</body>
</html>
