@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Admin Events</h1>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn-spring inline-flex items-center justify-center px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm cursor-pointer">
            + Tambah Event
        </a>
    </div>

    <div class="bg-card border border-border rounded-3xl overflow-hidden shadow-card">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-zinc-300">
                <thead class="bg-surface text-zinc-400 uppercase text-[10px] font-medium tracking-[0.16em] border-b border-border">
                    <tr>
                        <th class="px-5 py-3.5">Judul</th>
                        <th class="px-5 py-3.5">Tipe</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5">Sesi</th>
                        <th class="px-5 py-3.5">Peserta</th>
                        <th class="px-5 py-3.5">Oleh</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($events as $event)
                        <tr class="hover:bg-surface/50 transition">
                            <td class="px-5 py-4 font-medium text-zinc-100">{{ $event->title }}</td>
                            <td class="px-5 py-4 text-zinc-400">
                                @if($event->type)
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-surface text-zinc-300 border border-border">{{ $event->type }}</span>
                                @else
                                    <span class="text-zinc-500">-</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                @if($event->status == 'Berlangsung')
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-accent-emerald-tint text-accent-emerald border border-accent-emerald/30">Berlangsung</span>
                                @elseif($event->status == 'Mendatang')
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-accent-amber-tint text-accent-amber border border-accent-amber/30">Mendatang</span>
                                @elseif($event->status == 'Open Registration')
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-accent-blue-tint text-accent-blue border border-accent-blue/30">Open Registration</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-surface text-zinc-300 border border-border">{{ $event->status ?? 'Draft' }}</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-zinc-400 tabular-nums">{{ $event->sessions_count ? $event->sessions_count . ' Pertemuan' : '-' }}</td>
                            <td class="px-5 py-4 text-zinc-400 tabular-nums">{{ $event->participants_count ?? 0 }} / {{ $event->target_capacity ?? '∞' }} Peserta</td>
                            <td class="px-5 py-4 text-zinc-400">{{ $event->creator->name ?? '-' }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-zinc-200 bg-surface border border-border rounded-xl hover:bg-zinc-700 transition">Edit</a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline-flex m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-accent-crimson bg-accent-crimson-tint border border-accent-crimson/30 rounded-xl hover:bg-accent-crimson-tint/80 transition cursor-pointer">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-8 text-center text-zinc-500">
                                Belum ada data event. Klik <a href="{{ route('admin.events.create') }}" class="text-zinc-300 underline underline-offset-4">Tambah Event</a> untuk membuat baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($events->hasPages())
            <div class="px-5 py-4 border-t border-border">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
