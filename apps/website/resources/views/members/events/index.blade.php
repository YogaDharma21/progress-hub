@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Events</h1>
    </div>

    <!-- Filter Tabs -->
    <div class="flex p-1 bg-surface-inset rounded-full w-fit">
        <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-100 bg-surface border border-border shadow-sm active" data-filter="all">Semua</button>
        <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="class">Kelas</button>
        <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="hackathon">Hackathon</button>
        <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="sharing">Sharing</button>
    </div>

    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="events-grid">
        @forelse($events as $event)
            @php
                $statusClass = match(strtolower($event->status)) {
                    'berlangsung' => 'bg-accent-emerald-tint text-accent-emerald border-accent-emerald/30',
                    'mendatang' => 'bg-accent-amber-tint text-accent-amber border-accent-amber/30',
                    'registration' => 'bg-accent-blue-tint text-accent-blue border-accent-blue/30',
                    default => 'bg-surface text-zinc-300 border-border',
                };
            @endphp
            <div class="event-card card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 shadow-sm cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.events.show', $event) }}'" data-type="{{ match(strtolower($event->type ?? '')) { 'kelas', 'class' => 'class', 'hackathon' => 'hackathon', 'sharing' => 'sharing', default => strtolower($event->type ?? 'class') } }}">
                <div>
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div>
                            <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white transition-colors">{{ $event->title }}</h3>
                            <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $event->description }}</p>
                        </div>
                        <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium border transition-transform duration-200 group-hover:scale-105 {{ $statusClass }}">
                            {{ $event->status ?? 'Aktif' }}
                        </span>
                    </div>
                </div>

                <div class="pt-3 border-t border-border flex items-center justify-between text-xs text-zinc-400">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center gap-1 tabular-nums"><svg class="w-3.5 h-3.5 opacity-70 transition-transform duration-200 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $event->sessions_count ?? 0 }} Pertemuan</span>
                        <span class="flex items-center gap-1 tabular-nums"><svg class="w-3.5 h-3.5 opacity-70 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $event->participants_count }} Peserta</span>
                    </div>
                    @if($event->participants->count() > 0)
                        <div class="flex -space-x-1.5">
                            @foreach($event->participants->take(2) as $participant)
                                <div class="w-6 h-6 rounded-lg bg-surface border border-border flex items-center justify-center text-[10px] font-semibold text-zinc-200 transition-transform duration-200 group-hover:-translate-y-0.5" title="{{ $participant->user->name ?? 'User' }}">
                                    {{ strtoupper(substr($participant->user->name ?? 'U', 0, 1)) }}
                                </div>
                            @endforeach
                            @if($event->participants_count > 2)
                                <div class="w-6 h-6 rounded-lg bg-surface border border-border flex items-center justify-center text-[9px] font-medium text-zinc-400">
                                    +{{ $event->participants_count - 2 }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full bg-card border border-border rounded-3xl p-8 text-center text-zinc-500 text-sm">
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
