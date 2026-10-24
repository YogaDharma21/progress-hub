@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Admin Projects</h1>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-spring inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm cursor-pointer">
            + Tambah Project
        </a>
    </div>

    <div class="bg-card border border-border rounded-3xl overflow-hidden shadow-card">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-zinc-300">
                <thead class="bg-surface text-zinc-400 uppercase text-[10px] font-medium tracking-[0.16em] border-b border-border">
                    <tr>
                        <th class="px-5 py-3.5">Judul Proyek</th>
                        <th class="px-5 py-3.5">Kategori</th>
                        <th class="px-5 py-3.5">Teknologi</th>
                        <th class="px-5 py-3.5">Oleh</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-surface/50 transition">
                            <td class="px-5 py-4 font-medium text-zinc-100">{{ $project->title }}</td>
                            <td class="px-5 py-4 text-zinc-400">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-surface text-zinc-300 border border-border">
                                    {{ $project->category ?? 'UKM Project' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-zinc-400">{{ $project->technologies ?? '-' }}</td>
                            <td class="px-5 py-4 text-zinc-400">{{ $project->creator->name ?? '-' }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-zinc-200 bg-surface border border-border rounded-xl hover:bg-zinc-700 transition">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-flex m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-accent-crimson bg-accent-crimson-tint border border-accent-crimson/30 rounded-xl hover:bg-accent-crimson-tint/80 transition cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-zinc-500">
                                Belum ada data proyek. Klik <a href="{{ route('admin.projects.create') }}" class="text-zinc-300 underline underline-offset-4">Tambah Project</a> untuk membuat baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
            <div class="px-5 py-4 border-t border-border">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
