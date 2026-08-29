@extends('layouts.admin')


@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Admin Projects</h1>
            <p class="mt-1 text-sm text-zinc-400">Kelola portofolio dan proyek mahasiswa.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
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
                        <th class="px-5 py-3.5">Oleh</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800/60">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-zinc-800/40 transition">
                            <td class="px-5 py-4 font-medium text-zinc-100">{{ $project->title }}</td>
                            <td class="px-5 py-4 text-zinc-400">
                                @if($project->category == 'UKM Project')
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-semibold bg-zinc-800 text-zinc-200">UKM Project</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-semibold bg-zinc-950 text-zinc-400 border border-zinc-800">{{ $project->category ?? 'Member Project' }}</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-zinc-400">{{ $project->technologies ?? '-' }}</td>
                            <td class="px-5 py-4 text-zinc-400">{{ $project->creator->name ?? '-' }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 border border-zinc-700 rounded-md hover:bg-zinc-700 transition">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-flex m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-rose-400 bg-rose-500/10 border border-rose-500/30 rounded-md hover:bg-rose-500/20 transition cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-center text-zinc-500">
                                Belum ada data proyek. Klik <a href="{{ route('admin.projects.create') }}" class="text-zinc-300 underline">Tambah Project</a> untuk membuat baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
            <div class="px-5 py-4 border-t border-zinc-800">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
