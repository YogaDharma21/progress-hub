@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Dashboard')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Dashboard</h1>
        <p class="mt-1 text-sm text-zinc-400">Ringkasan data dan aktivitas terkini Progress Hub.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <a href="{{ route('admin.events.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-4 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ $stats['events'] }}</div>
            <div class="text-xs text-zinc-400">Events</div>
        </a>

        <a href="{{ route('admin.projects.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-4 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ $stats['projects'] }}</div>
            <div class="text-xs text-zinc-400">Projects</div>
        </a>

        <a href="{{ route('admin.resources.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-4 transition hover:-translate-y-0.5 shadow-sm block">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 group-hover:text-white transition mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ $stats['resources'] }}</div>
            <div class="text-xs text-zinc-400">Resources</div>
        </a>

        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ $stats['users'] }}</div>
            <div class="text-xs text-zinc-400">Users</div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ $stats['participants'] }}</div>
            <div class="text-xs text-zinc-400">Registrations</div>
        </div>

        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center text-zinc-400 mb-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <div class="text-2xl font-bold text-zinc-100">{{ number_format($stats['totalViews']) }}</div>
            <div class="text-xs text-zinc-400">Total Views</div>
        </div>
    </div>

    <!-- Event Status Breakdown -->
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                <span class="text-xs text-zinc-400">Berlangsung</span>
            </div>
            <div class="text-xl font-bold text-zinc-100">{{ $statusCounts['berlangsung'] }}</div>
        </div>
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                <span class="text-xs text-zinc-400">Mendatang</span>
            </div>
            <div class="text-xl font-bold text-zinc-100">{{ $statusCounts['mendatang'] }}</div>
        </div>
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                <span class="text-xs text-zinc-400">Registration</span>
            </div>
            <div class="text-xl font-bold text-zinc-100">{{ $statusCounts['registration'] }}</div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Events -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-800">
                <h3 class="text-sm font-semibold text-zinc-100">Events Terbaru</h3>
                <a href="{{ route('admin.events.index') }}" class="text-xs text-zinc-400 hover:text-white transition">Lihat Semua</a>
            </div>
            <div class="divide-y divide-zinc-800">
                @forelse($recentEvents as $event)
                    <div class="px-5 py-3 flex items-center justify-between">
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $event->title }}</p>
                            <p class="text-xs text-zinc-500 mt-0.5">{{ $event->type ?? '—' }} &middot; {{ $event->participants_count }} peserta</p>
                        </div>
                        @php
                            $statusClass = match(strtolower($event->status ?? '')) {
                                'berlangsung' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                                'mendatang' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                                'registration' => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                                default => 'bg-zinc-800 text-zinc-300 border-zinc-700',
                            };
                        @endphp
                        <span class="shrink-0 ml-3 px-2 py-0.5 rounded-full text-[10px] font-medium border {{ $statusClass }}">{{ $event->status ?? '—' }}</span>
                    </div>
                @empty
                    <div class="px-5 py-6 text-center text-sm text-zinc-500">Belum ada events.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-800">
                <h3 class="text-sm font-semibold text-zinc-100">Projects Terbaru</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-xs text-zinc-400 hover:text-white transition">Lihat Semua</a>
            </div>
            <div class="divide-y divide-zinc-800">
                @forelse($recentProjects as $project)
                    <div class="px-5 py-3 flex items-center justify-between">
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $project->title }}</p>
                            <p class="text-xs text-zinc-500 mt-0.5">{{ $project->category ?? '—' }} &middot; {{ $project->members_count }} anggota</p>
                        </div>
                        <span class="shrink-0 ml-3 px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-800 text-zinc-300">{{ $project->category ?? '—' }}</span>
                    </div>
                @empty
                    <div class="px-5 py-6 text-center text-sm text-zinc-500">Belum ada projects.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Resources -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-800">
                <h3 class="text-sm font-semibold text-zinc-100">Resources Terbaru</h3>
                <a href="{{ route('admin.resources.index') }}" class="text-xs text-zinc-400 hover:text-white transition">Lihat Semua</a>
            </div>
            <div class="divide-y divide-zinc-800">
                @forelse($recentResources as $resource)
                    <div class="px-5 py-3 flex items-center justify-between">
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $resource->title }}</p>
                            <p class="text-xs text-zinc-500 mt-0.5">{{ $resource->type ?? '—' }} &middot; {{ number_format($resource->views_count) }} views</p>
                        </div>
                        <span class="shrink-0 ml-3 px-2 py-0.5 rounded text-[10px] font-medium bg-zinc-800 text-zinc-300 capitalize">{{ $resource->type ?? '—' }}</span>
                    </div>
                @empty
                    <div class="px-5 py-6 text-center text-sm text-zinc-500">Belum ada resources.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-800">
                <h3 class="text-sm font-semibold text-zinc-100">Users Terbaru</h3>
            </div>
            <div class="divide-y divide-zinc-800">
                @forelse($recentUsers as $user)
                    <div class="px-5 py-3 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-zinc-800 flex items-center justify-center text-xs font-semibold text-zinc-300 shrink-0">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $user->name }}</p>
                            <p class="text-xs text-zinc-500 mt-0.5">{{ $user->email }}</p>
                        </div>
                        <span class="shrink-0 ml-3 px-2 py-0.5 rounded text-[10px] font-medium {{ $user->role === 'admin' ? 'bg-amber-500/10 text-amber-400 border border-amber-500/30' : 'bg-zinc-800 text-zinc-300' }}">{{ ucfirst($user->role) }}</span>
                    </div>
                @empty
                    <div class="px-5 py-6 text-center text-sm text-zinc-500">Belum ada users.</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.events.create') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm flex items-center gap-4 block">
            <div class="w-10 h-10 rounded-lg bg-emerald-500/10 flex items-center justify-center text-emerald-400 group-hover:bg-emerald-500/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-zinc-100">Buat Event Baru</h4>
                <p class="text-xs text-zinc-500 mt-0.5">Tambah program kerja atau kegiatan</p>
            </div>
        </a>

        <a href="{{ route('admin.projects.create') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm flex items-center gap-4 block">
            <div class="w-10 h-10 rounded-lg bg-violet-500/10 flex items-center justify-center text-violet-400 group-hover:bg-violet-500/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-zinc-100">Buat Project Baru</h4>
                <p class="text-xs text-zinc-500 mt-0.5">Tambah portofolio atau proyek</p>
            </div>
        </a>

        <a href="{{ route('admin.resources.create') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition hover:-translate-y-0.5 shadow-sm flex items-center gap-4 block">
            <div class="w-10 h-10 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-400 group-hover:bg-cyan-500/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-zinc-100">Buat Resource Baru</h4>
                <p class="text-xs text-zinc-500 mt-0.5">Tambah modul, artikel, atau tool</p>
            </div>
        </a>
    </div>
</div>
@endsection
