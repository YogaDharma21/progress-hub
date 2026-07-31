@extends('layouts.app')

@section('title', 'Progress Hub — Dashboard')

@section('content')
<div class="space-y-10">

    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Dashboard</h1>
        <p class="mt-1 text-sm text-zinc-400">Ringkasan Program Kerja, Proyek, dan Repositori Pembelajaran UKM</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <div class="text-2xl font-bold text-zinc-100 tracking-tight">12</div>
                <div class="text-xs text-zinc-400">Program Aktif</div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div>
                <div class="text-2xl font-bold text-zinc-100 tracking-tight">28</div>
                <div class="text-xs text-zinc-400">Proyek Showcase</div>
            </div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 flex items-center gap-4">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <div class="text-2xl font-bold text-zinc-100 tracking-tight">45</div>
                <div class="text-xs text-zinc-400">Artikel & Modul</div>
            </div>
        </div>
    </div>

    <section>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Program Kerja & Kegiatan
            </h2>
            <div class="flex p-1 bg-zinc-950 border border-zinc-800 rounded-lg w-fit">
                <button class="event-tab px-3 py-1 text-xs font-medium rounded-md text-zinc-100 bg-zinc-800 transition active" data-filter="all">Semua</button>
                <button class="event-tab px-3 py-1 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="class">Kelas</button>
                <button class="event-tab px-3 py-1 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="hackathon">Hackathon</button>
                <button class="event-tab px-3 py-1 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="sharing">Sharing</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="events-grid">
            <div class="event-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/events/detail'" data-type="class">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Kelas React Dasar</h3>
                        <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Fundamental React dari nol: komponen, state, useEffect, Router, dan integrasi API</p>
                    </div>
                    <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">Berlangsung</span>
                </div>
                <div class="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-4">
                    <div class="bg-emerald-500 h-full rounded-full" style="width: 65%"></div>
                </div>
                <div class="pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-400">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 8 Pertemuan</span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 42</span>
                    </div>
                    <div class="flex -space-x-1.5">
                        <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">A</div>
                        <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">B</div>
                        <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">+39</div>
                    </div>
                </div>
            </div>

            <div class="event-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/events/detail'" data-type="class">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Python Dasar untuk Pemula</h3>
                        <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Syntax, tipe data, loop, fungsi, dan dasar-dasar algoritma komputer</p>
                    </div>
                    <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/30">Mendatang</span>
                </div>
                <div class="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-4">
                    <div class="bg-amber-500 h-full rounded-full" style="width: 0%"></div>
                </div>
                <div class="pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-400">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 6 Pertemuan</span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 35</span>
                    </div>
                    <div class="flex -space-x-1.5">
                        <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">D</div>
                        <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">E</div>
                        <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">+33</div>
                    </div>
                </div>
            </div>

            <div class="event-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/events/detail'" data-type="hackathon">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Hackathon Internal 2025</h3>
                        <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Kompetisi 48 jam dalam tim untuk membangun solusi digital kreatif seputar kampus</p>
                    </div>
                    <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/30">Registration</span>
                </div>
                <div class="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-4">
                    <div class="bg-blue-500 h-full rounded-full" style="width: 15%"></div>
                </div>
                <div class="pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-400">
                    <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> 15 Sep 2025</span>
                    <span class="px-2 py-0.5 rounded text-[11px] bg-zinc-800 text-zinc-300">48 Teams</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Portofolio & Proyek Mahasiswa
            </h2>
            <a href="/members/projects" class="text-xs text-zinc-400 hover:text-white transition underline">Lihat Semua Proyek</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/projects/detail'">
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-300 mb-2">UKM Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Sistem E-Voting Kampus</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Platform voting digital untuk pemilihan organisasi kampus dengan keamanan tinggi</p>
                
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Node.js</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">PostgreSQL</span>
                </div>
            </div>

            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/projects/detail'">
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-300 mb-2">UKM Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Website Portal Berita UKM</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Portal berita dan dokumentasi kegiatan UKM dengan CMS kustom</p>
                
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Next.js</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tailwind</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">MDX</span>
                </div>
            </div>

            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm cursor-pointer" onclick="location.href='/members/projects/detail'">
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-300 mb-2">Member Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">CLI Task Manager (Rust)</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Tools CLI untuk manajemen tugas harian dengan fitur pomodoro timer</p>
                
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Rust</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">CLI</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Open Source</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Repositori Pembelajaran & Artikel
            </h2>
            <a href="/members/resources" class="text-xs text-zinc-400 hover:text-white transition underline">Browse Semua</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer" onclick="location.href='/members/resources/detail'">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Modul</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Modul Dasar React untuk Pemula</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Panduan langkah demi langkah memahami komponen, props, state, dan lifecycle React</p>
                <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-[11px] text-zinc-500">
                    <span>2 minggu lalu</span>
                    <span>1.2K views</span>
                </div>
            </div>

            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer" onclick="location.href='/members/resources/detail'">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Artikel</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tutorial</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Debugging JavaScript: Tips & Trik</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Teknik efektif debugging dengan Chrome DevTools, logging strategis, dan tools otomatis</p>
                <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-[11px] text-zinc-500">
                    <span>5 hari lalu</span>
                    <span>842 views</span>
                </div>
            </div>

            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer" onclick="location.href='/members/resources/detail'">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Tutorial</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">DevOps</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Deploy Aplikasi dengan Docker</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Panduan lengkap containerization dan deployment multi-env dengan Docker Compose</p>
                <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-[11px] text-zinc-500">
                    <span>2 bulan lalu</span>
                    <span>934 views</span>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.event-tab');
        const cards = document.querySelectorAll('.event-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => {
                    t.classList.remove('bg-zinc-800', 'text-zinc-100', 'active');
                    t.classList.add('text-zinc-400');
                });
                tab.classList.add('bg-zinc-800', 'text-zinc-100', 'active');
                tab.classList.remove('text-zinc-400');

                const filter = tab.getAttribute('data-filter');
                cards.forEach(card => {
                    const type = card.getAttribute('data-type');
                    if (filter === 'all' || type === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
