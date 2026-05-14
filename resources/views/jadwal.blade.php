<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Harian — X TJKT</title>
    <link rel="icon" href="/favicon.ico">
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .hover-muted { border-color: var(--border); }
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
                <a href="/" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Beranda</a>
                <a href="/siswa" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Siswa</a>
                <a href="/galeri" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Galeri</a>
                <a href="/jadwal" class="text-purple-600 font-medium">Jadwal</a>
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
            <a href="/" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Beranda</a>
            <a href="/siswa" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Siswa</a>
            <a href="/galeri" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Galeri</a>
            <a href="/jadwal" class="block text-purple-600 font-medium">Jadwal</a>
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

    <div class="max-w-4xl mx-auto px-6 py-16">
        <div class="mb-12">
            <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-3">2025/2026</p>
            <h1 class="text-4xl font-bold" style="color: var(--text-primary);">Jadwal Harian</h1>
            <p class="mt-2" style="color: var(--text-secondary);">Senin &ndash; Jumat</p>
        </div>

        @foreach($days as $day)
            @php
                $totalMnt = 0;
                foreach ($day->jadwal as $l) $totalMnt += (int)$l->durasi * 45;
                $totalJam = intdiv($totalMnt, 60);
                $totalSisa = $totalMnt % 60;
            @endphp
            <div class="mb-6 card-dark border rounded-xl overflow-hidden">
                <div class="border-b border-subtle px-6 py-4 flex items-center justify-between" style="background: var(--bg-card);">
                    <div>
                        <h2 class="font-bold text-xl" style="color: var(--text-primary);">{{ $day->name }}</h2>
                        <p class="mono text-xs mt-0.5 text-muted">{{ $day->date }}</p>
                    </div>
                    <div class="text-right">
                        <p class="mono text-[10px] text-purple-600/50 tracking-widest">Total Jam Pelajaran</p>
                        <span class="mono text-sm text-purple-600/70 font-semibold">{{ $totalJam }}j {{ $totalSisa }}m</span>
                    </div>
                </div>

                <div class="px-6 py-4 border-b border-subtle">
                    <p class="mono text-[10px] text-purple-600 font-semibold tracking-widest uppercase mb-2">Pakaian</p>
                    <p class="text-sm leading-relaxed text-secondary">{{ $day->pakaian }}</p>
                </div>

                <div class="px-6 py-4 border-b border-subtle">
                    <p class="mono text-[10px] text-purple-600 font-semibold tracking-widest uppercase mb-3">Pelajaran</p>
                    @foreach($day->jadwal as $lesson)
                    <div class="flex items-center gap-4 py-2 border-b last:border-0" style="border-color: var(--border);">
                        <span class="mono text-xs text-muted w-28 shrink-0">{{ $lesson->time }}</span>
                        <span class="mono text-[10px] text-purple-600/60 w-14 shrink-0">{{ (int)$lesson->durasi * 45 }} mnt</span>
                        <span class="text-sm font-medium" style="color: var(--text-primary);">{{ $lesson->mapel }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="px-6 py-4">
                    <p class="mono text-[10px] text-purple-600 font-semibold tracking-widest uppercase mb-2">Piket</p>
                    <p class="text-sm leading-relaxed text-secondary">{{ $day->piket }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="nav-bar border-t py-10">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-muted">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
            <p class="mono text-xs text-muted">Teknik Jaringan Komputer dan Telekomunikasi</p>
        </div>
    </footer>

</body>
</html>
