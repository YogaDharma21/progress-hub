@extends('layouts.app')

@section('title', 'Progress Hub — Events')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Events</h1>
        <p class="mt-1 text-sm text-zinc-400">Semua program kerja, kelas, dan kegiatan UKM yang sedang berjalan atau akan datang.</p>
    </div>

    <!-- Filter Tabs -->
    <div class="flex p-1 bg-zinc-950 border border-zinc-800 rounded-lg w-fit">
        <button class="event-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-100 bg-zinc-800 transition active" data-filter="all">Semua</button>
        <button class="event-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="class">Kelas</button>
        <button class="event-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="hackathon">Hackathon</button>
        <button class="event-tab px-3.5 py-1.5 text-xs font-medium rounded-md text-zinc-400 hover:text-zinc-100 transition" data-filter="sharing">Sharing</button>
    </div>

    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="events-grid">
        @forelse($events as $event)
            @php
                $statusClass = match(strtolower($event->status)) {
                    'berlangsung' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                    'mendatang' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                    'registration' => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                    default => 'bg-zinc-800 text-zinc-300 border-zinc-700',
                };
                $progressColor = match(strtolower($event->status)) {
                    'berlangsung' => 'bg-emerald-500',
                    'mendatang' => 'bg-amber-500',
                    'registration' => 'bg-blue-500',
                    default => 'bg-zinc-600',
                };
            @endphp
            <div class="event-card group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.events.show', $event) }}'" data-type="{{ strtolower($event->type ?? 'class') }}">
                <div>
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div>
                            <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">{{ $event->title }}</h3>
                            <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $event->description }}</p>
                        </div>
                        <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClass }}">
                            {{ $event->status ?? 'Aktif' }}
                        </span>
                    </div>

                    <div class="w-full bg-zinc-950 h-1.5 rounded-full overflow-hidden mb-4">
                        <div class="{{ $progressColor }} h-full rounded-full" style="width: {{ $event->computed_progress }}%"></div>
                    </div>
                </div>

                <div class="pt-3 border-t border-zinc-800/80 flex items-center justify-between text-xs text-zinc-400">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $event->sessions_count ?? 0 }} Pertemuan</span>
                        <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $event->participants_count }} Peserta</span>
                    </div>
                    @if($event->participants->count() > 0)
                        <div class="flex -space-x-1.5">
                            @foreach($event->participants->take(2) as $participant)
                                <div class="w-6 h-6 rounded-full bg-zinc-700 border border-zinc-800 flex items-center justify-center text-[10px] font-semibold text-zinc-200" title="{{ $participant->user->name ?? 'User' }}">
                                    {{ strtoupper(substr($participant->user->name ?? 'U', 0, 1)) }}
                                </div>
                            @endforeach
                            @if($event->participants_count > 2)
                                <div class="w-6 h-6 rounded-full bg-zinc-800 border border-zinc-800 flex items-center justify-center text-[9px] font-medium text-zinc-400">
                                    +{{ $event->participants_count - 2 }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full bg-zinc-900 border border-zinc-800 rounded-xl p-8 text-center text-zinc-500 text-sm">
                Belum ada event yang tersedia.
            </div>
        @endforelse
    </div>

    @if($events->hasPages())
        <div class="pt-4">
            {{ $events->links() }}
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.event-tab');
        const cards = document.querySelectorAll('.event-card');

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
