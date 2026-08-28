@extends('layouts.app')

@section('title', 'Progress Hub — ' . $event->title)

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">

    @if(session('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl text-emerald-400 text-sm flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <a href="{{ route('members.events.index') }}" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Events
    </a>

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

    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-6">
        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium border {{ $statusClass }}">
                {{ $event->status ?? 'Aktif' }}
            </span>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">{{ $event->title }}</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                {{ $event->description }}
            </p>
        </div>

        <div class="w-full bg-zinc-950 h-2 rounded-full overflow-hidden">
            <div class="{{ $progressColor }} h-full rounded-full" style="width: {{ $event->progress_percentage ?? 0 }}%"></div>
        </div>

        <div class="pt-4 border-t border-zinc-800 flex flex-wrap items-center justify-between gap-4 text-xs text-zinc-400">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> {{ $event->sessions_count ?? 0 }} Pertemuan</span>
                <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg> {{ $event->participants_count }} Peserta Terdaftar</span>
            </div>

            <form action="{{ route('members.events.register', $event) }}" method="POST">
                @csrf
                @if($isRegistered)
                    <button type="submit" class="px-5 py-2 text-xs font-semibold text-rose-300 bg-rose-500/10 border border-rose-500/30 rounded-lg hover:bg-rose-500/20 transition cursor-pointer">
                        Batal Daftar Event
                    </button>
                @else
                    <button type="submit" class="px-5 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm cursor-pointer">
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
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                    <h3 class="font-semibold text-sm text-zinc-100">{{ $topic->title }}</h3>
                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $topic->description }}</p>
                </div>
            @empty
                <div class="col-span-full bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center text-zinc-500 text-sm">
                    Materi event belum diunggah.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
