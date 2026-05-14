<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>X TJKT — SMK Negeri 1 Lemahabang</title>
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        .hero-grid {
            background-image:
                linear-gradient(var(--garis) 1px, transparent 1px),
                linear-gradient(90deg, var(--garis) 1px, transparent 1px);
            background-size: 56px 56px;
            opacity: 0.25;
        }

        .terminal-window {
            background: #1a1a2e;
            border: 1px solid #2d2d44;
            border-radius: 12px;
            overflow: hidden;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            line-height: 1.6;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        .terminal-header {
            background: #16162a;
            padding: 0.6rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 1px solid #2d2d44;
        }
        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        .terminal-body {
            padding: 1rem 1.1rem;
            color: #c4c4d4;
        }
        .terminal-cursor {
            display: inline-block;
            width: 8px;
            height: 15px;
            background: #7c3aed;
            animation: blink 1s step-end infinite;
            vertical-align: text-bottom;
            margin-left: 2px;
        }
        @keyframes blink {
            50% { opacity: 0; }
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--garis);
            padding: 1rem;
            border-left: 3px solid var(--ungu);
        }

        .profil-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        @media (min-width: 768px) {
            .profil-grid {
                grid-template-columns: 1.2fr 0.8fr;
            }
        }

        .guru-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        @media (min-width: 640px) {
            .guru-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .guru-grid {
                grid-template-columns: repeat(6, 1fr);
            }
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        @media (min-width: 640px) {
            .galeri-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (min-width: 1024px) {
            .galeri-grid {
                grid-template-columns: 0.8fr 1.2fr 0.8fr;
            }
        }

        .hari-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        @media (min-width: 640px) {
            .hari-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .hari-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        .testi-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        @media (min-width: 768px) {
            .testi-grid {
                grid-template-columns: 1fr 1fr;
            }
            .testi-grid > :nth-child(3) {
                grid-column: 1 / -1;
                max-width: 70%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        .btn-ungu {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: var(--ungu);
            color: #fff;
            font-weight: 600;
            padding: 0.7rem 1.4rem;
            border-radius: 10px;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-ungu:hover {
            background: var(--ungu-hover);
            transform: translateY(-1px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--teks-second);
            font-weight: 500;
            padding: 0.7rem 1.25rem;
            border-radius: 10px;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: 1px solid var(--garis);
            background: transparent;
            cursor: pointer;
        }
        .btn-outline:hover {
            border-color: var(--ungu);
            color: var(--ungu);
            background: var(--ungu-lembut);
        }

        .sec-label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--ungu);
            margin-bottom: 0.6rem;
        }

        .sec-title {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }
        @media (min-width: 768px) {
            .sec-title {
                font-size: 2rem;
            }
        }

        .hover-card {
            transition: all 0.2s ease;
        }
        .hover-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            border-color: var(--ungu);
        }
    </style>
</head>
<body>

<div id="disclaimerOverlay" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.6); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); align-items: center; justify-content: center;">
    <div style="background: white; border-radius: 24px; max-width: 32rem; width: calc(100% - 3rem); padding: 2.5rem; text-align: center; box-shadow: 0 25px 50px rgba(0,0,0,0.25);">
        <div style="width: 72px; height: 72px; border-radius: 50%; background: #f3e8ff; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg style="width: 2rem; height: 2rem; color: #7c3aed;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
        </div>
        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.75rem; color: #1c1917;">Disclaimer</h2>
        <p style="font-size: 1rem; line-height: 1.6; margin-bottom: 2rem; color: #79716b;">jangan ngarep banyak, ini cuma hasil keabutan selama 5 jam an</p>
        <button onclick="document.getElementById('disclaimerOverlay').style.display='none'" style="width: 100%; background: #7c3aed; color: white; font-weight: 600; padding: 0.875rem 1.5rem; border: none; border-radius: 12px; cursor: pointer; font-size: 1rem; transition: background 0.2s;" onmouseover="this.style.background='#6d28d9'" onmouseout="this.style.background='#7c3aed'">Lanjut</button>
    </div>
</div>
<script>document.getElementById('disclaimerOverlay').style.display='flex'</script>

<nav class="nav-wrap fixed top-0 left-0 right-0 z-40">
    <div class="max-w-6xl mx-auto px-5 flex items-center justify-between h-14">
        <a href="/" class="flex items-center gap-2 shrink-0">
            <span class="w-2 h-2 rounded-sm" style="background: var(--ungu);"></span>
            <span class="font-bold text-sm tracking-tight">X TJKT</span>
        </a>
        <div class="hidden md:flex items-center gap-0.5">
            <a href="#profil" class="nav-link px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Profil</a>
            <a href="#galeri" class="nav-link px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Galeri</a>
            <a href="#guru" class="nav-link px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Guru</a>
            <a href="#jadwal" class="nav-link px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Jadwal</a>
            <a href="/siswa" class="nav-link px-3 py-2 text-sm rounded-lg transition" style="color: var(--teks-second);">Siswa</a>
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
        <a href="#profil" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Profil</a>
        <a href="#galeri" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Galeri</a>
        <a href="#guru" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Guru</a>
        <a href="#jadwal" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--teks-second);">Jadwal</a>
        <a href="/siswa" class="block px-3 py-2.5 text-sm rounded-lg" style="color: var(--ungu);">Siswa</a>
    </div>
