@extends('layouts.app')

@section('title', 'Progress Hub — Projects')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Projects</h1>
        <p class="mt-1 text-sm text-zinc-400">Portofolio dan proyek mahasiswa dalam dan luar UKM.</p>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/projects/detail'">
            <div>
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200 mb-2">UKM Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Sistem E-Voting Kampus</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Platform voting digital untuk pemilihan organisasi kampus dengan keamanan tinggi</p>
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Node.js</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">PostgreSQL</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <div class="flex -space-x-1.5">
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">A</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">B</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">+4</div>
                </div>
                <span>Dibuat: 3 bulan lalu</span>
            </div>
        </div>

        <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/projects/detail'">
            <div>
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200 mb-2">UKM Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Website Portal Berita UKM</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Portal berita dan dokumentasi kegiatan UKM dengan CMS kustom</p>
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Next.js</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tailwind</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">MDX</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <div class="flex -space-x-1.5">
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">D</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200">E</div>
                    <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">+2</div>
                </div>
                <span>Dibuat: 1 bulan lalu</span>
            </div>
        </div>

        <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/projects/detail'">
            <div>
                <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                    Showcase Screenshot
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-950 text-zinc-400 border border-zinc-800 mb-2">Member Project</span>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">CLI Task Manager (Rust)</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Tools CLI untuk manajemen tugas harian dengan fitur pomodoro timer</p>
                <div class="flex flex-wrap gap-1.5 mt-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Rust</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">CLI</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Open Source</span>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <span>oleh Ahmad Fauzi</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-800 text-zinc-300">142 Stars</span>
            </div>
        </div>
    </div>
</div>
@endsection
