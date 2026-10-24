@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">

    @if(session('success'))
        <div class="p-4 bg-accent-emerald-tint border border-accent-emerald/30 rounded-2xl text-accent-emerald text-sm flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <a href="{{ route('members.events.index') }}" class="btn-spring inline-flex items-center gap-2 text-sm font-medium text-zinc-400 hover:text-zinc-100 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Events
    </a>

    @php
        $statusClass = match(strtolower($event->status)) {
            'berlangsung' => 'bg-accent-emerald-tint text-accent-emerald border-accent-emerald/30',
            'mendatang' => 'bg-accent-amber-tint text-accent-amber border-accent-amber/30',
            'registration' => 'bg-accent-blue-tint text-accent-blue border-accent-blue/30',
            default => 'bg-surface text-zinc-300 border-border',
        };
    @endphp

    <div class="bg-card border border-border rounded-3xl p-6 sm:p-8 space-y-6 shadow-card">
        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium border {{ $statusClass }}">
                {{ $event->status ?? 'Aktif' }}
            </span>
            <h1 class="text-2xl font-semibold text-zinc-100 tracking-tight">{{ $event->title }}</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                {{ $event->description }}
            </p>
        </div>

        <div class="pt-4 border-t border-border flex flex-wrap items-center justify-between gap-4 text-xs text-zinc-400">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5 tabular-nums"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $event->sessions_count ?? 0 }} Pertemuan</span>
                <span class="flex items-center gap-1.5 tabular-nums"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $event->participants_count }} Peserta Terdaftar</span>
            </div>

            <form action="{{ route('members.events.register', $event) }}" method="POST">
                @csrf
                @if($isRegistered)
                    <button type="submit" class="btn-spring px-5 py-2 text-xs font-semibold text-accent-crimson bg-accent-crimson-tint border border-accent-crimson/30 rounded-xl hover:bg-accent-crimson-tint/80 transition cursor-pointer">
                        Batal Daftar Event
                    </button>
                @else
                    <button type="submit" class="btn-spring px-5 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm cursor-pointer">
                        Daftar Event
                    </button>
                @endif
            </form>
        </div>
    </div>

    <!-- Topics Section -->
    <div class="space-y-4">
        <h2 class="text-lg font-semibold text-zinc-100">Materi & Silabus Event</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @forelse($event->topics as $topic)
                <div class="bg-card border border-border rounded-2xl p-5 space-y-2">
                    <h3 class="font-semibold text-sm text-zinc-100">{{ $topic->title }}</h3>
                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $topic->description }}</p>
                </div>
            @empty
                <div class="col-span-full bg-card border border-border rounded-2xl p-6 text-center text-zinc-500 text-sm">
                    Materi event belum diunggah.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
