@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Dashboard</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.events.create') }}" class="btn-spring px-3.5 py-1.5 text-xs font-medium bg-surface text-zinc-200 hover:text-white border border-border rounded-xl transition">+ Event</a>
            <a href="{{ route('admin.projects.create') }}" class="btn-spring px-3.5 py-1.5 text-xs font-medium bg-surface text-zinc-200 hover:text-white border border-border rounded-xl transition">+ Project</a>
            <a href="{{ route('admin.resources.create') }}" class="btn-spring px-3.5 py-1.5 text-xs font-medium bg-surface text-zinc-200 hover:text-white border border-border rounded-xl transition">+ Resource</a>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <a href="{{ route('admin.submissions.index') }}" class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-5 transition block shadow-card">
            <div class="text-[10px] font-medium text-zinc-500 uppercase tracking-[0.16em] mb-1">Pending Reviews</div>
            <div class="text-3xl font-medium tabular-nums tracking-tight text-accent-amber">{{ $stats['pending_submissions'] }}</div>
        </a>
        <a href="{{ route('admin.events.index') }}" class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-5 transition block shadow-card">
            <div class="text-[10px] font-medium text-zinc-500 uppercase tracking-[0.16em] mb-1">Events</div>
            <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100">{{ $stats['events'] }}</div>
        </a>
        <a href="{{ route('admin.projects.index') }}" class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-5 transition block shadow-card">
            <div class="text-[10px] font-medium text-zinc-500 uppercase tracking-[0.16em] mb-1">Projects</div>
            <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100">{{ $stats['projects'] }}</div>
        </a>
        <a href="{{ route('admin.resources.index') }}" class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-5 transition block shadow-card">
            <div class="text-[10px] font-medium text-zinc-500 uppercase tracking-[0.16em] mb-1">Resources</div>
            <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100">{{ $stats['resources'] }}</div>
        </a>
        <div class="card-spring bg-card border border-border rounded-3xl p-5 shadow-card">
            <div class="text-[10px] font-medium text-zinc-500 uppercase tracking-[0.16em] mb-1">Users</div>
            <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100">{{ $stats['users'] }}</div>
        </div>
    </div>

    <!-- Chart + Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <!-- Activity Chart -->
        <div class="lg:col-span-3 bg-card border border-border rounded-3xl p-6 shadow-card self-start">
            <h3 class="text-sm font-semibold text-zinc-100 mb-4">Aktivitas 7 Hari</h3>
            <div class="flex items-end gap-2 h-28">
                @foreach($days as $day)
                    <div class="group/bar relative flex-1 flex flex-col items-center gap-1">
                        {{-- Tooltip --}}
                        <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 hidden group-hover/bar:block z-10">
                            <div class="bg-card border border-border rounded-xl px-3 py-2 text-[10px] text-zinc-300 whitespace-nowrap shadow-xl">
                                <div class="font-medium text-zinc-100 mb-1">{{ $day['label'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-accent-emerald"></span> Events: {{ $day['events'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-accent-amber"></span> Projects: {{ $day['projects'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-accent-blue"></span> Resources: {{ $day['resources'] }}</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-end gap-0.5" style="height: 80px;">
                            @if($day['events'] > 0)
                                <div class="w-full rounded-t-sm bg-accent-emerald transition-all group-hover/bar:brightness-125" style="height: {{ ($day['events'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['projects'] > 0)
                                <div class="w-full rounded-t-sm bg-accent-amber transition-all group-hover/bar:brightness-125" style="height: {{ ($day['projects'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['resources'] > 0)
                                <div class="w-full rounded-t-sm bg-accent-blue transition-all group-hover/bar:brightness-125" style="height: {{ ($day['resources'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['events'] == 0 && $day['projects'] == 0 && $day['resources'] == 0)
                                <div class="w-full h-px bg-border"></div>
                            @endif
                        </div>
                        <span class="text-[10px] text-zinc-500">{{ $day['label'] }}</span>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-4 mt-4 pt-3 border-t border-border">
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-400">
                    <div class="w-2 h-2 rounded-sm bg-accent-emerald"></div> Events
                </span>
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-400">
                    <div class="w-2 h-2 rounded-sm bg-accent-amber"></div> Projects
                </span>
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-400">
                    <div class="w-2 h-2 rounded-sm bg-accent-blue"></div> Resources
                </span>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="lg:col-span-2 bg-card border border-border rounded-3xl shadow-card overflow-hidden">
            <div class="px-6 py-4 border-b border-border">
                <h3 class="text-sm font-semibold text-zinc-100">Aktivitas Terbaru</h3>
            </div>
            <div class="divide-y divide-border max-h-96 overflow-y-auto" style="-ms-overflow-style:none; scrollbar-width:none;">
                @forelse($recentActivity as $item)
                    <a href="{{ $item['route'] }}" class="px-6 py-3.5 flex items-center gap-3 hover:bg-surface/50 transition block">
                        <div class="w-8 h-8 rounded-xl bg-surface border border-border flex items-center justify-center shrink-0">
                            @if($item['type'] === 'event')
                                <svg class="w-4 h-4 text-accent-emerald" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @elseif($item['type'] === 'project')
                                <svg class="w-4 h-4 text-accent-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            @else
                                <svg class="w-4 h-4 text-accent-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $item['title'] }}</p>
                            <p class="text-[11px] text-zinc-500">
                                {{ ucfirst($item['type']) }} &middot; {{ $item['creator'] }} &middot; <span class="tabular-nums">{{ $item['created_at']->diffForHumans() }}</span>
                                @if(($item['approval_status'] ?? 'approved') === 'pending')
                                    <span class="ml-1 inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-medium bg-accent-amber-tint text-accent-amber border border-accent-amber/30">Pending</span>
                                @elseif(($item['approval_status'] ?? 'approved') === 'rejected')
                                    <span class="ml-1 inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-medium bg-accent-crimson-tint text-accent-crimson border border-accent-crimson/30">Ditolak</span>
                                @endif
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="px-5 py-8 text-center text-sm text-zinc-500">Belum ada aktivitas.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
