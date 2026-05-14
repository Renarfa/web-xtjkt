<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Harian — X TJKT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .hari-card {
            background: var(--surface);
            border: 1px solid var(--garis);
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.2s ease;
        }
        .hari-card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.04);
        }

        .lesson-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0;
            border-bottom: 1px solid var(--garis);
        }
        .lesson-row:last-child {
            border-bottom: none;
        }

        .waktu-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7rem;
            color: var(--teks-muted);
            width: 7rem;
            flex-shrink: 0;
        }

        .jp-badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.6rem;
            color: var(--ungu);
            background: var(--ungu-lembut);
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
            width: 3rem;
            text-align: center;
            flex-shrink: 0;
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
            <a href="/galeri" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Galeri</a>
            <a href="/jadwal" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--ungu); font-weight: 500;">Jadwal</a>
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
        <a href="/galeri" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Galeri</a>
        <a href="/jadwal" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--ungu);">Jadwal</a>
    </div>
</nav>

@php
$days = [
    (object)[
        'id' => 'senin', 'name' => 'Senin', 'date' => '4 Mei 2026',
        'pakaian' => 'Seragam PSAS (putih abu) + atribut lengkap (dasi, sabuk, ID card & name tag) + sepatu pantofel',
        'jadwal' => [
            (object)['time' => '07.50 – 09.10', 'durasi' => '2 JP', 'mapel' => 'Coding'],
            (object)['time' => '09.30 – 11.30', 'durasi' => '3 JP', 'mapel' => 'DDK'],
            (object)['time' => '12.20 – 13.40', 'durasi' => '2 JP', 'mapel' => 'Bahasa Inggris'],
            (object)['time' => '13.40 – 15.00', 'durasi' => '2 JP', 'mapel' => 'Informatika'],
        ],
        'piket' => 'May, Fitri, Sheril, Novi, Adib, Renzi (seksi kebersihan), Azzam, Fajar',
    ],
    (object)[
        'id' => 'selasa', 'name' => 'Selasa', 'date' => '5 Mei 2026',
        'pakaian' => 'Seragam PSAS (putih abu) + atribut lengkap (dasi, sabuk, ID card & name tag) + sepatu pantofel',
        'jadwal' => [
            (object)['time' => '06.30 – 07.50', 'durasi' => '2 JP', 'mapel' => 'Seni Budaya'],
            (object)['time' => '07.50 – 10.10', 'durasi' => '3 JP', 'mapel' => 'DDK'],
            (object)['time' => '10.10 – 11.30', 'durasi' => '2 JP', 'mapel' => 'IPAS'],
            (object)['time' => '11.30 – 13.40', 'durasi' => '2 JP', 'mapel' => 'MTK'],
            (object)['time' => '13.40 – 15.00', 'durasi' => '2 JP', 'mapel' => 'Sejarah'],
        ],
        'piket' => 'Lutfia (seksi kebersihan), Unzil, Aghni, Bilqis, Azhar, Razky, Reza, Damar, Ridho',
    ],
    (object)[
        'id' => 'rabu', 'name' => 'Rabu', 'date' => '6 Mei 2026',
        'pakaian' => 'PSAS (putih abu) + sepatu pantofel, atribut lengkap (dasi, sabuk, ID card, nametag)',
        'jadwal' => [
            (object)['time' => '06.30 – 07.50', 'durasi' => '2 JP', 'mapel' => 'IPAS'],
            (object)['time' => '07.50 – 09.10', 'durasi' => '2 JP', 'mapel' => 'Bahasa Jepang'],
            (object)['time' => '09.30 – 10.50', 'durasi' => '2 JP', 'mapel' => 'Bahasa Indonesia'],
            (object)['time' => '10.50 – 13.00', 'durasi' => '2 JP', 'mapel' => 'Informatika'],
            (object)['time' => '13.00 – 15.00', 'durasi' => '3 JP', 'mapel' => 'DDK'],
        ],
        'piket' => 'Sabil, Queen, Gana, Bryan, Adit (seksi kebersihan), Dafa, Ziad, Akhdan',
    ],
    (object)[
        'id' => 'kamis', 'name' => 'Kamis', 'date' => '7 Mei 2026',
        'pakaian' => 'Seragam Pramuka + sepatu pantofel + kaos kaki hitam, atribut lengkap (sabuk, ID card, nametag)',
        'jadwal' => [
            (object)['time' => '07.10 – 08.50', 'durasi' => '2 JP', 'mapel' => 'Bahasa Indonesia'],
            (object)['time' => '08.50 – 10.10', 'durasi' => '2 JP', 'mapel' => 'IPAS (keselang istirahat)'],
            (object)['time' => '10.10 – 11.30', 'durasi' => '2 JP', 'mapel' => 'Bahasa Inggris'],
            (object)['time' => '11.30 – 13.40', 'durasi' => '2 JP', 'mapel' => 'PKN'],
            (object)['time' => '13.40 – 15.00', 'durasi' => '2 JP', 'mapel' => 'MTK'],
        ],
        'piket' => 'Izza, Putri (seksi kebersihan), Kirana, Fajar R, Hafidz, Ilham, Pilar, Alfito',
    ],
    (object)[
        'id' => 'jumat', 'name' => "Jum'at", 'date' => '8 Mei 2026',
        'pakaian' => 'Baju olahraga (celana training + baju hitam + kerudung hitam bagi perempuan) dari rumah, bisa bawa baju ganti',
        'jadwal' => [
            (object)['time' => '07.10 – 09.10', 'durasi' => '3 JP', 'mapel' => 'PJOK'],
            (object)['time' => '09.30 – 11.30', 'durasi' => '3 JP', 'mapel' => 'PAI'],
            (object)['time' => '13.00 – 15.00', 'durasi' => '3 JP', 'mapel' => 'DDK'],
        ],
        'piket' => 'Puteri, Azrel, Syifa, Wisnu, Januar, Adika (seksi kebersihan), Ikhwan, Alfin',
    ],
];
@endphp

