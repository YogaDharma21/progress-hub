@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Resources</h1>
    </div>

    <!-- Filter Tabs -->
    <div class="flex p-1 bg-surface-inset rounded-full w-fit">
        <button class="resource-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-100 bg-surface border border-border shadow-sm active" data-filter="all">Semua</button>
        <button class="resource-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="module">Modul</button>
        <button class="resource-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="article">Artikel</button>
        <button class="resource-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="tool">Tools</button>
    </div>

    <!-- Resources Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="resources-grid">
        @forelse($resources as $resource)
            <div class="resource-card card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 shadow-sm cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.resources.show', $resource) }}'" data-type="{{ match(strtolower($resource->type ?? '')) { 'modul', 'module' => 'module', 'artikel', 'article' => 'article', 'tutorial', 'tools', 'tool' => 'tool', default => strtolower($resource->type ?? 'module') } }}">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-surface text-zinc-200 border border-border capitalize transition-transform duration-200 group-hover:scale-105">{{ $resource->type ?? 'Modul' }}</span>
                        @if($resource->tags)
                            @foreach(array_slice(array_map('trim', explode(',', $resource->tags)), 0, 2) as $tag)
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-surface-inset text-zinc-400 border border-border transition-colors group-hover:border-zinc-700">{{ $tag }}</span>
                            @endforeach
                        @endif
                    </div>
                    <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white transition-colors">{{ $resource->title }}</h3>
                    <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $resource->description }}</p>
                </div>
                <div class="mt-4 pt-3 border-t border-border flex items-center justify-between text-xs text-zinc-500">
                    <span class="tabular-nums">{{ number_format($resource->views_count ?? 0) }} views &middot; {{ $resource->created_at ? $resource->created_at->diffForHumans() : '' }}</span>
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-surface text-zinc-400 border border-border capitalize">{{ $resource->type ?? 'Resource' }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-card border border-border rounded-3xl p-8 text-center text-zinc-500 text-sm">
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
                    t.classList.remove('bg-surface', 'text-zinc-100', 'border', 'border-border', 'shadow-sm', 'active');
                    t.classList.add('text-zinc-400');
                });
                tab.classList.add('bg-surface', 'text-zinc-100', 'border', 'border-border', 'shadow-sm', 'active');
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
