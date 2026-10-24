@extends('layouts.app')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <form action="{{ route('members.submissions.resources.update', $resource) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-border pb-6">
            <div>
                <a href="{{ route('members.dashboard') }}" class="btn-spring inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Dashboard
                </a>
                <h1 class="text-2xl font-semibold text-zinc-100 tracking-tight">Edit Resource</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('members.dashboard') }}" class="btn-spring px-4 py-2 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="btn-spring px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>

        @if ($errors->any())
            <div class="p-4 rounded-2xl bg-accent-crimson-tint border border-accent-crimson/30 text-xs text-accent-crimson space-y-1">
                <p class="font-semibold">Mohon perbaiki kesalahan berikut:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-card border border-border rounded-3xl p-6 sm:p-8 shadow-card">
            <div class="flex items-center gap-3 pb-5 border-b border-border">
                <div class="w-9 h-9 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Informasi Utama Resource</h2>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1.5">
                    <label for="title" class="block text-xs font-medium text-zinc-300">Judul Resource <span class="text-accent-crimson">*</span></label>
                    <input id="title" name="title" type="text" value="{{ old('title', $resource->title) }}" required placeholder="Judul Resource"
                        class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="description" class="block text-xs font-medium text-zinc-300">Deskripsi / Ringkasan</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition leading-relaxed">{{ old('description', $resource->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="type" class="block text-xs font-medium text-zinc-300">Tipe Resource</label>
                        <select id="type" name="type" class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 focus:outline-none focus:border-zinc-500 transition cursor-pointer">
                            <option value="Modul" {{ old('type', $resource->type) == 'Modul' ? 'selected' : '' }}>Modul</option>
                            <option value="Artikel" {{ old('type', $resource->type) == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                            <option value="Tutorial" {{ old('type', $resource->type) == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                            <option value="Tools" {{ old('type', $resource->type) == 'Tools' ? 'selected' : '' }}>Tools</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="tags" class="block text-xs font-medium text-zinc-300">Tags (pisahkan dengan koma)</label>
                        <input id="tags" name="tags" type="text" value="{{ old('tags', $resource->tags) }}" placeholder="React, Tutorial"
                            class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-card border border-border rounded-3xl p-6 sm:p-8 shadow-card">
            <div class="flex items-center gap-3 pb-5 border-b border-border">
                <div class="w-9 h-9 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Cover & Sumber Resource</h2>
                </div>
            </div>

            @php
                $isUrlSource = filter_var($resource->file_path, FILTER_VALIDATE_URL);
                $initialSourceType = $isUrlSource ? 'video' : 'file';
            @endphp

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1.5">
                    <label for="cover" class="block text-xs font-medium text-zinc-300">Gambar Cover <span class="text-zinc-500 font-normal">(Opsional)</span></label>
                    <div class="flex items-center gap-4 p-4 bg-surface border border-border rounded-2xl">
                        @if($resource->cover_image)
                            <img id="cover-preview" src="{{ Storage::url($resource->cover_image) }}" alt="{{ $resource->title }}" class="w-20 h-16 rounded-xl object-cover border border-border shadow-inner" />
                        @else
                            <div id="cover-fallback" class="w-20 h-16 bg-surface-inset rounded-xl border border-border flex items-center justify-center text-xs text-zinc-500 font-medium shrink-0 shadow-inner">
                                Cover
                            </div>
                            <img id="cover-preview" src="#" alt="Preview" class="hidden w-20 h-16 rounded-xl object-cover border border-border shadow-inner" />
                        @endif
                        <div class="flex-1 space-y-1">
                            <p id="cover-filename" class="text-xs font-medium text-zinc-200">{{ $resource->cover_image ? basename($resource->cover_image) : 'Belum ada cover' }}</p>
                            <label for="cover" class="btn-spring inline-block mt-1 px-3.5 py-1.5 text-xs font-medium text-zinc-200 bg-surface-inset hover:bg-zinc-700 border border-border rounded-xl cursor-pointer transition">
                                {{ $resource->cover_image ? 'Ganti Gambar Cover' : 'Upload Cover' }}
                            </label>
                            <input id="cover" name="cover" type="file" class="hidden" accept="image/*" />
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <input type="hidden" id="source_type" name="source_type" value="{{ $initialSourceType }}" />
                    <label class="block text-xs font-medium text-zinc-300">Pilih Tipe Sumber Resource</label>
                    <div class="grid grid-cols-2 gap-1 p-1 bg-surface-inset rounded-full">
                        <button type="button" id="btn-source-file" onclick="switchSourceType('file')"
                            class="pill-spring py-2 px-3 text-xs font-medium text-center rounded-full {{ $initialSourceType == 'file' ? 'bg-surface text-zinc-100 border border-border shadow-sm' : 'text-zinc-400 hover:text-zinc-200' }} inline-flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4 text-accent-emerald shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Upload File
                        </button>
                        <button type="button" id="btn-source-video" onclick="switchSourceType('video')"
                            class="pill-spring py-2 px-3 text-xs font-medium text-center rounded-full {{ $initialSourceType == 'video' ? 'bg-surface text-zinc-100 border border-border shadow-sm' : 'text-zinc-400 hover:text-zinc-200' }} inline-flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4 text-accent-crimson shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Link Video
                        </button>
                    </div>

                    <div id="source-file-container" class="space-y-1.5 pt-1 {{ $initialSourceType == 'file' ? '' : 'hidden' }}\">
                        @if($resource->file_path && !$isUrlSource)
                            <div class="flex items-center justify-between p-3 bg-surface border border-border rounded-xl text-xs mb-2">
                                <span class="text-zinc-200 truncate">{{ basename($resource->file_path) }}</span>
                                <span class="text-zinc-400">File Aktif</span>
                            </div>
                        @endif
                        <label for="file" class="block text-xs font-medium text-zinc-300">Ganti File Modul <span class="text-zinc-500 font-normal">(Opsional)</span></label>
                        <input id="file" name="file" type="file" accept=".pdf,.doc,.docx,.epub,.zip"
                            class="block w-full text-xs text-zinc-300 bg-zinc-950 border border-border rounded-xl cursor-pointer focus:outline-none focus:border-zinc-500 transition file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-surface file:text-zinc-200 hover:file:bg-zinc-700 p-2.5" />
                    </div>

                    <div id="source-video-container" class="space-y-1.5 pt-1 {{ $initialSourceType == 'video' ? '' : 'hidden' }}\">
                        <label for="video_url" class="block text-xs font-medium text-zinc-300">Link Video Pembelajaran</label>
                        <input id="video_url" name="video_url" type="url" value="{{ old('video_url', $isUrlSource ? $resource->file_path : '') }}" placeholder="https://www.youtube.com/watch?v=..."
                            class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-card border border-border rounded-3xl p-6 sm:p-8 shadow-card">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-border">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-zinc-100">Bab dalam Modul / Resource</h2>
                    </div>
                </div>

                <button type="button" id="add-chapter-btn" class="btn-spring inline-flex items-center gap-2 px-3.5 py-1.5 text-xs font-semibold text-zinc-200 bg-surface hover:bg-zinc-700 border border-border rounded-xl transition shadow-sm self-start sm:self-auto cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Bab
                </button>
            </div>

            <div id="chapters-container" class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                @forelse ($resource->chapters as $index => $chapter)
                    <div class="chapter-item bg-surface border border-border rounded-2xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                        <div class="flex items-center justify-between pb-1">
                            <span class="chapter-label inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-surface-inset text-zinc-300 border border-border">
                                Bab {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <button type="button" onclick="this.closest('.chapter-item').remove(); updateChapterLabels();" class="p-1.5 text-zinc-400 hover:text-accent-crimson hover:bg-accent-crimson-tint rounded-lg transition" title="Hapus Bab">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                                <input type="text" name="chapters[{{ $index }}][title]" value="{{ $chapter->title }}" placeholder="Judul Bab"
                                    class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition font-medium" />
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                                <textarea name="chapters[{{ $index }}][description]" rows="3" placeholder="Penjelasan bab ini..."
                                    class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition leading-relaxed">{{ $chapter->description }}</textarea>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="chapter-item bg-surface border border-border rounded-2xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                        <div class="flex items-center justify-between pb-1">
                            <span class="chapter-label inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-surface-inset text-zinc-300 border border-border">
                                Bab 01
                            </span>
                            <button type="button" onclick="this.closest('.chapter-item').remove(); updateChapterLabels();" class="p-1.5 text-zinc-400 hover:text-accent-crimson hover:bg-accent-crimson-tint rounded-lg transition" title="Hapus Bab">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        <div class="space-y-3">
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                                <input type="text" name="chapters[0][title]" placeholder="Contoh: Bab 1: Pengenalan React"
                                    class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition font-medium" />
                            </div>
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                                <textarea name="chapters[0][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
                                    class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition leading-relaxed"></textarea>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="pt-4 flex items-center justify-between">
            <span class="text-xs text-zinc-400">Periksa kembali detail sebelum menyimpan perubahan.</span>
            <div class="flex items-center gap-3">
                <a href="{{ route('members.dashboard') }}" class="btn-spring px-4 py-2 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="btn-spring px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function switchSourceType(type) {
    const sourceTypeInput = document.getElementById('source_type');
    const fileContainer = document.getElementById('source-file-container');
    const videoContainer = document.getElementById('source-video-container');
    const btnFile = document.getElementById('btn-source-file');
    const btnVideo = document.getElementById('btn-source-video');

    if (sourceTypeInput) sourceTypeInput.value = type;

    if (type === 'file') {
        fileContainer.classList.remove('hidden');
        videoContainer.classList.add('hidden');
        btnFile.className = 'pill-spring py-2 px-3 text-xs font-medium text-center rounded-full bg-surface text-zinc-100 border border-border shadow-sm inline-flex items-center justify-center gap-2 cursor-pointer';
        btnVideo.className = 'pill-spring py-2 px-3 text-xs font-medium text-center rounded-full text-zinc-400 hover:text-zinc-200 inline-flex items-center justify-center gap-2 cursor-pointer';
    } else {
        videoContainer.classList.remove('hidden');
        fileContainer.classList.add('hidden');
        btnVideo.className = 'pill-spring py-2 px-3 text-xs font-medium text-center rounded-full bg-surface text-zinc-100 border border-border shadow-sm inline-flex items-center justify-center gap-2 cursor-pointer';
        btnFile.className = 'pill-spring py-2 px-3 text-xs font-medium text-center rounded-full text-zinc-400 hover:text-zinc-200 inline-flex items-center justify-center gap-2 cursor-pointer';
    }
}

function updateChapterLabels() {
    const container = document.getElementById('chapters-container');
    if (!container) return;
    const items = container.querySelectorAll('.chapter-item');
    items.forEach((item, index) => {
        const padCount = String(index + 1).padStart(2, '0');
        const label = item.querySelector('.chapter-label');
        if (label) label.textContent = `Bab ${padCount}`;
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const coverInput = document.getElementById('cover');
    const coverPreviewContainer = document.getElementById('cover-preview-container');
    const coverPreview = document.getElementById('cover-preview');
    const coverFallback = document.getElementById('cover-fallback');
    const coverFilename = document.getElementById('cover-filename');

    if (coverInput && coverPreview) {
        coverInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    coverPreview.src = e.target.result;
                    coverPreview.classList.remove('hidden');
                    if (coverFallback) coverFallback.classList.add('hidden');
                    if (coverFilename) coverFilename.textContent = file.name;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    const container = document.getElementById('chapters-container');
    const addBtn = document.getElementById('add-chapter-btn');
    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            const index = Date.now();
            const newItem = document.createElement('div');
            newItem.className = 'chapter-item bg-surface border border-border rounded-2xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm';
            newItem.innerHTML = `
                <div class="flex items-center justify-between pb-1">
                    <span class="chapter-label inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-surface-inset text-zinc-300 border border-border">
                        Bab 01
                    </span>
                    <button type="button" onclick="this.closest('.chapter-item').remove(); updateChapterLabels();" class="p-1.5 text-zinc-400 hover:text-accent-crimson hover:bg-accent-crimson-tint rounded-lg transition" title="Hapus Bab">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
                <div class="space-y-3">
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                        <input type="text" name="chapters[${index}][title]" placeholder="Contoh: Bab Baru"
                            class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition font-medium" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                        <textarea name="chapters[${index}][description]" rows="3" placeholder="Penjelasan bab ini..."
                            class="w-full bg-surface-inset border border-border rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition leading-relaxed"></textarea>
                    </div>
                </div>
            `;
            container.appendChild(newItem);
            updateChapterLabels();
        });
    }
});
</script>
@endsection
