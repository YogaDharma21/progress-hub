@extends('layouts.app')

@section('title', 'Progress Hub — Project Detail')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    
    <a href="/members/projects" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Projects
    </a>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-6">
        <div class="w-full h-56 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 flex items-center justify-center text-sm text-zinc-500 font-medium">
            Showcase Screenshot
        </div>

        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-zinc-800 text-zinc-200">
                UKM Project
            </span>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Sistem E-Voting Kampus</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                Platform voting digital untuk pemilihan organisasi kampus dengan keamanan tinggi. Sistem ini mencakup proses registrasi kandidat, verifikasi pemilih, voting terenkripsi, dan perhitungan hasil real-time.
            </p>
        </div>

        <div class="flex flex-wrap gap-2">
            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Node.js</span>
            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">PostgreSQL</span>
        </div>

        <div class="pt-4 border-t border-zinc-800 flex items-center justify-between text-xs text-zinc-400">
            <div class="flex items-center gap-2">
                <span class="text-zinc-500">Tim Pengembang:</span>
                <div class="flex -space-x-1.5">
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">A</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">B</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">C</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">+4</div>
                </div>
            </div>
            <span>Dibuat 3 bulan lalu</span>
        </div>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-3">
        <h2 class="text-sm font-semibold text-zinc-100">Links Project</h2>
        <div class="flex flex-wrap gap-3">
            <a href="#" class="px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5">Live Demo</a>
            <a href="#" class="px-4 py-2 text-xs font-semibold text-zinc-100 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-700 transition hover:-translate-y-0.5">GitHub Repository</a>
            <a href="#" class="px-4 py-2 text-xs font-semibold text-zinc-400 bg-transparent border border-zinc-800 rounded-lg hover:bg-zinc-800/60 hover:text-zinc-200 transition">Documentation</a>
        </div>
    </div>

    
    <div class="space-y-4">
        <h2 class="text-lg font-semibold text-zinc-100">Fitur Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Verifikasi Identitas</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Sistem verifikasi mahasiswa dengan data akademik terintegrasi</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Voting Terenkripsi</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Pemungutan suara dengan enkripsi end-to-end untuk integritas data</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Hasil Real-time</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Monitor perolehan suara secara langsung dengan dashboard statistik</p>
            </div>
        </div>
    </div>
</div>
@endsection
