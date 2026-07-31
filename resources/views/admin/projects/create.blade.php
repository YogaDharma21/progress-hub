@extends('layouts.admin')

@section('title', 'Progress Hub — Buat Project')

@section('content')
<div class="space-y-8 max-w-2xl mx-auto">
    
    <a href="/admin/projects" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Admin Projects
    </a>

    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Buat Project Baru</h1>
        <p class="mt-1 text-sm text-zinc-400">Isi detail portofolio atau proyek mahasiswa yang akan ditambahkan.</p>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 shadow-sm">
        <form class="space-y-4" onsubmit="return false;">
            <div class="space-y-1.5">
                <label for="project-title" class="block text-xs font-medium text-zinc-200">Judul Proyek</label>
                <input id="project-title" type="text" placeholder="Contoh: Sistem E-Voting Kampus" 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            </div>

            <div class="space-y-1.5">
                <label for="project-desc" class="block text-xs font-medium text-zinc-200">Deskripsi Proyek</label>
                <textarea id="project-desc" rows="4" placeholder="Deskripsi singkat proyek..." 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition"></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="project-type" class="block text-xs font-medium text-zinc-200">Kategori Proyek</label>
                    <select id="project-type" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition">
                        <option value="" disabled selected>Pilih kategori</option>
                        <option>UKM Project</option>
                        <option>Member Project</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label for="project-tech" class="block text-xs font-medium text-zinc-200">Teknologi (pisahkan dengan koma)</label>
                    <input id="project-tech" type="text" placeholder="React, Node.js, PostgreSQL" 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <a href="/admin/projects" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="button" onclick="location.href='/admin/projects'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
                    Simpan Proyek
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
