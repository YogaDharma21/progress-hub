@extends('layouts.admin')


@section('content')
<div class="space-y-6">
    <div class="flex items-end justify-between">
        <div>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Review Submissions</h1>
            <p class="mt-1 text-sm text-zinc-400">Kelola dan review submission dari member.</p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex items-center gap-1 p-1 bg-zinc-900 border border-zinc-800 rounded-xl w-fit">
        <button type="button" onclick="filterSubmissions('all')" class="filter-tab active px-4 py-2 text-xs font-semibold rounded-lg bg-zinc-800 text-zinc-100 transition shadow-sm cursor-pointer" data-filter="all">Semua</button>
        <button type="button" onclick="filterSubmissions('pending')" class="filter-tab px-4 py-2 text-xs font-medium text-zinc-400 hover:text-zinc-200 rounded-lg transition cursor-pointer" data-filter="pending">Pending</button>
        <button type="button" onclick="filterSubmissions('approved')" class="filter-tab px-4 py-2 text-xs font-medium text-zinc-400 hover:text-zinc-200 rounded-lg transition cursor-pointer" data-filter="approved">Approved</button>
        <button type="button" onclick="filterSubmissions('rejected')" class="filter-tab px-4 py-2 text-xs font-medium text-zinc-400 hover:text-zinc-200 rounded-lg transition cursor-pointer" data-filter="rejected">Rejected</button>
    </div>

    <!-- Submissions Table -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl shadow-sm overflow-hidden">
        @if($submissions->isEmpty())
            <div class="px-6 py-16 text-center">
                <svg class="w-12 h-12 mx-auto text-zinc-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <p class="text-sm text-zinc-400">Belum ada submission.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-zinc-800">
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Pengirim</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3.5 text-[11px] font-semibold text-zinc-400 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800">
                        @foreach($submissions as $submission)
                            <tr class="submission-row hover:bg-zinc-800/50 transition" data-status="{{ $submission->status }}">
                                <td class="px-6 py-4">
                                    <span class="text-sm text-zinc-100 font-medium">{{ $submission->user->name }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-zinc-800 text-zinc-200">
                                        {{ $submission->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-zinc-200">{{ $submission->submittable->title }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($submission->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                            Pending
                                        </span>
                                    @elseif($submission->status === 'approved')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                            Approved
                                        </span>
                                    @elseif($submission->status === 'rejected')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                            Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs text-zinc-500">{{ $submission->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.submissions.show', $submission) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-lg transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Review
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
function filterSubmissions(status) {
    const tabs = document.querySelectorAll('.filter-tab');
    tabs.forEach(tab => {
        if (tab.dataset.filter === status) {
            tab.className = 'filter-tab active px-4 py-2 text-xs font-semibold rounded-lg bg-zinc-800 text-zinc-100 transition shadow-sm cursor-pointer';
        } else {
            tab.className = 'filter-tab px-4 py-2 text-xs font-medium text-zinc-400 hover:text-zinc-200 rounded-lg transition cursor-pointer';
        }
    });

    const rows = document.querySelectorAll('.submission-row');
    rows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
@endsection
