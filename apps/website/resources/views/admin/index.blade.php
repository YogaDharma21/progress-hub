@extends('layouts.admin')

@section('title', 'Progress Hub — Admin Dashboard')

@section('content')
<div class="space-y-8">
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-3xl font-bold text-zinc-100 tracking-tight">Dashboard</h1>
            <p class="mt-1 text-sm text-zinc-400">Ringkasan data Progress Hub.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.events.create') }}" class="px-3 py-1.5 text-xs font-medium bg-zinc-800 text-zinc-300 hover:text-zinc-100 rounded-lg transition">+ Event</a>
            <a href="{{ route('admin.projects.create') }}" class="px-3 py-1.5 text-xs font-medium bg-zinc-800 text-zinc-300 hover:text-zinc-100 rounded-lg transition">+ Project</a>
            <a href="{{ route('admin.resources.create') }}" class="px-3 py-1.5 text-xs font-medium bg-zinc-800 text-zinc-300 hover:text-zinc-100 rounded-lg transition">+ Resource</a>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <a href="{{ route('admin.submissions.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition block">
            <div class="text-3xl font-bold text-amber-400">{{ $stats['pending_submissions'] }}</div>
            <div class="text-sm text-zinc-500 mt-1">Pending Reviews</div>
        </a>
        <a href="{{ route('admin.events.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition block">
            <div class="text-3xl font-bold text-zinc-100">{{ $stats['events'] }}</div>
            <div class="text-sm text-zinc-500 mt-1">Events</div>
        </a>
        <a href="{{ route('admin.projects.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition block">
            <div class="text-3xl font-bold text-zinc-100">{{ $stats['projects'] }}</div>
            <div class="text-sm text-zinc-500 mt-1">Projects</div>
        </a>
        <a href="{{ route('admin.resources.index') }}" class="group bg-zinc-900 border border-zinc-800 hover:border-zinc-700 rounded-xl p-5 transition block">
            <div class="text-3xl font-bold text-zinc-100">{{ $stats['resources'] }}</div>
            <div class="text-sm text-zinc-500 mt-1">Resources</div>
        </a>
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
            <div class="text-3xl font-bold text-zinc-100">{{ $stats['users'] }}</div>
            <div class="text-sm text-zinc-500 mt-1">Users</div>
        </div>
    </div>

    <!-- Chart + Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <!-- Activity Chart -->
        <div class="lg:col-span-3 bg-zinc-900 border border-zinc-800 rounded-xl p-5">
            <h3 class="text-sm font-semibold text-zinc-100 mb-4">Aktivitas 7 Hari</h3>
            <div class="flex items-end gap-2 h-28">
                @foreach($days as $day)
                    <div class="group/bar relative flex-1 flex flex-col items-center gap-1">
                        {{-- Tooltip --}}
                        <div class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2 hidden group-hover/bar:block z-10">
                            <div class="bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-[10px] text-zinc-300 whitespace-nowrap shadow-lg">
                                <div class="font-medium text-zinc-100 mb-1">{{ $day['label'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-zinc-600"></span> Events: {{ $day['events'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-zinc-500"></span> Projects: {{ $day['projects'] }}</div>
                                <div class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-sm bg-zinc-400"></span> Resources: {{ $day['resources'] }}</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-end gap-0.5" style="height: 80px;">
                            @if($day['events'] > 0)
                                <div class="w-full rounded-t-sm bg-zinc-600 transition-all group-hover/bar:brightness-125" style="height: {{ ($day['events'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['projects'] > 0)
                                <div class="w-full rounded-t-sm bg-zinc-500 transition-all group-hover/bar:brightness-125" style="height: {{ ($day['projects'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['resources'] > 0)
                                <div class="w-full rounded-t-sm bg-zinc-400 transition-all group-hover/bar:brightness-125" style="height: {{ ($day['resources'] / $maxActivity) * 100 }}%; min-height: 8px;"></div>
                            @endif
                            @if($day['events'] == 0 && $day['projects'] == 0 && $day['resources'] == 0)
                                <div class="w-full h-px bg-zinc-800"></div>
                            @endif
                        </div>
                        <span class="text-[10px] text-zinc-500">{{ $day['label'] }}</span>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-4 mt-3">
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-500">
                    <div class="w-2 h-2 rounded-sm bg-zinc-600"></div> Events
                </span>
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-500">
                    <div class="w-2 h-2 rounded-sm bg-zinc-500"></div> Projects
                </span>
                <span class="flex items-center gap-1.5 text-[10px] text-zinc-500">
                    <div class="w-2 h-2 rounded-sm bg-zinc-400"></div> Resources
                </span>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="lg:col-span-2 bg-zinc-900 border border-zinc-800 rounded-xl">
            <div class="px-5 py-4 border-b border-zinc-800">
                <h3 class="text-sm font-semibold text-zinc-100">Aktivitas Terbaru</h3>
            </div>
            <div class="divide-y divide-zinc-800 max-h-96 overflow-y-auto" style="-ms-overflow-style:none; scrollbar-width:none;">
                @forelse($recentActivity as $item)
                    <a href="{{ $item['route'] }}" class="px-5 py-3 flex items-center gap-3 hover:bg-zinc-800/50 transition block">
                        <div class="w-8 h-8 rounded-lg bg-zinc-950 flex items-center justify-center shrink-0">
                            @if($item['type'] === 'event')
                                <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            @elseif($item['type'] === 'project')
                                <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            @else
                                <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm text-zinc-100 font-medium truncate">{{ $item['title'] }}</p>
                            <p class="text-[11px] text-zinc-500">
                                {{ ucfirst($item['type']) }} &middot; {{ $item['creator'] }} &middot; {{ $item['created_at']->diffForHumans() }}
                                @if(($item['approval_status'] ?? 'approved') === 'pending')
                                    <span class="ml-1 inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                                @elseif(($item['approval_status'] ?? 'approved') === 'rejected')
                                    <span class="ml-1 inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20">Ditolak</span>
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
