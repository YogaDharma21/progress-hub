@extends('layouts.app')


@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    
    <a href="{{ route('members.resources.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-zinc-400 hover:text-zinc-100 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Resources
    </a>

    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-6">
        @if($resource->cover_image)
            <img src="{{ Storage::url($resource->cover_image) }}" alt="{{ $resource->title }}" class="w-full h-64 object-cover rounded-lg border border-zinc-800" />
        @else
            <div class="w-full h-56 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 flex items-center justify-center text-sm text-zinc-500 font-medium">
                {{ $resource->title }}
            </div>
        @endif

        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-zinc-800 text-zinc-200 capitalize">
                {{ $resource->type ?? 'Modul' }}
            </span>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">{{ $resource->title }}</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                {{ $resource->description }}
            </p>
        </div>

        @if($resource->tags)
            <div class="flex flex-wrap gap-2">
                @foreach(array_map('trim', explode(',', $resource->tags)) as $tag)
                    <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <div class="pt-4 border-t border-zinc-800 flex flex-wrap items-center justify-between text-xs text-zinc-400 gap-4">
            <span>{{ number_format($resource->views_count ?? 0) }} views • {{ $resource->created_at ? $resource->created_at->diffForHumans() : '' }}</span>
            
            @if($resource->file_path)
                @if(filter_var($resource->file_path, FILTER_VALIDATE_URL))
                    <a href="{{ $resource->file_path }}" target="_blank" rel="noopener noreferrer" class="px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Akses File / Link Resource
                    </a>
                @else
                    <a href="{{ Storage::url($resource->file_path) }}" download class="px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Unduh File Modul
                    </a>
                @endif
            @endif
        </div>
    </div>

    <!-- Chapters Section -->
    <div class="space-y-4">
        <h2 class="text-lg font-semibold text-zinc-100">Daftar Bab & Topik Pembelajaran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($resource->chapters as $chapter)
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                    <h3 class="font-semibold text-sm text-zinc-100">
                        {{ $chapter->title ?? ('Bab ' . $chapter->chapter_number) }}
                    </h3>
                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $chapter->description }}</p>
                </div>
            @empty
                <div class="col-span-full bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center text-zinc-500 text-sm">
                    Bab pembelajaran belum ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
