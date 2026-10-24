@extends('layouts.app')

@section('content')
<div class="space-y-10">

    <div>
        <h1 class="text-3xl font-semibold text-zinc-100 tracking-tight">Dashboard</h1>
    </div>

    <!-- Summary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 flex items-center gap-4 cursor-pointer">
            <div class="w-11 h-11 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-400 transition-transform duration-200 group-hover:scale-110 group-hover:rotate-6 group-hover:text-zinc-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium text-zinc-500 uppercase tracking-[0.16em]">Program Aktif</div>
                <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100 group-hover:text-white transition-colors">{{ $eventsCount }}</div>
            </div>
        </div>

        <div class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 flex items-center gap-4 cursor-pointer">
            <div class="w-11 h-11 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-400 transition-transform duration-200 group-hover:scale-110 group-hover:rotate-6 group-hover:text-zinc-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium text-zinc-500 uppercase tracking-[0.16em]">Proyek Showcase</div>
                <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100 group-hover:text-white transition-colors">{{ $projectsCount }}</div>
            </div>
        </div>

        <div class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 flex items-center gap-4 cursor-pointer">
            <div class="w-11 h-11 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-400 transition-transform duration-200 group-hover:scale-110 group-hover:rotate-6 group-hover:text-zinc-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <div>
                <div class="text-[11px] font-medium text-zinc-500 uppercase tracking-[0.16em]">Artikel & Modul</div>
                <div class="text-3xl font-medium tabular-nums tracking-tight text-zinc-100 group-hover:text-white transition-colors">{{ $resourcesCount }}</div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="p-4 rounded-2xl bg-accent-emerald-tint border border-accent-emerald/30 text-sm text-accent-emerald flex items-center gap-3 shadow-lg">
            <svg class="w-5 h-5 text-accent-emerald shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- My Submissions Section -->
    <section>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Submission Saya
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('members.submissions.events.create') }}" class="btn-spring group inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white shadow-sm">
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Event
                </a>
                <a href="{{ route('members.submissions.projects.create') }}" class="btn-spring group inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white shadow-sm">
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Project
                </a>
                <a href="{{ route('members.submissions.resources.create') }}" class="btn-spring group inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white shadow-sm">
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Resource
                </a>
            </div>
        </div>

        <div class="bg-card border border-border rounded-3xl overflow-hidden shadow-card">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-zinc-300">
                    <thead class="bg-surface text-zinc-400 uppercase text-[10px] font-medium tracking-[0.16em] border-b border-border">
                        <tr>
                            <th class="px-5 py-3.5">Judul</th>
                            <th class="px-5 py-3.5">Tipe</th>
                            <th class="px-5 py-3.5">Status</th>
                            <th class="px-5 py-3.5">Tanggal</th>
                            <th class="px-5 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @forelse($mySubmissions as $submission)
                            @php
                                $typeLabel = class_basename($submission->submittable_type);
                                $typeLabel = match($typeLabel) {
                                    'Event' => 'Event',
                                    'Project' => 'Project',
                                    'Resource' => 'Resource',
                                    default => $typeLabel,
                                };
                                $statusClass = match($submission->status) {
                                    'pending' => 'bg-accent-amber-tint text-accent-amber border border-accent-amber/30',
                                    'approved' => 'bg-accent-emerald-tint text-accent-emerald border border-accent-emerald/30',
                                    'rejected' => 'bg-accent-crimson-tint text-accent-crimson border border-accent-crimson/30',
                                    default => 'bg-surface text-zinc-300 border border-border',
                                };
                                $statusLabel = match($submission->status) {
                                    'pending' => 'Menunggu Review',
                                    'approved' => 'Disetujui',
                                    'rejected' => 'Ditolak',
                                    default => $submission->status,
                                };
                                $editRoute = match($typeLabel) {
                                    'Event' => route('members.submissions.events.edit', $submission->submittable_id),
                                    'Project' => route('members.submissions.projects.edit', $submission->submittable_id),
                                    'Resource' => route('members.submissions.resources.edit', $submission->submittable_id),
                                    default => '#',
                                };
                                $deleteRoute = match($typeLabel) {
                                    'Event' => route('members.submissions.events.destroy', $submission->submittable_id),
                                    'Project' => route('members.submissions.projects.destroy', $submission->submittable_id),
                                    'Resource' => route('members.submissions.resources.destroy', $submission->submittable_id),
                                    default => '#',
                                };
                            @endphp
                            <tr class="hover:bg-surface/50 transition">
                                <td class="px-5 py-4 font-medium text-zinc-100">
                                    {{ $submission->submittable->title ?? '-' }}
                                    @if($submission->rejection_reason && $submission->status === 'rejected')
                                        <p class="text-[11px] text-accent-crimson mt-1 font-normal">Alasan: {{ Str::limit($submission->rejection_reason, 80) }}</p>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-zinc-400">{{ $typeLabel }}</td>
                                <td class="px-5 py-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium {{ $statusClass }}">{{ $statusLabel }}</span>
                                </td>
                                <td class="px-5 py-4 text-zinc-400 tabular-nums">{{ $submission->created_at->diffForHumans() }}</td>
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ $editRoute }}" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-zinc-200 bg-surface border border-border rounded-xl hover:bg-zinc-700">Edit</a>
                                        <form action="{{ $deleteRoute }}" method="POST" class="inline-flex m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus submission ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-spring inline-flex items-center px-3 py-1.5 text-xs font-medium text-accent-crimson bg-accent-crimson-tint border border-accent-crimson/30 rounded-xl hover:bg-accent-crimson-tint/80 cursor-pointer">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-zinc-500">
                                    Belum ada submission. Klik tombol di atas untuk submit event, project, atau resource baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Program Kerja & Kegiatan
            </h2>
            <div class="flex p-1 bg-surface-inset rounded-full w-fit">
                <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-100 bg-surface border border-border shadow-sm active" data-filter="all">Semua</button>
                <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="class">Kelas</button>
                <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="hackathon">Hackathon</button>
                <button class="event-tab pill-spring px-3.5 py-1 text-xs font-medium rounded-full text-zinc-400 hover:text-zinc-100" data-filter="sharing">Sharing</button>
            </div>
        </div>

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
                <div class="event-card card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 shadow-sm cursor-pointer" onclick="location.href='{{ route('members.events.show', $event) }}'" data-type="{{ match(strtolower($event->type ?? '')) { 'kelas', 'class' => 'class', 'hackathon' => 'hackathon', 'sharing' => 'sharing', default => strtolower($event->type ?? 'class') } }}">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div>
                            <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white transition-colors">{{ $event->title }}</h3>
                            <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $event->description }}</p>
                        </div>
                        <span class="shrink-0 px-2.5 py-0.5 rounded-full text-xs font-medium border transition-transform duration-200 group-hover:scale-105 {{ $statusClass }}">
                            {{ $event->status ?? 'Aktif' }}
                        </span>
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
                    Belum ada program kerja yang ditambahkan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Projects Section -->
    <section>
        <div class="flex items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Portofolio & Proyek Mahasiswa
            </h2>
            <a href="{{ route('members.projects.index') }}" class="btn-spring text-xs text-zinc-400 hover:text-white transition underline underline-offset-4">Lihat Semua Proyek</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($projects as $project)
                <div class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 shadow-sm cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.projects.show', $project) }}'">
                    <div>
                        @if($project->image_path)
                            <div class="overflow-hidden rounded-2xl border border-border mb-4">
                                <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full h-36 object-cover transition-transform duration-300 group-hover:scale-105" />
                            </div>
                        @else
                            <div class="w-full h-36 bg-surface rounded-2xl border border-border mb-4 flex items-center justify-center text-xs text-zinc-500 font-medium">
                                {{ $project->title }}
                            </div>
                        @endif
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-surface text-zinc-300 border border-border mb-2 transition-transform duration-200 group-hover:scale-105">
                            {{ $project->category ?? 'UKM Project' }}
                        </span>
                        <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white transition-colors">{{ $project->title }}</h3>
                        <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $project->description }}</p>

                        @if($project->technologies)
                            <div class="flex flex-wrap gap-1.5 mt-3">
                                @foreach(array_map('trim', explode(',', $project->technologies)) as $tech)
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-surface-inset text-zinc-400 border border-border transition-colors group-hover:border-zinc-700">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 pt-3 border-t border-border flex items-center justify-between text-xs text-zinc-500">
                        <span>oleh {{ $project->creator->name ?? 'UKM Member' }}</span>
                        <span class="tabular-nums">{{ $project->created_at ? $project->created_at->diffForHumans() : '' }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-card border border-border rounded-3xl p-8 text-center text-zinc-500 text-sm">
                    Belum ada proyek showcase yang ditambahkan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Resources Section -->
    <section>
        <div class="flex items-center justify-between gap-4 mb-5">
            <h2 class="text-xl font-semibold text-zinc-100 flex items-center gap-2">
                <svg class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                Repositori Pembelajaran & Artikel
            </h2>
            <a href="{{ route('members.resources.index') }}" class="btn-spring text-xs text-zinc-400 hover:text-white transition underline underline-offset-4">Browse Semua</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @forelse($resources as $resource)
                <div class="card-spring group bg-card border border-border hover:border-zinc-700 rounded-3xl p-6 cursor-pointer flex flex-col justify-between" onclick="location.href='{{ route('members.resources.show', $resource) }}'">
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-surface text-zinc-200 border border-border capitalize">{{ $resource->type ?? 'Modul' }}</span>
                            @if($resource->tags)
                                @php $firstTag = explode(',', $resource->tags)[0]; @endphp
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-surface-inset text-zinc-400 border border-border">{{ trim($firstTag) }}</span>
                            @endif
                        </div>
                        <h3 class="font-semibold text-sm text-zinc-100 group-hover:text-white">{{ $resource->title }}</h3>
                        <p class="text-xs text-zinc-400 line-clamp-2 mt-1">{{ $resource->description }}</p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-border flex items-center justify-between text-[11px] text-zinc-500">
                        <span class="tabular-nums">{{ $resource->created_at ? $resource->created_at->diffForHumans() : '' }}</span>
                        <span class="tabular-nums">{{ number_format($resource->views_count ?? 0) }} views</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-card border border-border rounded-3xl p-8 text-center text-zinc-500 text-sm">
                    Belum ada repositori pembelajaran.
                </div>
            @endforelse
        </div>
    </section>

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
                    if (filter === 'all' || type === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
