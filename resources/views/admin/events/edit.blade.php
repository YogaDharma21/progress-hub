@extends('layouts.admin')

@section('title', 'Progress Hub — Edit Event')

@section('content')
<div class="space-y-8 max-w-2xl mx-auto">
    
    <a href="/admin/events" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Admin Events
    </a>

    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Edit Event</h1>
        <p class="mt-1 text-sm text-zinc-400">Perbarui detail program kerja atau kegiatan UKM.</p>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 shadow-sm">
        <form class="space-y-4" onsubmit="return false;">
            <div class="space-y-1.5">
                <label for="event-title" class="block text-xs font-medium text-zinc-200">Judul Event</label>
                <input id="event-title" type="text" value="Kelas React Dasar" 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            </div>

            <div class="space-y-1.5">
                <label for="event-desc" class="block text-xs font-medium text-zinc-200">Deskripsi Event</label>
                <textarea id="event-desc" rows="4" 
                    class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition">Fundamental React dari nol: komponen, state, useEffect, Router, dan integrasi API</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="event-status" class="block text-xs font-medium text-zinc-200">Status</label>
                    <select id="event-status" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition">
                        <option selected>Berlangsung</option>
                        <option>Mendatang</option>
                        <option>Selesai</option>
                        <option>Terdaftar</option>
                        <option>Open Registration</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label for="event-type" class="block text-xs font-medium text-zinc-200">Tipe Event</label>
                    <select id="event-type" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition">
                        <option selected>Kelas</option>
                        <option>Hackathon</option>
                        <option>Sharing</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label for="event-sessions" class="block text-xs font-medium text-zinc-200">Pertemuan / Sesi</label>
                    <input id="event-sessions" type="text" value="8 Pertemuan" 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="event-participants" class="block text-xs font-medium text-zinc-200">Target / Kapasitas Peserta</label>
                    <input id="event-participants" type="text" value="42 Peserta" 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <a href="/admin/events" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="button" onclick="location.href='/admin/events'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
