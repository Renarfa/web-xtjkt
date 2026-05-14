$html = @"
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Pelajaran — X TJKT</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#0a0a0f] text-white font-sans antialiased">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0a0f]/80 backdrop-blur-md border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
            <a href="/" class="flex items-center gap-2.5 text-white/80 hover:text-white transition-colors">
                <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span class="font-semibold text-sm">X TJKT</span>
            </a>
            <div class="flex items-center gap-6 text-sm">
                <a href="/siswa" class="text-white/60 hover:text-white transition-colors">Siswa</a>
                <a href="/jadwal" class="text-orange-400 font-medium">Jadwal</a>
            </div>
        </div>
    </nav>

    <main class="pt-24 pb-16 px-4 sm:px-6 max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-500/10 text-orange-400 border border-orange-500/20 mb-4">Semester 1 — 2025/2026</span>
            <h1 class="text-3xl sm:text-4xl font-bold tracking-tight mb-2">Jadwal Pelajaran</h1>
            <p class="text-white/50 text-base max-w-md mx-auto">Senin – Jumat · 07:00 – 14:30 WIB</p>
        </div>
"@

$days = @(
    @{id="senin"; name="Senin"; date="1 September 2025"; accent="orange-500"; accent2="orange-400"; cards=@(
        @{time="07:00 – 08:30"; jp="2 JP"; subject="Pendidikan Agama Islam"; teacher="Ahmad S.Pd.I."; room="R. 101"}
        @{time="08:30 – 10:00"; jp="2 JP"; subject="Dasar TJKT"; teacher="Sari W., S.Kom."; room="Lab TKJ 1"}
        @{time="10:00 – 10:30"; jp="30'"; subject="Istirahat"; teacher="Waktu istirahat pagi"; room=""; istirahat=$true}
        @{time="10:30 – 12:00"; jp="2 JP"; subject="Dasar TJKT"; teacher="Sari W., S.Kom."; room="Lab TKJ 1"}
        @{time="12:00 – 13:00"; jp="60'"; subject="Istirahat Siang"; teacher="Waktu istirahat & sholat"; room=""; istirahat=$true}
        @{time="13:00 – 14:30"; jp="2 JP"; subject="B. Inggris"; teacher="Fitri H., S.Pd."; room="R. 103"}
    )}
    @{id="selasa"; name="Selasa"; date="2 September 2025"; accent="blue-500"; accent2="blue-400"; cards=@(
        @{time="07:00 – 08:30"; jp="2 JP"; subject="Matematika"; teacher="Budi S.Pd."; room="R. 101"}
        @{time="08:30 – 10:00"; jp="2 JP"; subject="Dasar TJKT"; teacher="Sari W., S.Kom."; room="Lab TKJ 1"}
        @{time="10:00 – 10:30"; jp="30'"; subject="Istirahat"; teacher="Waktu istirahat pagi"; room=""; istirahat=$true}
        @{time="10:30 – 12:00"; jp="2 JP"; subject="PPKN"; teacher="Dewi S.Pd."; room="R. 102"}
        @{time="12:00 – 13:00"; jp="60'"; subject="Istirahat Siang"; teacher="Waktu istirahat & sholat"; room=""; istirahat=$true}
        @{time="13:00 – 14:30"; jp="2 JP"; subject="B. Sunda"; teacher="Rudi S.Pd."; room="R. 104"}
    )}
    @{id="rabu"; name="Rabu"; date="3 September 2025"; accent="emerald-500"; accent2="emerald-400"; cards=@(
        @{time="07:00 – 08:30"; jp="2 JP"; subject="Dasar TJKT"; teacher="Sari W., S.Kom."; room="Lab TKJ 1"}
        @{time="08:30 – 10:00"; jp="2 JP"; subject="B. Indonesia"; teacher="Dewi S.Pd."; room="R. 102"}
        @{time="10:00 – 10:30"; jp="30'"; subject="Istirahat"; teacher="Waktu istirahat pagi"; room=""; istirahat=$true}
        @{time="10:30 – 12:00"; jp="2 JP"; subject="B. Indonesia"; teacher="Dewi S.Pd."; room="R. 102"}
        @{time="12:00 – 13:00"; jp="60'"; subject="Istirahat Siang"; teacher="Waktu istirahat & sholat"; room=""; istirahat=$true}
        @{time="13:00 – 14:30"; jp="2 JP"; subject="Pendidikan Agama Islam"; teacher="Ahmad S.Pd.I."; room="R. 101"}
    )}
    @{id="kamis"; name="Kamis"; date="4 September 2025"; accent="violet-500"; accent2="violet-400"; cards=@(
        @{time="07:00 – 08:30"; jp="2 JP"; subject="Dasar TJKT"; teacher="Sari W., S.Kom."; room="Lab TKJ 1"}
        @{time="08:30 – 10:00"; jp="2 JP"; subject="PKWU"; teacher="Taufik S.Pd."; room="R. 105"}
        @{time="10:00 – 10:30"; jp="30'"; subject="Istirahat"; teacher="Waktu istirahat pagi"; room=""; istirahat=$true}
        @{time="10:30 – 12:00"; jp="2 JP"; subject="Matematika"; teacher="Budi S.Pd."; room="R. 101"}
        @{time="12:00 – 13:00"; jp="60'"; subject="Istirahat Siang"; teacher="Waktu istirahat & sholat"; room=""; istirahat=$true}
        @{time="13:00 – 14:30"; jp="2 JP"; subject="Seni Budaya"; teacher="Nina S.Sn."; room="R. 106"}
    )}
    @{id="jumat"; name="Jumat"; date="5 September 2025"; accent="rose-500"; accent2="rose-400"; cards=@(
        @{time="07:00 – 08:30"; jp="2 JP"; subject="PJOK"; teacher="Yoga S.Pd."; room="Lapangan"}
        @{time="08:30 – 10:00"; jp="2 JP"; subject="B. Inggris"; teacher="Fitri H., S.Pd."; room="R. 103"}
        @{time="10:00 – 10:30"; jp="30'"; subject="Istirahat"; teacher="Waktu istirahat pagi"; room=""; istirahat=$true}
        @{time="10:30 – 12:00"; jp="2 JP"; subject="BK"; teacher="Rina S.Pd."; room="R. BK"}
        @{time="12:00 – 13:00"; jp="60'"; subject="Istirahat Siang"; teacher="Waktu istirahat & sholat"; room=""; istirahat=$true}
        @{time="13:00 – 13:45"; jp="1 JP"; subject="Sejarah"; teacher="Dedi S.Pd."; room="R. 101"}
    )}
)

