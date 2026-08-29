@extends('layouts.app')


@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Projects</h1>
        <p class="mt-1 text-sm text-zinc-400">Portofolio dan proyek mahasiswa dalam dan luar UKM.</p>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($projects as $project)
            <div class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.projects.show', $project) }}'">
                <div>
                    @if($project->image_path)
                        <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-36 object-cover rounded-lg border border-zinc-800 mb-4" />
                    @else
                        <div class="w-full h-36 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                            {{ $project->title }}
                        </div>
                    @endif
                    <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200 mb-2">
                        {{ $project->category ?? 'UKM Project' }}
                    </span>
                    <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">{{ $project->title }}</h3>
                    <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $project->description }}</p>
                    
                    @if($project->technologies)
                        <div class="flex flex-wrap gap-1.5 mt-3">
                            @foreach(array_map('trim', explode(',', $project->technologies)) as $tech)
                                <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">{{ $tech }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-500">
                    <div class="flex items-center gap-2">
                        @if($project->members->count() > 0)
                            <div class="flex -space-x-1.5">
                                @foreach($project->members->take(3) as $m)
                                    <div class="w-6 h-6 rounded bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200" title="{{ $m->user->name ?? '' }}">
                                        {{ strtoupper(substr($m->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span>oleh {{ $project->creator->name ?? 'UKM Member' }}</span>
                        @endif
                    </div>
                    <span>{{ $project->created_at ? $project->created_at->diffForHumans() : '' }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-zinc-900 border border-zinc-800 rounded-xl p-8 text-center text-zinc-500 text-sm">
                Belum ada proyek yang ditambahkan.
            </div>
        @endforelse
    </div>

    @if($projects->hasPages())
        <div class="pt-4">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
