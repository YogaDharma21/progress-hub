@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Resources')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Admin Resources</h1>
            <p class="mt-1 text-sm text-zinc-400">Tambah, edit, dan hapus modul, artikel, dan tutorial.</p>
        </div>
        <a href="/admin/resources/create" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
            + Tambah Resource
        </a>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-zinc-300">
                <thead class="bg-zinc-950 text-zinc-400 uppercase text-[11px] font-semibold tracking-wider border-b border-zinc-800">
                    <tr>
                        <th class="px-5 py-3.5">Judul Resource</th>
                        <th class="px-5 py-3.5">Tipe</th>
                        <th class="px-5 py-3.5">Tag</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/60">
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Modul Dasar React untuk Pemula</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Modul</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">React, Tutorial</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/resources/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Debugging JavaScript: Tips & Trik</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Artikel</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">JavaScript, Debugging</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/resources/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Deploy Aplikasi dengan Docker</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Tutorial</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">DevOps, Docker</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/resources/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