<div style="padding-top: 5.5rem;">
    <div class="max-w-4xl mx-auto px-5 py-10">
        <div style="margin-bottom: 2.5rem;">
            <span class="mono" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ungu);">2025/2026</span>
            <h1 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.4rem; letter-spacing: -0.02em;">Jadwal Harian</h1>
            <p style="font-size: 0.85rem; color: var(--teks-second); margin-top: 0.3rem;">Senin &ndash; Jumat</p>
        </div>

        @foreach($days as $day)
            @php
                $totalMnt = 0;
                foreach ($day->jadwal as $l) $totalMnt += (int)$l->durasi * 45;
                $totalJam = intdiv($totalMnt, 60);
                $totalSisa = $totalMnt % 60;
            @endphp

            <div class="hari-card" style="margin-bottom: 1rem;">
                <div style="background: var(--surface); border-bottom: 1px solid var(--garis); padding: 0.9rem 1.25rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.6rem;">
                        <span style="font-weight: 700; font-size: 1rem;">{{ $day->name }}</span>
                        <span class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">{{ $day->date }}</span>
                    </div>
                    <span class="mono" style="font-size: 0.65rem; color: var(--ungu);">{{ $totalJam }}j {{ $totalSisa }}m</span>
                </div>

                <div style="padding: 0.6rem 1.25rem; border-bottom: 1px solid var(--garis);">
                    <span class="mono" style="font-size: 0.6rem; font-weight: 600; color: var(--ungu); text-transform: uppercase; letter-spacing: 0.08em;">Pakaian</span>
                    <p style="font-size: 0.8rem; color: var(--teks-second); margin-top: 0.2rem; line-height: 1.5;">{{ $day->pakaian }}</p>
                </div>

                <div style="padding: 0.5rem 1.25rem; border-bottom: 1px solid var(--garis);">
                    <span class="mono" style="font-size: 0.6rem; font-weight: 600; color: var(--ungu); text-transform: uppercase; letter-spacing: 0.08em;">Pelajaran</span>
                    <div style="margin-top: 0.3rem;">
                        @foreach($day->jadwal as $lesson)
                        <div class="lesson-row">
                            <span class="waktu-label">{{ $lesson->time }}</span>
                            <span class="jp-badge">{{ (int)$lesson->durasi * 45 }}m</span>
                            <span style="font-size: 0.85rem; font-weight: 500;">{{ $lesson->mapel }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div style="padding: 0.7rem 1.25rem;">
                    <span class="mono" style="font-size: 0.6rem; font-weight: 600; color: var(--ungu); text-transform: uppercase; letter-spacing: 0.08em;">Piket</span>
                    <p style="font-size: 0.8rem; color: var(--teks-second); margin-top: 0.2rem;">{{ $day->piket }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

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