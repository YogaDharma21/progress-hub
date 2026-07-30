@extends('layouts.app')

@section('title', 'Progress Hub — Event Detail')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    
    <a href="/members/events" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Events
    </a>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-6">
        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                Berlangsung
            </span>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Kelas React Dasar</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                Fundamental React dari nol: komponen, state, useEffect, Router, dan integrasi API. Kelas ini membahas dasar-dasar React secara menyeluruh, mulai dari konsep komponen, manajemen state, useEffect untuk side effects, React Router untuk navigasi, hingga integrasi dengan API eksternal.
            </p>
        </div>

        <div class="w-full bg-zinc-950 h-2 rounded-full overflow-hidden">
            <div class="bg-emerald-500 h-full rounded-full" style="width: 65%"></div>
        </div>

        <div class="pt-4 border-t border-zinc-800 flex flex-wrap items-center justify-between gap-4 text-xs text-zinc-400">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 8 Pertemuan</span>
                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 42 Peserta</span>
            </div>

            <button type="button" class="px-5 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
                Daftar Event
            </button>
        </div>
    </div>

    
    <div class="space-y-4">
        <h2 class="text-lg font-semibold text-zinc-100">Materi yang Akan Dijelaskan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Komponen & Props</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Memahami struktur komponen, props, dan cara meneruskan data antar komponen</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">State & useEffect</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Mengelola state lokal dan efek samping dengan hooks React modern</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">React Router</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Navigasi single-page application, route protection, dan dynamic routing</p>
            </div>
        </div>
    </div>
</div>
@endsection
