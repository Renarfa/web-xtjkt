<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Siswa — X TJKT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .siswa-card {
            background: var(--surface);
            border: 1px solid var(--garis);
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            transition: all 0.2s ease;
            cursor: default;
        }
        .siswa-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            border-color: var(--ungu);
        }

        .cari {
            background: var(--surface);
            border: 1px solid var(--garis);
            color: var(--teks);
            padding: 0.6rem 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            width: 100%;
            outline: none;
            transition: border-color 0.2s;
        }
        .cari:focus {
            border-color: var(--ungu);
        }
        .cari::placeholder {
            color: var(--teks-muted);
        }

        .filter-btn {
            padding: 0.4rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-family: 'JetBrains Mono', monospace;
            border: 1px solid var(--garis);
            color: var(--teks-second);
            background: transparent;
            cursor: pointer;
            transition: all 0.2s;
        }
        .filter-btn:hover {
            border-color: var(--ungu);
            color: var(--ungu);
        }
        .filter-btn.active {
            background: var(--ungu);
            color: #fff;
            border-color: var(--ungu);
        }

        .struktur-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--garis);
        }
        .struktur-item:last-child {
            border-bottom: none;
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
            <a href="/siswa" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--ungu); font-weight: 500;">Siswa</a>
            <a href="/galeri" class="px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Galeri</a>
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
        <a href="/siswa" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--ungu);">Siswa</a>
        <a href="/galeri" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Galeri</a>
        <a href="/jadwal" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Jadwal</a>
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
    'Ketua Kelas' => '#7c3aed', 'Wakil Kelas' => '#7c3aed', 'Bendahara' => '#059669',
    'Sekretaris' => '#2563eb', 'Olahraga' => '#d97706', 'Keagamaan' => '#dc2626',
    'Dokumentasi' => '#0891b2', 'Kebersihan' => '#65a30d', 'Keamanan' => '#4f46e5',
];

$grouped = [];
foreach ($struktur as $p) $grouped[$p->jabatan][] = $p;
@endphp

<div style="padding-top: 5.5rem;">
    <div class="max-w-6xl mx-auto px-5 py-10">
        <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: start;">
            <div>
                <span class="mono" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ungu);">Angkatan 2025/2026</span>
                <h1 style="font-size: 1.5rem; font-weight: 700; margin-top: 0.4rem; letter-spacing: -0.02em;">Daftar Siswa</h1>
                <p style="font-size: 0.85rem; color: var(--teks-second); margin-top: 0.3rem;">Total 41 siswa — 25 putra, 16 putri</p>
            </div>

            <div class="card rounded-xl p-4 md:p-5" style="background: var(--ungu-lembut); border-color: var(--ungu);">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 2.8rem; height: 2.8rem; border-radius: 10px; background: var(--ungu); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; color: #fff; font-family: 'JetBrains Mono', monospace;">HS</div>
                    <div>
                        <span class="mono" style="font-size: 0.6rem; font-weight: 600; color: var(--ungu); text-transform: uppercase; letter-spacing: 0.08em;">Wali Kelas</span>
                        <p style="font-weight: 600; font-size: 0.95rem; margin-top: 0.05rem;">Hermanto S.KOM</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 2rem;">
            <span class="mono" style="font-size: 0.65rem; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ungu);">Struktur Kelas</span>
            <div style="margin-top: 0.75rem; display: grid; grid-template-columns: 1fr; gap: 0;">
                @foreach($grouped as $jabatan => $anggota)
                <div class="struktur-item">
                    <span style="width: 0.4rem; height: 0.4rem; border-radius: 50%; background: {{ $roleColors[$jabatan] }}; flex-shrink: 0;"></span>
                    <span class="mono" style="font-size: 0.65rem; font-weight: 600; color: {{ $roleColors[$jabatan] }}; width: 6rem; flex-shrink: 0;">{{ $jabatan }}</span>
                    <span style="font-size: 0.82rem; color: var(--teks); line-height: 1.5;">
                        @foreach($anggota as $idx => $a)
                            {{ $idx > 0 ? '· ' : '' }}<span style="font-weight: 500;">{{ $a->nama }}</span>
                        @endforeach
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-5 pb-10">
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 0.75rem; margin-bottom: 1.25rem;">
            <input id="searchInput" type="text" placeholder="Cari nama atau nomor absen..." class="cari" style="max-width: 18rem;">
            <div style="display: flex; gap: 0.4rem;">
                <button data-filter="all" class="filter-btn active">Semua</button>
                <button data-filter="male" class="filter-btn">L</button>
                <button data-filter="female" class="filter-btn">P</button>
            </div>
        </div>

        <div id="cardGrid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.6rem;">
            @foreach($students as $s)
            <div class="siswa-card" data-gender="{{ $s->gender }}" data-name="{{ strtolower($s->nama) }}" data-absen="{{ $s->absen }}">
                <div style="width: 2.8rem; height: 2.8rem; border-radius: 10px; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.75rem; font-family: 'JetBrains Mono', monospace; background: {{ $s->gender === 'male' ? '#ede9fe' : '#fdf2f8' }}; color: {{ $s->gender === 'male' ? '#7c3aed' : '#ec4899' }};">
                    {{ $s->inisial }}
                </div>
                <p style="font-weight: 600; font-size: 0.8rem; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $s->nama }}</p>
                <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted); margin-top: 0.15rem;">#{{ $s->absen }}</p>
                @if(isset($s->roles))
                    @foreach($s->roles as $r)
                    <span style="display: inline-block; font-size: 0.55rem; font-family: 'JetBrains Mono', monospace; font-weight: 500; color: {{ $roleColors[$r] }}; background: {{ $roleColors[$r] }}12; padding: 0.1rem 0.4rem; border-radius: 4px; margin-top: 0.2rem;">{{ $r }}</span>
                    @endforeach
                @endif
            </div>
            @endforeach
        </div>
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
    var searchInput = document.getElementById('searchInput');
    var filterBtns = document.querySelectorAll('.filter-btn');
    var cards = document.querySelectorAll('[data-gender]');
    var activeFilter = 'all';

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            filterBtns.forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');
            activeFilter = this.dataset.filter;
            filterCards();
        });
    });

    if (searchInput) searchInput.addEventListener('input', filterCards);

    function filterCards() {
        var query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        cards.forEach(function(card) {
            var name = card.dataset.name;
            var absen = card.dataset.absen;
            var gender = card.dataset.gender;
            var match = (name.includes(query) || String(absen).includes(query));
            var genderMatch = activeFilter === 'all' || gender === activeFilter;
            card.style.display = match && genderMatch ? '' : 'none';
        });
    }

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