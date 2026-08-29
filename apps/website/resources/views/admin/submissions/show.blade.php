@extends('layouts.admin')


@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="flex items-center justify-between border-b border-zinc-800 pb-6">
        <div>
            <a href="{{ route('admin.submissions.index') }}" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Submissions
            </a>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Detail Submission</h1>
            <p class="mt-1 text-xs text-zinc-400">Review dan putuskan submission ini.</p>
        </div>
        <div class="flex items-center gap-2">
            @if($submission->status === 'pending')
                <form action="{{ route('admin.submissions.approve', $submission) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Setujui
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Submitter Info -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
            <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h2 class="text-base font-semibold text-zinc-100">Informasi Pengirim</h2>
                <p class="text-xs text-zinc-400 mt-0.5">Data member yang mengirim submission</p>
            </div>
        </div>
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="space-y-1">
                <span class="block text-[11px] font-medium text-zinc-400">Nama</span>
                <span class="block text-sm text-zinc-100 font-medium">{{ $submission->user->name }}</span>
            </div>
            <div class="space-y-1">
                <span class="block text-[11px] font-medium text-zinc-400">Email</span>
                <span class="block text-sm text-zinc-100">{{ $submission->user->email }}</span>
            </div>
            <div class="space-y-1">
                <span class="block text-[11px] font-medium text-zinc-400">Tanggal Submission</span>
                <span class="block text-sm text-zinc-100">{{ $submission->created_at->format('d M Y, H:i') }}</span>
            </div>
        </div>
    </div>

    <!-- Submission Status -->
    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Status Submission</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">Tipe: <span class="text-zinc-200 font-medium">{{ $submission->type }}</span></p>
                </div>
            </div>
            <div>
                @if($submission->status === 'pending')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                        Pending
                    </span>
                @elseif($submission->status === 'approved')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Approved
                    </span>
                @elseif($submission->status === 'rejected')
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                        Rejected
                    </span>
                @endif
            </div>
        </div>

        @if($submission->status === 'rejected' && $submission->rejection_reason)
            <div class="mt-4 p-4 rounded-xl bg-rose-950/40 border border-rose-800/50">
                <p class="text-xs font-semibold text-rose-300 mb-1">Alasan Penolakan:</p>
                <p class="text-sm text-rose-200">{{ $submission->rejection_reason }}</p>
            </div>
        @endif
    </div>

    <!-- Content Detail -->
    @if($submission->type === 'Event')
        @php $event = $submission->submittable; @endphp
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Detail Event</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">{{ $event->title }}</p>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Judul</span>
                    <span class="block text-sm text-zinc-100 font-medium">{{ $event->title }}</span>
                </div>
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Deskripsi</span>
                    <p class="text-sm text-zinc-200 leading-relaxed">{{ $event->description }}</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Status</span>
                        <span class="block text-sm text-zinc-100">{{ $event->status }}</span>
                    </div>
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Tipe</span>
                        <span class="block text-sm text-zinc-100">{{ $event->type }}</span>
                    </div>
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Jumlah Sesi</span>
                        <span class="block text-sm text-zinc-100">{{ $event->sessions_count }}</span>
                    </div>
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Target Peserta</span>
                        <span class="block text-sm text-zinc-100">{{ $event->target_capacity }}</span>
                    </div>
                </div>

                @if($event->topics->isNotEmpty())
                    <div class="pt-4 border-t border-zinc-800">
                        <span class="block text-[11px] font-medium text-zinc-400 mb-3">Daftar Topik</span>
                        <div class="space-y-3">
                            @foreach($event->topics as $i => $topic)
                                <div class="bg-zinc-950 border border-zinc-800 rounded-xl p-4">
                                    <p class="text-xs font-semibold text-zinc-200 mb-1">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}. {{ $topic->title }}</p>
                                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $topic->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @elseif($submission->type === 'Project')
        @php $project = $submission->submittable; @endphp
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Detail Project</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">{{ $project->title }}</p>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Judul</span>
                    <span class="block text-sm text-zinc-100 font-medium">{{ $project->title }}</span>
                </div>
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Deskripsi</span>
                    <p class="text-sm text-zinc-200 leading-relaxed">{{ $project->description }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Kategori</span>
                        <span class="block text-sm text-zinc-100">{{ $project->category }}</span>
                    </div>
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Teknologi</span>
                        <span class="block text-sm text-zinc-100">{{ $project->technologies }}</span>
                    </div>
                </div>

                @if($project->image_path)
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Gambar Showcase</span>
                        <img src="{{ Storage::url($project->image_path) }}" alt="{{ $project->title }}" class="w-full max-w-md h-48 rounded-xl object-cover border border-zinc-800 shadow-inner" />
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @if($project->demo_url)
                        <div class="space-y-1">
                            <span class="block text-[11px] font-medium text-zinc-400">Live Demo</span>
                            <a href="{{ $project->demo_url }}" target="_blank" class="block text-sm text-emerald-400 hover:text-emerald-300 transition truncate">{{ $project->demo_url }}</a>
                        </div>
                    @endif
                    @if($project->repository_url)
                        <div class="space-y-1">
                            <span class="block text-[11px] font-medium text-zinc-400">Repository</span>
                            <a href="{{ $project->repository_url }}" target="_blank" class="block text-sm text-emerald-400 hover:text-emerald-300 transition truncate">{{ $project->repository_url }}</a>
                        </div>
                    @endif
                    @if($project->documentation_url)
                        <div class="space-y-1">
                            <span class="block text-[11px] font-medium text-zinc-400">Dokumentasi</span>
                            <a href="{{ $project->documentation_url }}" target="_blank" class="block text-sm text-emerald-400 hover:text-emerald-300 transition truncate">{{ $project->documentation_url }}</a>
                        </div>
                    @endif
                </div>

                @if($project->features->isNotEmpty())
                    <div class="pt-4 border-t border-zinc-800">
                        <span class="block text-[11px] font-medium text-zinc-400 mb-3">Daftar Fitur</span>
                        <div class="space-y-3">
                            @foreach($project->features as $i => $feature)
                                <div class="bg-zinc-950 border border-zinc-800 rounded-xl p-4">
                                    <p class="text-xs font-semibold text-zinc-200 mb-1">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}. {{ $feature->title }}</p>
                                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $feature->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @elseif($submission->type === 'Resource')
        @php $resource = $submission->submittable; @endphp
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Detail Resource</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">{{ $resource->title }}</p>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Judul</span>
                    <span class="block text-sm text-zinc-100 font-medium">{{ $resource->title }}</span>
                </div>
                <div class="space-y-1">
                    <span class="block text-[11px] font-medium text-zinc-400">Deskripsi</span>
                    <p class="text-sm text-zinc-200 leading-relaxed">{{ $resource->description }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Tipe</span>
                        <span class="block text-sm text-zinc-100">{{ $resource->type }}</span>
                    </div>
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">Tags</span>
                        <span class="block text-sm text-zinc-100">{{ $resource->tags }}</span>
                    </div>
                </div>

                @if($resource->file_path)
                    <div class="space-y-1">
                        <span class="block text-[11px] font-medium text-zinc-400">File / Sumber</span>
                        @if(filter_var($resource->file_path, FILTER_VALIDATE_URL))
                            <a href="{{ $resource->file_path }}" target="_blank" class="block text-sm text-emerald-400 hover:text-emerald-300 transition">{{ $resource->file_path }}</a>
                        @else
                            <div class="flex items-center gap-2 text-sm text-zinc-200">
                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>{{ basename($resource->file_path) }}</span>
                            </div>
                        @endif
                    </div>
                @endif

                @if($resource->chapters->isNotEmpty())
                    <div class="pt-4 border-t border-zinc-800">
                        <span class="block text-[11px] font-medium text-zinc-400 mb-3">Daftar Bab</span>
                        <div class="space-y-3">
                            @foreach($resource->chapters as $i => $chapter)
                                <div class="bg-zinc-950 border border-zinc-800 rounded-xl p-4">
                                    <p class="text-xs font-semibold text-zinc-200 mb-1">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}. {{ $chapter->title }}</p>
                                    <p class="text-xs text-zinc-400 leading-relaxed">{{ $chapter->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Reject Form -->
    @if($submission->status === 'pending')
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <form action="{{ route('admin.submissions.reject', $submission) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                    <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-zinc-100">Tolak Submission</h2>
                        <p class="text-xs text-zinc-400 mt-0.5">Berikan alasan penolakan untuk member</p>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="rejection_reason" class="block text-xs font-medium text-zinc-300">Alasan Penolakan <span class="text-rose-400">*</span></label>
                    <textarea id="rejection_reason" name="rejection_reason" rows="4" required placeholder="Jelaskan alasan penolakan submission ini..."
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition leading-relaxed"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-semibold text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-xl transition shadow-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Tolak Submission
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection
