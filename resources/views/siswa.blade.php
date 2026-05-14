<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Siswa — X TJKT</title>
    <link rel="icon" href="/favicon.ico">
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        .card-siswa { background: var(--bg-card); box-shadow: var(--shadow-card); }
        .card-siswa:hover { transform: translateY(-6px); box-shadow: var(--shadow-hover); }
        .wali-card { background: var(--bg-wali, #f0ede9); }
        body.dark .wali-card { background: var(--bg-wali-dark, #242120); }
        .search-input { background: var(--input-bg); border-color: var(--border); color: var(--text-primary); }
        .search-input::placeholder { color: var(--text-muted); }
        .filter-btn { border-color: var(--border); color: var(--text-secondary); background: var(--bg-card); }
        .filter-btn:hover { border-color: #7c3aed; background: rgba(124,58,237,0.05); }
        .filter-btn-female:hover { border-color: #ec4899; background: rgba(236,72,153,0.05); }
    </style>
</head>
<body>

    <nav class="nav-bar border-b">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
            <a href="/" class="font-bold text-lg flex items-center gap-1.5">
                <span class="w-2 h-2 bg-purple-600 inline-block"></span>
                X TJKT
            </a>
            <div class="max-md:hidden md:flex items-center gap-6 text-sm">
                <a href="/" class="text-stone-400 hover:text-stone-900 transition-colors dark:text-stone-500 dark:hover:text-stone-200">Beranda</a>
                <a href="/siswa" class="text-purple-600 font-medium">Siswa</a>
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
            <a href="/" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Beranda</a>
            <a href="/siswa" class="block text-purple-600 font-medium">Siswa</a>
            <a href="/galeri" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Galeri</a>
            <a href="/jadwal" class="block text-stone-400 hover:text-stone-900 dark:hover:text-stone-200">Jadwal</a>
        </div>
    </nav>

    @php
        $students = [
            (object)['inisial' => 'AM', 'nama' => 'Adib Marzuqi', 'absen' => 1, 'gender' => 'male'],
            (object)['inisial' => 'AR', 'nama' => 'Adika Rian Pratama', 'absen' => 2, 'gender' => 'male', 'roles' => ['Kebersihan']],
            (object)['inisial' => 'AAP', 'nama' => 'Aditya Anugrah Pratama', 'absen' => 3, 'gender' => 'male', 'roles' => ['Wakil Kelas', 'Kebersihan']],
            (object)['inisial' => 'AG', 'nama' => 'Aghniyanti', 'absen' => 4, 'gender' => 'female', 'roles' => ['Olahraga']],
            (object)['inisial' => 'ZG', 'nama' => 'Ahmad Ziyad Ghilman', 'absen' => 5, 'gender' => 'male', 'roles' => ['Dokumentasi']],
            (object)['inisial' => 'AJ', 'nama' => 'Ahmar Januar', 'absen' => 6, 'gender' => 'male', 'roles' => ['Ketua Kelas']],
            (object)['inisial' => 'AS', 'nama' => 'Akhdan Al Syafril', 'absen' => 7, 'gender' => 'male'],
            (object)['inisial' => 'AS', 'nama' => 'Alfin Saefullah', 'absen' => 8, 'gender' => 'male'],
            (object)['inisial' => 'FM', 'nama' => 'Alfito Monaris', 'absen' => 9, 'gender' => 'male'],
            (object)['inisial' => 'SN', 'nama' => 'Azrelia Sri Ningsih', 'absen' => 10, 'gender' => 'female', 'roles' => ['Bendahara']],
            (object)['inisial' => 'BA', 'nama' => 'Bilqis Auliatul Mukaromah', 'absen' => 11, 'gender' => 'female', 'roles' => ['Keamanan']],
            (object)['inisial' => 'BA', 'nama' => 'Bryan Tugus Abiyanto', 'absen' => 12, 'gender' => 'male', 'roles' => ['Keagamaan']],
            (object)['inisial' => 'DK', 'nama' => 'Damar Karuna Munggara', 'absen' => 13, 'gender' => 'male'],
            (object)['inisial' => 'FY', 'nama' => 'Fitri Yanti', 'absen' => 14, 'gender' => 'female'],
            (object)['inisial' => 'YK', 'nama' => 'Hafizh Yudi Kusnadi', 'absen' => 15, 'gender' => 'male'],
            (object)['inisial' => 'IN', 'nama' => 'Izza Nafisah', 'absen' => 16, 'gender' => 'female'],
            (object)['inisial' => 'KK', 'nama' => 'Kirana Khoirunnisa', 'absen' => 17, 'gender' => 'female'],
            (object)['inisial' => 'LH', 'nama' => 'Lutvia Haerunnisa', 'absen' => 18, 'gender' => 'female', 'roles' => ['Dokumentasi', 'Kebersihan']],
            (object)['inisial' => 'FH', 'nama' => 'M. Fajar Hafid', 'absen' => 19, 'gender' => 'male', 'roles' => ['Olahraga']],
            (object)['inisial' => 'RP', 'nama' => 'Mochamad Reza Pratama', 'absen' => 20, 'gender' => 'male'],
            (object)['inisial' => 'GS', 'nama' => 'Muhamad Gana Suganda', 'absen' => 21, 'gender' => 'male'],
            (object)['inisial' => 'IF', 'nama' => 'Muhamad Ikhwan Farizi', 'absen' => 22, 'gender' => 'male'],
            (object)['inisial' => 'MA', 'nama' => 'Muhammad Azzam', 'absen' => 23, 'gender' => 'male', 'roles' => ['Dokumentasi']],
            (object)['inisial' => 'DF', 'nama' => 'Muhammad Daffa Fuadi', 'absen' => 24, 'gender' => 'male'],
            (object)['inisial' => 'FR', 'nama' => 'Muhammad Fajar Rizkiyansyah', 'absen' => 25, 'gender' => 'male', 'roles' => ['Keamanan']],
            (object)['inisial' => 'MI', 'nama' => 'Muhammad Ilham', 'absen' => 26, 'gender' => 'male'],
            (object)['inisial' => 'RW', 'nama' => 'Muhammad Ridho Walidaen', 'absen' => 27, 'gender' => 'male'],
            (object)['inisial' => 'NA', 'nama' => 'Novi Agustina', 'absen' => 28, 'gender' => 'female', 'roles' => ['Dokumentasi']],
            (object)['inisial' => 'PR', 'nama' => 'Pilar Ramadhan', 'absen' => 29, 'gender' => 'male'],
            (object)['inisial' => 'PM', 'nama' => 'Puteri Febriyanti Maulida', 'absen' => 30, 'gender' => 'female'],
            (object)['inisial' => 'PA', 'nama' => 'Putri Aisah', 'absen' => 31, 'gender' => 'female', 'roles' => ['Kebersihan']],
            (object)['inisial' => 'QO', 'nama' => 'Queenshya Diana Olivia', 'absen' => 32, 'gender' => 'female'],
            (object)['inisial' => 'RD', 'nama' => 'Razky Ahmad Ramdhani', 'absen' => 33, 'gender' => 'male'],
            (object)['inisial' => 'RF', 'nama' => 'Renzi Arya Fadilah', 'absen' => 34, 'gender' => 'male', 'roles' => ['Dokumentasi', 'Kebersihan']],
            (object)['inisial' => 'ND', 'nama' => 'Salsabila Nurul Dzihni', 'absen' => 35, 'gender' => 'female', 'roles' => ['Sekretaris']],
            (object)['inisial' => 'SF', 'nama' => 'Sheryl Aprilia Fernanda', 'absen' => 36, 'gender' => 'female'],
            (object)['inisial' => 'SM', 'nama' => 'Siti Maysaroh', 'absen' => 37, 'gender' => 'female'],
            (object)['inisial' => 'SA', 'nama' => 'Syifa Aulia Sari', 'absen' => 38, 'gender' => 'female', 'roles' => ['Bendahara']],
            (object)['inisial' => 'TH', 'nama' => 'Tri Azhar Al Habsyi', 'absen' => 39, 'gender' => 'male', 'roles' => ['Keagamaan']],
            (object)['inisial' => 'UA', 'nama' => 'Unzila Azzahra', 'absen' => 40, 'gender' => 'female', 'roles' => ['Sekretaris']],
            (object)['inisial' => 'CS', 'nama' => 'Wisnu Chaidir Syahban', 'absen' => 41, 'gender' => 'male'],
        ];
    @endphp

    <div class="max-w-6xl mx-auto px-6 py-16">
        <div class="mb-12">
            <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-3">Angkatan 2025/2026</p>
            <h1 class="text-4xl font-bold" style="color: var(--text-primary);">Daftar Siswa</h1>
            <p class="mt-2" style="color: var(--text-secondary);">Total 41 siswa &mdash; 25 putra, 16 putri</p>
        </div>

        <div class="wali-card border-l-4 border-purple-600 p-6 mb-10 rounded-r-xl">
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-purple-600 flex items-center justify-center text-lg font-bold text-white mono shrink-0">HS</div>
                <div>
                    <p class="mono text-[10px] text-purple-600 font-medium tracking-widest uppercase mb-1">Wali Kelas</p>
                    <h3 class="text-xl font-bold" style="color: var(--text-primary);">Hermanto S.KOM</h3>
                </div>
            </div>
        </div>

        @php
            $struktur = [
                (object)['jabatan' => 'Ketua Kelas', 'nama' => 'Ahmar Januar', 'inisial' => 'AJ', 'absen' => 6],
                (object)['jabatan' => 'Wakil Kelas', 'nama' => 'Aditya Anugrah Pratama', 'inisial' => 'AAP', 'absen' => 3],
                (object)['jabatan' => 'Bendahara', 'nama' => 'Azrelia Sri Ningsih', 'inisial' => 'SN', 'absen' => 10],
                (object)['jabatan' => 'Bendahara', 'nama' => 'Syifa Aulia Sari', 'inisial' => 'SA', 'absen' => 38],
                (object)['jabatan' => 'Sekretaris', 'nama' => 'Salsabila Nurul Dzihni', 'inisial' => 'ND', 'absen' => 35],
                (object)['jabatan' => 'Sekretaris', 'nama' => 'Unzila Azzahra', 'inisial' => 'UA', 'absen' => 40],
                (object)['jabatan' => 'Olahraga', 'nama' => 'Aghniyanti', 'inisial' => 'AG', 'absen' => 4],
                (object)['jabatan' => 'Olahraga', 'nama' => 'M. Fajar Hafid', 'inisial' => 'FH', 'absen' => 19],
                (object)['jabatan' => 'Keagamaan', 'nama' => 'Bryan Tugus Abiyanto', 'inisial' => 'BA', 'absen' => 12],
                (object)['jabatan' => 'Keagamaan', 'nama' => 'Tri Azhar Al Habsyi', 'inisial' => 'TH', 'absen' => 39],
                (object)['jabatan' => 'Dokumentasi', 'nama' => 'Muhammad Azzam', 'inisial' => 'MA', 'absen' => 23],
                (object)['jabatan' => 'Dokumentasi', 'nama' => 'Ahmad Ziyad Ghilman', 'inisial' => 'ZG', 'absen' => 5],
                (object)['jabatan' => 'Dokumentasi', 'nama' => 'Lutvia Haerunnisa', 'inisial' => 'LH', 'absen' => 18],
                (object)['jabatan' => 'Dokumentasi', 'nama' => 'Novi Agustina', 'inisial' => 'NA', 'absen' => 28],
                (object)['jabatan' => 'Dokumentasi', 'nama' => 'Renzi Arya Fadilah', 'inisial' => 'RF', 'absen' => 34],
                (object)['jabatan' => 'Kebersihan', 'nama' => 'Renzi Arya Fadilah', 'inisial' => 'RF', 'absen' => 34],
                (object)['jabatan' => 'Kebersihan', 'nama' => 'Adika Rian Pratama', 'inisial' => 'AR', 'absen' => 2],
                (object)['jabatan' => 'Kebersihan', 'nama' => 'Putri Aisah', 'inisial' => 'PA', 'absen' => 31],
                (object)['jabatan' => 'Kebersihan', 'nama' => 'Aditya Anugrah Pratama', 'inisial' => 'AAP', 'absen' => 3],
                (object)['jabatan' => 'Kebersihan', 'nama' => 'Lutvia Haerunnisa', 'inisial' => 'LH', 'absen' => 18],
                (object)['jabatan' => 'Keamanan', 'nama' => 'Muhammad Fajar Rizkiyansyah', 'inisial' => 'FR', 'absen' => 25],
                (object)['jabatan' => 'Keamanan', 'nama' => 'Bilqis Auliatul Mukaromah', 'inisial' => 'BA', 'absen' => 11],
            ];
            $roleColors = [
                'Ketua Kelas' => ['bg' => '#7c3aed', 'text' => 'white'],
                'Wakil Kelas' => ['bg' => '#7c3aed', 'text' => 'white'],
                'Bendahara' => ['bg' => '#059669', 'text' => 'white'],
                'Sekretaris' => ['bg' => '#2563eb', 'text' => 'white'],
                'Olahraga' => ['bg' => '#d97706', 'text' => 'white'],
                'Keagamaan' => ['bg' => '#dc2626', 'text' => 'white'],
                'Dokumentasi' => ['bg' => '#0891b2', 'text' => 'white'],
                'Kebersihan' => ['bg' => '#65a30d', 'text' => 'white'],
                'Keamanan' => ['bg' => '#4f46e5', 'text' => 'white'],
            ];
        @endphp

        @php
            $grouped = [];
            foreach ($struktur as $p) $grouped[$p->jabatan][] = $p;
        @endphp
        <div class="mb-12">
            <p class="mono text-xs text-purple-600 font-medium tracking-widest uppercase mb-5">Struktur Kelas</p>
            <div class="space-y-1">
                @foreach($grouped as $jabatan => $anggota)
                <div class="flex items-center gap-3 py-2.5 border-b" style="border-color: var(--border);">
                    <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background: {{ $roleColors[$jabatan]['bg'] }};"></span>
                    <span class="mono text-xs font-semibold w-24 shrink-0" style="color: {{ $roleColors[$jabatan]['bg'] }};">{{ $jabatan }}</span>
                    <span class="text-sm leading-relaxed" style="color: var(--text-primary);">
                    @foreach($anggota as $idx => $a)
                        {{ $idx > 0 ? '· ' : '' }}<span class="font-medium">{{ $a->nama }}</span>
                    @endforeach
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <input id="searchInput" type="text" placeholder="Cari nama atau nomor absen..." class="search-input border py-2.5 px-4 text-sm w-full sm:w-72 focus:outline-none focus:border-purple-400 rounded-lg">
            <div class="flex gap-2 text-sm">
                <button data-filter="all" class="filter-btn px-4 py-2 bg-purple-600 text-white font-medium mono rounded-lg !border-purple-600 !text-white">Semua</button>
                <button data-filter="male" class="filter-btn px-4 py-2 border mono rounded-lg">M</button>
                <button data-filter="female" class="filter-btn px-4 py-2 border mono rounded-lg filter-btn-female">F</button>
            </div>
        </div>

        <div id="cardGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-10">
            @foreach($students as $s)
            <div class="card-siswa rounded-xl p-5 text-center transition-all cursor-pointer" data-gender="{{ $s->gender }}" data-name="{{ strtolower($s->nama) }}" data-absen="{{ $s->absen }}">
                <div class="w-14 h-14 rounded-full mx-auto mb-3 flex items-center justify-center text-base font-bold mono" style="background: {{ $s->gender === 'male' ? '#ede9fe' : '#fdf2f8' }}; color: {{ $s->gender === 'male' ? '#7c3aed' : '#ec4899' }};">
                    {{ $s->inisial }}
                </div>
                <h3 class="text-sm font-semibold truncate" style="color: var(--text-primary);">{{ $s->nama }}</h3>
                <p class="mono text-xs mt-1" style="color: var(--text-muted);">#{{ $s->absen }}</p>
                @if(isset($s->roles))
                    @foreach($s->roles as $ridx => $r)
                <p class="mono text-[10px] mt-1 font-semibold" style="color: {{ $roleColors[$r]['bg'] }};">{{ $r }}</p>
                    @endforeach
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <footer class="border-t py-10" style="border-color: var(--border); background: var(--bg-nav);">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm" style="color: var(--text-muted);">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
            <p class="mono text-xs" style="color: var(--text-muted);">Teknik Jaringan Komputer dan Telekomunikasi</p>
        </div>
    </footer>

<script>
const searchInput = document.getElementById('searchInput');
const filterBtns = document.querySelectorAll('.filter-btn');
const cards = document.querySelectorAll('[data-gender]');
let activeFilter = 'all';

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => {
            b.className = 'filter-btn px-4 py-2 border mono rounded-lg' + (b.dataset.filter === 'female' ? ' filter-btn-female' : '');
        });
        btn.className = 'filter-btn px-4 py-2 bg-purple-600 text-white font-medium mono rounded-lg !border-purple-600 !text-white';
        activeFilter = btn.dataset.filter;
        filterCards();
    });
});

searchInput.addEventListener('input', filterCards);

function filterCards() {
    const query = searchInput.value.toLowerCase().trim();
    cards.forEach(card => {
        const name = card.dataset.name;
        const absen = card.dataset.absen;
        const gender = card.dataset.gender;
        const show = (name.includes(query) || String(absen).includes(query)) && (activeFilter === 'all' || gender === activeFilter);
        card.style.display = show ? '' : 'none';
    });
}

</script>
</body>
</html>
