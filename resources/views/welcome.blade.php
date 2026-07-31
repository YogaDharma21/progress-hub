@extends('layouts.guest')

@section('title', 'Progress Hub — Landing Page')

@section('content')
<div class="w-full max-w-5xl py-12 space-y-16">
    <div class="text-center space-y-6 max-w-3xl mx-auto">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-zinc-100 tracking-tight leading-tight">
            Pusat Kolaborasi, Proyek, &amp; Kegiatan UKM Modern
        </h1>

        <p class="text-base sm:text-lg text-zinc-400 leading-relaxed">
            Pantau progres belajar, eksplorasi repositori modul &amp; artikel, dan pamerkan portofolio proyek terbaik mahasiswa dalam satu platform terpadu.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
            <a href="/login" class="px-6 py-3 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition hover:-translate-y-0.5 shadow-md">
                Masuk ke Dashboard
            </a>
            <a href="/members/dashboard" class="px-6 py-3 text-sm font-semibold text-zinc-200 bg-zinc-900 border border-zinc-800 rounded-xl hover:bg-zinc-800 transition hover:-translate-y-0.5">
                Jelajahi Program UKM &rarr;
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 bg-zinc-900/60 border border-zinc-800/80 rounded-2xl p-6 backdrop-blur">
        <div class="text-center space-y-1">
            <div class="text-3xl font-extrabold text-zinc-100">12+</div>
            <div class="text-xs text-zinc-400 font-medium">Program Kerja &amp; Kelas</div>
        </div>
        <div class="text-center space-y-1 border-t sm:border-t-0 sm:border-l border-zinc-800 pt-4 sm:pt-0">
            <div class="text-3xl font-extrabold text-zinc-100">28+</div>
            <div class="text-xs text-zinc-400 font-medium">Proyek Showcase</div>
        </div>
        <div class="text-center space-y-1 border-t sm:border-t-0 sm:border-l border-zinc-800 pt-4 sm:pt-0">
            <div class="text-3xl font-extrabold text-zinc-100">45+</div>
            <div class="text-xs text-zinc-400 font-medium">Modul &amp; Artikel Modul</div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="text-center space-y-2">
            <h2 class="text-2xl font-bold text-zinc-100">Fitur &amp; Layanan Utama</h2>
            <p class="text-sm text-zinc-400">Dirancang khusus untuk mendukung perkembangan ekosistem developer UKM</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-3">
                <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-semibold text-base text-zinc-100">Program Kerja &amp; Kelas</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">
                    Ikuti kelas pemrograman, hackathon internal, dan sharing session terstruktur untuk tingkatkan kemampuan coding.
                </p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-3">
                <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="font-semibold text-base text-zinc-100">Portofolio Proyek</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">
                    Pamerkan hasil karya proyek tim maupun individu lengkap dengan deskripsi, tech stack, dan link repository.
                </p>
            </div>

            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-3">
                <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="font-semibold text-base text-zinc-100">Repositori Pembelajaran</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">
                    Akses modul silabus praktikum, tutorial teknis, dan panduan karir software engineering secara gratis.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-zinc-900 via-zinc-900 to-zinc-950 border border-zinc-800 rounded-2xl p-8 text-center space-y-4">
        <h2 class="text-2xl font-bold text-zinc-100">Siap Bergabung dengan Progress Hub?</h2>
        <p class="text-xs sm:text-sm text-zinc-400 max-w-xl mx-auto">
            Mulai perjalanan belajar dan berkontribusi bersama seluruh anggota UKM sekarang.
        </p>
        <div class="pt-2 flex justify-center gap-3">
            <a href="/register" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition">
                Daftar Akun Sekarang
            </a>
            <a href="/login" class="px-5 py-2.5 text-xs font-semibold text-zinc-100 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-700 transition">
                Login Akun
            </a>
        </div>
    </div>
</div>
@endsection
