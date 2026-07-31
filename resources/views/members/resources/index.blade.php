@extends('layouts.app')

@section('title', 'Progress Hub — Resources')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Resources</h1>
        <p class="mt-1 text-sm text-zinc-400">Repositori pembelajaran, modul, artikel, dan materi pendukung kegiatan UKM.</p>
    </div>

    
    <div class="flex p-1 bg-zinc-950 border border-zinc-800 rounded-lg w-fit">
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-100 bg-zinc-800 transition active" data-filter="all">Semua</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="module">Modul</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="article">Artikel</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="tool">Tools</button>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="resources-grid">
        <div class="resource-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/resources/detail'" data-type="module">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Modul</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Modul Dasar React untuk Pemula</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Panduan langkah demi langkah memahami komponen, props, state, dan lifecycle React</p>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <span>1.2K views • 2 minggu lalu</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Modul</span>
            </div>
        </div>

        <div class="resource-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/resources/detail'" data-type="article">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Artikel</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tutorial</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Debugging JavaScript: Tips & Trik</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Teknik efektif debugging dengan Chrome DevTools, logging strategis, dan tools otomatis</p>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <span>842 views • 5 hari lalu</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Artikel</span>
            </div>
        </div>

        <div class="resource-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='/members/resources/detail'" data-type="tool">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">Tutorial</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">DevOps</span>
                </div>
                <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">Deploy Aplikasi dengan Docker</h3>
                <p class="text-xs text-zinc-400 line-clamp-2 mt-1">Panduan lengkap containerization dan deployment multi-env dengan Docker Compose</p>
            </div>
            <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                <span>934 views • 2 bulan lalu</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tutorial</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.resource-tab');
        const cards = document.querySelectorAll('.resource-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => {
                    t.classList.remove('bg-zinc-800', 'text-zinc-100', 'active');
                    t.classList.add('text-zinc-400');
                });
                tab.classList.add('bg-zinc-800', 'text-zinc-100', 'active');
                tab.classList.remove('text-zinc-400');

                const filter = tab.getAttribute('data-filter');
                cards.forEach(card => {
                    const type = card.getAttribute('data-type');
                    card.style.display = filter === 'all' || type === filter ? 'flex' : 'none';
                });
            });
        });
    });
</script>
@endsection
