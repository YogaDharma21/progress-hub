@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Projects')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Admin Projects</h1>
            <p class="mt-1 text-sm text-zinc-400">Kelola portofolio dan proyek mahasiswa.</p>
        </div>
        <a href="/admin/projects/create" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
            + Tambah Project
        </a>
    </div>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-zinc-300">
                <thead class="bg-zinc-950 text-zinc-400 uppercase text-[11px] font-semibold tracking-wider border-b border-zinc-800">
                    <tr>
                        <th class="px-5 py-3.5">Judul Proyek</th>
                        <th class="px-5 py-3.5">Kategori</th>
                        <th class="px-5 py-3.5">Teknologi</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/60">
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Sistem E-Voting Kampus</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">UKM Project</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">React, Node.js, PostgreSQL</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/projects/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">Website Portal Berita UKM</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">UKM Project</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">Next.js, Tailwind, MDX</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/projects/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-800/40 transition">
                        <td class="px-5 py-4 font-medium text-zinc-100">CLI Task Manager (Rust)</td>
                        <td class="px-5 py-4 text-zinc-400">
                            <span class="px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-950 text-zinc-400 border border-zinc-800">Member Project</span>
                        </td>
                        <td class="px-5 py-4 text-zinc-400">Rust, CLI</td>
                        <td class="px-5 py-4 text-right space-x-2">
                            <a href="/admin/projects/edit" class="px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                            <button type="button" class="px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
