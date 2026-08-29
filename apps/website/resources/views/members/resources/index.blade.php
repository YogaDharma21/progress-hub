@extends('layouts.app')

@section('title', 'Progress Hub — Resources')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Resources</h1>
        <p class="mt-1 text-sm text-zinc-400">Repositori pembelajaran, modul, artikel, dan materi pendukung kegiatan UKM.</p>
    </div>

    <!-- Filter Tabs -->
    <div class="flex p-1 bg-zinc-950 border border-zinc-800 rounded-lg w-fit">
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-100 bg-zinc-800 transition active" data-filter="all">Semua</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="module">Modul</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="article">Artikel</button>
        <button class="resource-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="tool">Tools</button>
    </div>

    <!-- Resources Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="resources-grid">
        @forelse($resources as $resource)
            <div class="resource-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.resources.show', $resource) }}'" data-type="{{ match(strtolower($resource->type ?? '')) { 'modul', 'module' => 'module', 'artikel', 'article' => 'article', 'tutorial', 'tools', 'tool' => 'tool', default => strtolower($resource->type ?? 'module') } }}">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200 capitalize">{{ $resource->type ?? 'Modul' }}</span>
                        @if($resource->tags)
                            @foreach(array_slice(array_map('trim', explode(',', $resource->tags)), 0, 2) as $tag)
                                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">{{ $tag }}</span>
                            @endforeach
                        @endif
                    </div>
                    <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">{{ $resource->title }}</h3>
                    <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $resource->description }}</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                    <span>{{ number_format($resource->views_count ?? 0) }} views • {{ $resource->created_at ? $resource->created_at->diffForHumans() : '' }}</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800 capitalize">{{ $resource->type ?? 'Resource' }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-zinc-900 border border-zinc-800 rounded-xl p-8 text-center text-zinc-500 text-sm">
                Belum ada resource pembelajaran.
            </div>
        @endforelse
    </div>

    @if($resources->hasPages())
        <div class="pt-4">
            {{ $resources->links() }}
        </div>
    @endif
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