</nav>

<script>
var navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(function(l) {
    l.addEventListener('mouseenter', function() { this.style.color = 'var(--ungu)'; });
    l.addEventListener('mouseleave', function() { this.style.color = 'var(--teks-second)'; });
});
</script>

<main>
    {{-- ==================== HERO ==================== --}}
    <section style="padding-top: 5rem; min-height: 100vh; display: flex; align-items: center; position: relative; overflow: hidden;">
        <div class="hero-grid" style="position: absolute; inset: 0; pointer-events: none;"></div>
        <div style="position: absolute; inset: 0; background: radial-gradient(ellipse at 80% 40%, var(--ungu-lembut) 0%, transparent 60%); pointer-events: none;"></div>

        <div class="max-w-6xl mx-auto px-5 w-full py-12 relative z-10">
            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: center;">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="tag">Semester 1 — 2025/2026</span>
                        <span class="tag" style="background: transparent; border: 1px solid var(--garis); color: var(--teks-muted);">Kelas X</span>
                    </div>

                    <h1 style="font-size: clamp(2.8rem, 10vw, 5.5rem); font-weight: 800; line-height: 0.9; letter-spacing: -0.04em;">
                        <span style="color: var(--ungu);">X</span>
                        <span style="color: var(--teks);"> TJKT</span>
                    </h1>

                    <p style="font-size: 1rem; color: var(--teks-second); margin-top: 0.75rem; max-width: 30rem; line-height: 1.7;">
                        Teknik Jaringan Komputer dan Telekomunikasi — belajar jaringan, coding, 
                        dan teknologi informasi. Dari kabel UTP sampai Laravel.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 1.5rem;">
                        <a href="#profil" class="btn-ungu">
                            Jelajahi
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                        <a href="/siswa" class="btn-outline">Daftar Siswa</a>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; margin-top: 2rem; max-width: 24rem;">
                        <div class="stat-card rounded-lg">
                            <p style="font-size: 1.3rem; font-weight: 700; font-family: 'JetBrains Mono', monospace; color: var(--ungu);">41</p>
                            <p style="font-size: 0.7rem; color: var(--teks-muted);">Siswa</p>
                        </div>
                        <div class="stat-card rounded-lg">
                            <p style="font-size: 1.3rem; font-weight: 700; font-family: 'JetBrains Mono', monospace; color: var(--ungu);">11</p>
                            <p style="font-size: 0.7rem; color: var(--teks-muted);">Mapel</p>
                        </div>
                        <div class="stat-card rounded-lg">
                            <p style="font-size: 1.3rem; font-weight: 700; font-family: 'JetBrains Mono', monospace; color: var(--ungu);">5</p>
                            <p style="font-size: 0.7rem; color: var(--teks-muted);">Hari</p>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block" style="position: relative;">
                    <div class="terminal-window">
                        <div class="terminal-header">
                            <span class="terminal-dot" style="background: #ff5f57;"></span>
                            <span class="terminal-dot" style="background: #febc2e;"></span>
                            <span class="terminal-dot" style="background: #28c840;"></span>
                            <span style="color: #6b6b8a; font-size: 0.65rem; margin-left: 0.5rem;">network-diag — x-tjkt</span>
                        </div>
                        <div class="terminal-body">
                            <span style="color: #7c3aed;">root@x-tjkt</span><span style="color: #6b6b8a;">:</span><span style="color: #28c840;">~</span><span style="color: #6b6b8a;">$</span> ping 10.10.10.1<br>
                            <span style="color: #28c840;">PING 10.10.10.1 (10.10.10.1) 56(84) bytes of data.</span><br>
                            <span style="color: #c4c4d4;">64 bytes from 10.10.10.1: icmp_seq=1 ttl=64 time=2.34 ms</span><br>
                            <span style="color: #c4c4d4;">64 bytes from 10.10.10.1: icmp_seq=2 ttl=64 time=1.98 ms</span><br>
                            <span style="color: #c4c4d4;">64 bytes from 10.10.10.1: icmp_seq=3 ttl=64 time=2.12 ms</span><br>
                            <span style="color: #c4c4d4;">64 bytes from 10.10.10.1: icmp_seq=4 ttl=64 time=2.05 ms</span><br>
                            <span style="color: #6b6b8a;">--- 10.10.10.1 ping statistics ---</span><br>
                            <span style="color: #28c840;">4 packets transmitted, 4 received, 0% packet loss</span><br>
                            <span style="color: #c4c4d4;">rtt min/avg/max/mdev = 1.98/2.12/2.34/0.15 ms</span><br>
                            <span style="color: #7c3aed;">root@x-tjkt</span><span style="color: #6b6b8a;">:</span><span style="color: #28c840;">~</span><span style="color: #6b6b8a;">$</span> <span class="terminal-cursor"></span>
                        </div>
                    </div>

                    <div style="position: absolute; bottom: -1rem; right: -1rem; background: var(--surface); border: 1px solid var(--garis); border-radius: 10px; padding: 0.6rem 1rem; display: flex; align-items: center; gap: 0.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #28c840; animation: pulse 2s infinite;"></span>
                        <span class="mono" style="font-size: 0.7rem; color: var(--teks-muted);">Network Active</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== PROFIL ==================== --}}
    @php
        $keunggulan = [
            (object)['icon' => 'coding', 'judul' => 'Coding', 'desc' => 'HTML, CSS, PHP, JavaScript, Laravel. Bikin web dari nol sampai deploy.'],
            (object)['icon' => 'network', 'judul' => 'Jaringan', 'desc' => 'Mikrotik, routing, switching, subnetting. Praktek di lab TKJ.'],
            (object)['icon' => 'team', 'judul' => 'Kolaborasi', 'desc' => 'Project based learning. Kerja tim, saling bantu, error bareng solve bareng.'],
            (object)['icon' => 'cert', 'judul' => 'Sertifikasi', 'desc' => 'Bekal sertifikasi TKJ dan Cisco. Siap terjun ke industri.'],
        ];
        $kompetensi = ['Dasar TJKT', 'Informatika', 'Pemrograman Web', 'Jaringan Dasar', 'Mikrotik', 'Cisco', 'Administrasi Server', 'Cyber Security'];
    @endphp
    <section id="profil" class="max-w-6xl mx-auto px-5 py-20 md:py-28">
        <div class="profil-grid">
            <div>
                <p class="sec-label">Tentang Jurusan</p>
                <h2 class="sec-title">Profil X TJKT</h2>
                <p style="margin-top: 1rem; font-size: 0.9rem; line-height: 1.8; color: var(--teks-second);">
                    Jurusan Teknik Jaringan Komputer dan Telekomunikasi (TJKT) adalah program keahlian 
                    yang fokus pada perencanaan, instalasi, konfigurasi, dan perawatan jaringan komputer 
                    serta telekomunikasi. Siswa dibekali keterampilan teknologi informasi yang relevan 
                    dengan kebutuhan industri saat ini.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 0.4rem; margin-top: 1.5rem;">
                    @foreach($kompetensi as $k)
                    <span class="card rounded-lg px-3 py-1.5 mono" style="font-size: 0.7rem; color: var(--teks-second);">{{ $k }}</span>
                    @endforeach
                </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                @foreach($keunggulan as $i => $k)
                <div class="card rounded-xl p-4 hover-card" style="cursor: default;">
                    <div style="display: flex; gap: 0.75rem; align-items: flex-start;">
                        <div style="width: 2.2rem; height: 2.2rem; border-radius: 8px; background: var(--ungu-lembut); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            @if($k->icon === 'coding')
                            <svg class="w-4 h-4" style="color: var(--ungu);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                            @elseif($k->icon === 'network')
                            <svg class="w-4 h-4" style="color: var(--ungu);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5a4.5 4.5 0 004.5 4.5h3.75m-13.5 9H3.75a1.5 1.5 0 01-1.5-1.5V6.75a1.5 1.5 0 011.5-1.5h3.75a3 3 0 013 3v.75"/></svg>
                            @elseif($k->icon === 'team')
                            <svg class="w-4 h-4" style="color: var(--ungu);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719"/></svg>
                            @else
                            <svg class="w-4 h-4" style="color: var(--ungu);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659"/></svg>
                            @endif
                        </div>
                        <div>
                            <h3 style="font-weight: 600; font-size: 0.9rem;">{{ $k->judul }}</h3>
                            <p style="font-size: 0.8rem; line-height: 1.5; color: var(--teks-muted); margin-top: 0.15rem;">{{ $k->desc }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== GALERI ==================== --}}
    <section id="galeri" class="max-w-6xl mx-auto px-5 py-20 md:py-28">
        <div style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 1.5rem; gap: 1rem;">
            <div>
                <p class="sec-label">Dokumentasi</p>
                <h2 class="sec-title">Galeri Kegiatan</h2>
            </div>
            <a href="/galeri" class="btn-outline text-xs !py-1.5 !px-3">
                Lihat semua
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        <div class="galeri-grid">
            <div class="card rounded-xl overflow-hidden hover-card" style="cursor: pointer;">
                <div style="aspect-ratio: 4/3; background: linear-gradient(145deg, #1e1b4b, #312e81); display: flex; align-items: center; justify-content: center; position: relative;">
                    <svg class="w-16 h-16" style="color: rgba(255,255,255,0.08); position: absolute;" viewBox="0 0 80 80" fill="none">
                        <rect x="10" y="15" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1"/>
                        <rect x="35" y="10" width="18" height="22" rx="2" stroke="currentColor" stroke-width="1"/>
                        <rect x="55" y="20" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1"/>
                        <line x1="28" y1="21" x2="35" y2="21" stroke="currentColor" stroke-width="0.8"/>
                        <line x1="53" y1="21" x2="55" y2="27" stroke="currentColor" stroke-width="0.8"/>
                    </svg>
                    <span style="color: rgba(255,255,255,0.7); font-size: 0.7rem; font-family: 'JetBrains Mono', monospace; z-index: 1; margin-top: 3rem;">Lab TKJ</span>
                </div>
                <div class="p-3.5">
                    <p style="font-weight: 600; font-size: 0.85rem;">Praktik Jaringan</p>
                    <p style="font-size: 0.7rem; color: var(--teks-muted); margin-top: 0.15rem;">Konfigurasi routing &amp; switching di lab</p>
                </div>
            </div>
            <div class="card rounded-xl overflow-hidden hover-card" style="cursor: pointer;">
                <div style="aspect-ratio: 4/3; background: linear-gradient(145deg, #1c1917, #292524); display: flex; align-items: center; justify-content: center; position: relative;">
                    <svg class="w-16 h-16" style="color: rgba(255,255,255,0.08); position: absolute;" viewBox="0 0 80 80" fill="none">
                        <rect x="12" y="12" width="56" height="36" rx="3" stroke="currentColor" stroke-width="1"/>
                        <line x1="12" y1="24" x2="68" y2="24" stroke="currentColor" stroke-width="0.8"/>
                        <circle cx="25" cy="38" r="6" stroke="currentColor" stroke-width="1"/>
                        <circle cx="55" cy="38" r="6" stroke="currentColor" stroke-width="1"/>
                        <line x1="31" y1="38" x2="49" y2="38" stroke="currentColor" stroke-width="0.8"/>
                    </svg>
                    <span style="color: rgba(255,255,255,0.7); font-size: 0.7rem; font-family: 'JetBrains Mono', monospace; z-index: 1; margin-top: 2.5rem;">Coding Page</span>
                </div>
                <div class="p-3.5">
                    <p style="font-weight: 600; font-size: 0.85rem;">Sesi Coding</p>
                    <p style="font-size: 0.7rem; color: var(--teks-muted); margin-top: 0.15rem;">Belajar HTML, CSS, Laravel bareng</p>
                </div>
            </div>
            <div class="card rounded-xl overflow-hidden hover-card" style="cursor: pointer;">
                <div style="aspect-ratio: 4/3; background: linear-gradient(145deg, #0f172a, #1e293b); display: flex; align-items: center; justify-content: center; position: relative;">
                    <svg class="w-16 h-16" style="color: rgba(255,255,255,0.08); position: absolute;" viewBox="0 0 80 80" fill="none">
                        <circle cx="28" cy="28" r="8" stroke="currentColor" stroke-width="1"/>
                        <circle cx="52" cy="28" r="8" stroke="currentColor" stroke-width="1"/>
                        <rect x="22" y="42" width="36" height="14" rx="2" stroke="currentColor" stroke-width="1"/>
                        <line x1="28" y1="28" x2="22" y2="42" stroke="currentColor" stroke-width="0.8"/>
                        <line x1="52" y1="28" x2="58" y2="42" stroke="currentColor" stroke-width="0.8"/>
                    </svg>
                    <span style="color: rgba(255,255,255,0.7); font-size: 0.7rem; font-family: 'JetBrains Mono', monospace; z-index: 1; margin-top: 2.5rem;">Topologi</span>
                </div>
                <div class="p-3.5">
                    <p style="font-weight: 600; font-size: 0.85rem;">Desain Jaringan</p>
                    <p style="font-size: 0.7rem; color: var(--teks-muted); margin-top: 0.15rem;">Membuat topologi jaringan dengan Cisco</p>
                </div>
            </div>
        </div>

        <div style="margin-top: 1.5rem; text-align: center;">
            <a href="https://www.instagram.com/x.tjktogether1/" target="_blank" rel="noopener noreferrer" class="btn-outline text-xs" style="display: inline-flex;">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"/></svg>
                @x.tjktogether1
            </a>
        </div>
    </section>

    {{-- ==================== GURU ==================== --}}
    @php
        $guru = [
            (object)['nama' => 'Hermanto, S.KOM.', 'mapel' => 'DDK', 'inisial' => 'HS', 'role' => 'Wali Kelas', 'roles' => ['Wali Kelas', 'Produktif'], 'warna' => '#7c3aed'],
            (object)['nama' => '???', 'mapel' => 'Dasar TJKT', 'inisial' => '??', 'role' => 'Produktif', 'roles' => ['Produktif'], 'warna' => '#2563eb'],
            (object)['nama' => '???', 'mapel' => 'Coding', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#9333ea'],
            (object)['nama' => '???', 'mapel' => 'Informatika', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#0d9488'],
            (object)['nama' => '???', 'mapel' => 'B. Indonesia', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#059669'],
            (object)['nama' => '???', 'mapel' => 'B. Inggris', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#dc2626'],
            (object)['nama' => '???', 'mapel' => 'Matematika', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#d97706'],
            (object)['nama' => '???', 'mapel' => 'IPAS', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#0891b2'],
            (object)['nama' => '???', 'mapel' => 'PKN', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#be123c'],
            (object)['nama' => '???', 'mapel' => 'PJOK', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#1d4ed8'],
            (object)['nama' => '???', 'mapel' => 'Pend. Agama', 'inisial' => '??', 'role' => 'Mapel', 'warna' => '#a21caf'],
        ];
    @endphp
    <section id="guru" class="max-w-6xl mx-auto px-5 py-20 md:py-28">
        <div style="margin-bottom: 1.5rem;">
            <p class="sec-label">Tenaga Pengajar</p>
            <h2 class="sec-title">Guru &amp; Wali Kelas</h2>
        </div>

        <div class="guru-grid">
            @foreach($guru as $g)
            <div class="card rounded-xl p-4 hover-card">
                <div style="display: flex; flex-direction: column; align-items: center; text-align: center; gap: 0.6rem;">
                    <div style="width: 3.2rem; height: 3.2rem; border-radius: 12px; background: {{ $g->warna }}15; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; color: {{ $g->warna }}; font-family: 'JetBrains Mono', monospace;">
                        {{ $g->inisial }}
                    </div>
                    <div>
                        <p style="font-weight: 600; font-size: 0.82rem; line-height: 1.3;">{{ $g->nama }}</p>
                        <p style="font-size: 0.7rem; color: var(--teks-muted); margin-top: 0.1rem;">{{ $g->mapel }}</p>
                    </div>
                    <div style="display: flex; gap: 0.3rem; flex-wrap: wrap; justify-content: center;">
                        @if(isset($g->roles))
                            @foreach($g->roles as $r)
                            <span style="font-size: 0.6rem; font-family: 'JetBrains Mono', monospace; color: {{ $g->warna }}; background: {{ $g->warna }}12; padding: 0.15rem 0.6rem; border-radius: 5px; font-weight: 500;">{{ $r }}</span>
                            @endforeach
                        @else
                            <span style="font-size: 0.6rem; font-family: 'JetBrains Mono', monospace; color: {{ $g->warna }}; background: {{ $g->warna }}12; padding: 0.15rem 0.6rem; border-radius: 5px; font-weight: 500;">{{ $g->role }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ==================== JADWAL ==================== --}}
    @php
        $hari = [
            (object)['nama' => 'Senin', 'mapel' => 'Coding · DDK · B. Inggris · Informatika', 'warna' => '#7c3aed', 'jam' => '07.50–15.00'],
            (object)['nama' => 'Selasa', 'mapel' => 'Senbud · DDK · IPAS · MTK · Sejarah', 'warna' => '#2563eb', 'jam' => '06.30–15.00'],
            (object)['nama' => 'Rabu', 'mapel' => 'IPAS · B. Jepang · B. Indo · Informatika · DDK', 'warna' => '#059669', 'jam' => '06.30–15.00'],
            (object)['nama' => 'Kamis', 'mapel' => 'B. Indo · IPAS · B. Inggris · PKN · MTK', 'warna' => '#d97706', 'jam' => '07.10–15.00'],
            (object)['nama' => "Jum'at", 'mapel' => 'PJOK · PAI · DDK', 'warna' => '#dc2626', 'jam' => '07.10–15.00'],
        ];
    @endphp
    <section id="jadwal" class="max-w-6xl mx-auto px-5 py-20 md:py-28">
        <div style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 1.5rem; gap: 1rem;">
            <div>
                <p class="sec-label">2025/2026</p>
                <h2 class="sec-title">Jadwal Pelajaran</h2>
            </div>
            <a href="/jadwal" class="btn-outline text-xs !py-1.5 !px-3">
                Lengkap
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        <div class="hari-grid">
            @foreach($hari as $h)
            <div class="card rounded-xl p-4 hover-card" style="border-top: 3px solid {{ $h->warna }};">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                    <span style="width: 0.4rem; height: 0.4rem; border-radius: 50%; background: {{ $h->warna }}; display: inline-block;"></span>
                    <span style="font-weight: 600; font-size: 0.85rem;">{{ $h->nama }}</span>
                </div>
                <p style="font-size: 0.7rem; color: var(--teks-muted); line-height: 1.6; margin-bottom: 0.4rem;">{{ $h->mapel }}</p>
                <span class="mono" style="font-size: 0.6rem; color: var(--teks-muted);">{{ $h->jam }}</span>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ==================== TESTIMONI ==================== --}}
    @php
        $testi = [
            (object)['quote' => 'Seru banget belajar TJKT. Dari awalnya gak ngerti jaringan, sekarang bisa konfigurasi router sendiri. Lab-nya lengkap banget.', 'nama' => 'Ahmar Januar', 'label' => 'Ketua Kelas', 'inisial' => 'AJ'],
            (object)['quote' => 'Pelajarannya asik, gurunya sabar. Coding bareng-bareng, error rame-rame, solve rame-rame. Best class ever!', 'nama' => 'Warman', 'label' => 'Siswa', 'inisial' => 'WR'],
            (object)['quote' => 'Dari nol banget belajar coding. Sekarang Alhamdulillah udah bisa bikin web pake Laravel. Makasih gurunya sabar banget ngajarin.', 'nama' => 'M. Fajar Hafid', 'label' => 'Siswa', 'inisial' => 'FH'],
        ];
    @endphp
    <section id="testimoni" class="max-w-6xl mx-auto px-5 py-20 md:py-28">
        <div style="margin-bottom: 1.5rem;">
            <p class="sec-label">Kata Mereka</p>
            <h2 class="sec-title">Testimoni Siswa</h2>
        </div>

        <div class="testi-grid">
            @foreach($testi as $t)
            <div class="card rounded-xl p-5 hover-card">
                <div style="display: flex; gap: 0.75rem; align-items: flex-start;">
                    <div style="width: 2.2rem; height: 2.2rem; border-radius: 8px; background: var(--ungu-lembut); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.75rem; color: var(--ungu); font-family: 'JetBrains Mono', monospace; flex-shrink: 0;">
                        {{ $t->inisial }}
                    </div>
                    <div>
                        <p style="font-size: 0.85rem; line-height: 1.7; color: var(--teks-second); font-style: italic;">"{{ $t->quote }}"</p>
                        <div style="margin-top: 0.6rem;">
                            <p style="font-weight: 600; font-size: 0.8rem;">{{ $t->nama }}</p>
                            <p style="font-size: 0.65rem; color: var(--teks-muted); font-family: 'JetBrains Mono', monospace;">{{ $t->label }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

<footer style="border-top: 1px solid var(--garis); background: var(--surface);">
    <div class="max-w-6xl mx-auto px-5 py-10">
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 1.5rem;">
                <div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <span style="width: 8px; height: 8px; background: var(--ungu); display: inline-block;"></span>
                        <span style="font-weight: 700; font-size: 1rem;">X TJKT</span>
                    </div>
                    <p style="font-size: 0.8rem; color: var(--teks-muted); max-width: 18rem; line-height: 1.6;">
                        Teknik Jaringan Komputer dan Telekomunikasi<br>
                        SMK Negeri 1 Lemahabang
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                    <div>
                        <p style="font-size: 0.7rem; font-weight: 600; color: var(--teks-muted); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.5rem;">Halaman</p>
                        <div style="display: flex; flex-direction: column; gap: 0.3rem;">
                            <a href="/siswa" class="mono" style="font-size: 0.75rem; color: var(--teks-second);">Siswa</a>
                            <a href="/jadwal" class="mono" style="font-size: 0.75rem; color: var(--teks-second);">Jadwal</a>
                            <a href="/galeri" class="mono" style="font-size: 0.75rem; color: var(--teks-second);">Galeri</a>
                        </div>
                    </div>
                    <div>
                        <p style="font-size: 0.7rem; font-weight: 600; color: var(--teks-muted); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 0.5rem;">Sosial</p>
                        <a href="https://www.instagram.com/x.tjktogether1/" target="_blank" rel="noopener noreferrer" class="mono" style="font-size: 0.75rem; color: var(--teks-second); display: flex; align-items: center; gap: 0.3rem;">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314"/></svg>
                            @x.tjktogether1
                        </a>
                    </div>
                </div>
            </div>
            <div style="border-top: 1px solid var(--garis); padding-top: 1.5rem; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 0.5rem;">
                <p style="font-size: 0.75rem; color: var(--teks-muted);">&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
                <p class="mono" style="font-size: 0.65rem; color: var(--teks-muted);">TJKT</p>
            </div>
        </div>
    </div>
</footer>

<style>
@keyframes pulse { 50% { opacity: 0.4; } }
</style>

<script>
(function() {
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
        if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            setTheme(true);
        }
    } catch(e) {}

    if (themeToggle) {
        themeToggle.addEventListener('click', function() { setTheme(!document.body.classList.contains('dark')); });
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

    document.querySelectorAll('a[href^="#"]').forEach(function(a) {
        a.addEventListener('click', function(e) {
            var t = document.querySelector(this.getAttribute('href'));
            if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
            var mm = document.getElementById('mobileMenu');
            if (mm && mm.style.display === 'block') {
                mm.style.display = 'none';
                if (menuIcon) menuIcon.classList.remove('hidden');
                if (closeIcon) closeIcon.classList.add('hidden');
            }
        });
    });
})();
</script>

</body>
</html>