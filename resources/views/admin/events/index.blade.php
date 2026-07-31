@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Events')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Admin Events</h1>
            <p class="mt-1 text-sm text-zinc-400">Tambah, edit, dan hapus program kerja serta kegiatan UKM.</p>
        </div>
        <a href="/admin/events/create" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
            + Tambah Event
        </a>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-zinc-300">
                <thead class="bg-zinc-950 text-zinc-400 uppercase text-[11px] font-semibold tracking-wider border-b border-zinc-800">
                    <tr>
                        <th class="px-5 py-3.5">Judul</th>
                        <th class="px-5 py-3.5">Tipe</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5">Sesi</th>
                        <th class="px-5 py-3.5">Peserta</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/60">
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Kelas React Dasar</td>
                        <td class="px-5 py-4 text-zinc-400">Kelas</td>
                        <td class="px-5 py-4">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">Berlangsung</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">8 Pertemuan</td>
                        <td class="px-5 py-4 text-zinc-400">42 Peserta</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/events/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Python Dasar untuk Pemula</td>
                        <td class="px-5 py-4 text-zinc-400">Kelas</td>
                        <td class="px-5 py-4">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-amber-500/10 text-amber-400 border border-amber-500/30">Mendatang</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">6 Pertemuan</td>
                        <td class="px-5 py-4 text-zinc-400">35 Peserta</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/events/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Hackathon Internal 2025</td>
                        <td class="px-5 py-4 text-zinc-400">Hackathon</td>
                        <td class="px-5 py-4">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-blue-500/10 text-blue-400 border border-blue-500/30">Open Registration</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">48 jam</td>
                        <td class="px-5 py-4 text-zinc-400">48 Teams</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/events/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