function get-accents($accent) {
    switch($accent) {
        "orange-500" { return @("orange", "orange") }
        "blue-500" { return @("blue", "blue") }
        "emerald-500" { return @("emerald", "emerald") }
        "violet-500" { return @("violet", "violet") }
        "rose-500" { return @("rose", "rose") }
    }
}

foreach($day in $days) {
    $a = $day.accent -replace "-500", ""
    $a2 = $day.accent2

    $html += @"
        <section class="mb-12 scroll-mt-20" id="$($day.id)">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-$($day.accent)/10 border border-$($day.accent)/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-$a2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold">$($day.name)</h2>
                    <p class="text-white/40 text-xs">$($day.date)</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
"@
    foreach($card in $day.cards) {
        if ($card.istirahat) {
            $html += @"
                <div class="bg-white/[0.03] border border-yellow-500/20 rounded-2xl p-5 hover:bg-white/[0.06] transition-all">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625V17.87c0-1.08.768-2.015 1.837-2.175A47.78 47.78 0 016 15.37"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-semibold text-sm text-yellow-300">$($card.subject)</h3>
                                <span class="text-[10px] px-2 py-0.5 rounded-md bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 font-medium">$($card.jp)</span>
                            </div>
                            <p class="text-yellow-400/50 text-xs mt-0.5">$($card.time)</p>
                        </div>
                    </div>
                </div>
"@
        } else {
            $html += @"
                <div class="bg-white/[0.03] border border-white/10 rounded-2xl p-5 hover:bg-white/[0.06] hover:border-$($day.accent)/30 transition-all">
                    <div class="flex items-start justify-between mb-3">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-white/50">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            $($card.time)
                        </span>
                        <span class="text-[10px] px-2 py-0.5 rounded-md bg-$($day.accent)/10 text-$a2 border border-$($day.accent)/20 font-medium">$($card.jp)</span>
                    </div>
                    <h3 class="font-semibold text-sm mb-2">$($card.subject)</h3>
                    <div class="space-y-1.5 text-xs text-white/50">
                        <p class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-white/30 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            $($card.teacher)
                        </p>
                        <p class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-white/30 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                            </svg>
                            $($card.room)
                        </p>
                    </div>
                </div>
"@
        }
    }
    $html += @"
            </div>
        </section>
"@
}

$html += @"
        <footer class="mt-20 pt-8 border-t border-white/5 text-center text-sm text-white/30">
            <p>&copy; {{ date('Y') }} X TJKT — SMK Negeri 1 Lemahabang</p>
        </footer>
    </main>
</body>
</html>
"@

Set-Content -Path "C:\Users\NeroChan\proyek-kelas\resources\views\jadwal.blade.php" -Value $html -Encoding UTF8
Write-Host "File written successfully, size: $($html.Length) bytes"
