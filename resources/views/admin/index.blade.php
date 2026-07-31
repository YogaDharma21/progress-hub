@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Dashboard')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Admin Dashboard</h1>
        <p class="mt-1 text-sm text-zinc-400">Kelola konten, kegiatan, portofolio, dan repositori Progress Hub.</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <a href="/admin/events" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-6 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h2 class="text-lg font-semibold text-zinc-100 group-hover:text-white">Events</h2>
            <p class="text-xs text-zinc-400 mt-1 leading-relaxed">Tambah, edit, dan hapus program kerja serta kegiatan UKM.</p>
        </a>

        <a href="/admin/projects" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-6 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <h2 class="text-lg font-semibold text-zinc-100 group-hover:text-white">Projects</h2>
            <p class="text-xs text-zinc-400 mt-1 leading-relaxed">Kelola portofolio dan proyek mahasiswa.</p>
        </a>

        <a href="/admin/resources" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-6 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-10 h-10 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h2 class="text-lg font-semibold text-zinc-100 group-hover:text-white">Resources</h2>
            <p class="text-xs text-zinc-400 mt-1 leading-relaxed">Tambah, edit, dan hapus modul, artikel, dan tutorial.</p>
        </a>
    </div>
</div>
@endsection
