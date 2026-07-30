@extends('layouts.admin')

@section('title', 'Progress Hub — Buat Resource')

@section('content')
<div class="space-y-8 max-w-2xl mx-auto">
    
    <a href="/admin/resources" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Admin Resources
    </a>

    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Buat Resource Baru</h1>
        <p class="mt-1 text-sm text-zinc-400">Isi detail modul, artikel, atau tutorial yang akan ditambahkan.</p>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 shadow-sm">
        <form class="space-y-4" onsubmit="return false;">
            <div class="space-y-1.5">
                <label for="resource-title" class="block text-xs font-medium text-zinc-200">Judul Resource</label>
                <input id="resource-title" type="text" placeholder="Contoh: Modul Dasar React untuk Pemula" 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            </div>

            <div class="space-y-1.5">
                <label for="resource-desc" class="block text-xs font-medium text-zinc-200">Deskripsi / Ringkasan</label>
                <textarea id="resource-desc" rows="4" placeholder="Deskripsi atau rangkuman materi..." 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition"></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="resource-type" class="block text-xs font-medium text-zinc-200">Tipe Resource</label>
                    <select id="resource-type" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition">
                        <option value="" disabled selected>Pilih tipe</option>
                        <option>Modul</option>
                        <option>Artikel</option>
                        <option>Tutorial</option>
                        <option>Tools</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label for="resource-tags" class="block text-xs font-medium text-zinc-200">Tags (pisahkan dengan koma)</label>
                    <input id="resource-tags" type="text" placeholder="React, Frontend, Web" 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <a href="/admin/resources" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="button" onclick="location.href='/admin/resources'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
                    Simpan Resource
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
