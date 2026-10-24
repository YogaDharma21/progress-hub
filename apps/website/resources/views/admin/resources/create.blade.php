@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <form action="{{ route('admin.resources.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Header & Navigation -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-border pb-6">
            <div>
                <a href="{{ route('admin.resources.index') }}" class="btn-spring inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Admin Resources
                </a>
                <h1 class="text-2xl font-semibold text-zinc-100 tracking-tight">Buat Resource Baru</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.resources.index') }}" class="btn-spring px-4 py-2 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="btn-spring px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Resource
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
                    <input id="title" name="title" type="text" value="{{ old('title') }}" required placeholder="Contoh: Modul Dasar React untuk Pemula"
                        class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="description" class="block text-xs font-medium text-zinc-300">Deskripsi / Ringkasan</label>
                    <textarea id="description" name="description" rows="4" placeholder="Rangkuman singkat isi modul atau materi..."
                        class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition leading-relaxed">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="type" class="block text-xs font-medium text-zinc-300">Tipe Resource</label>
                        <select id="type" name="type" class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 focus:outline-none focus:border-zinc-500 transition cursor-pointer">
                            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Pilih tipe</option>
                            <option value="Modul" {{ old('type') == 'Modul' ? 'selected' : '' }}>Modul</option>
                            <option value="Artikel" {{ old('type') == 'Artikel' ? 'selected' : '' }}>Artikel</option>
                            <option value="Tutorial" {{ old('type') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                            <option value="Tools" {{ old('type') == 'Tools' ? 'selected' : '' }}>Tools</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="tags" class="block text-xs font-medium text-zinc-300">Tags (pisahkan dengan koma)</label>
                        <input id="tags" name="tags" type="text" value="{{ old('tags') }}" placeholder="React, Frontend, Web"
                            class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Cover & Sumber Resource -->
        <div class="bg-card border border-border rounded-3xl p-6 sm:p-8 shadow-card">
            <div class="flex items-center gap-3 pb-5 border-b border-border">
                <div class="w-9 h-9 rounded-2xl bg-surface border border-border flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Cover & Sumber Resource</h2>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cover Image Optional -->
                <div class="space-y-1.5">
                    <label for="cover" class="block text-xs font-medium text-zinc-300">Gambar Cover <span class="text-zinc-500 font-normal">(Opsional)</span></label>
                    <label for="cover" class="relative flex flex-col items-center justify-center w-full h-36 border-2 border-dashed border-border hover:border-zinc-700 bg-surface rounded-2xl cursor-pointer transition overflow-hidden group">
                        <div id="cover-placeholder" class="flex flex-col items-center justify-center p-4 text-center">
                            <svg width="32" height="32" class="w-8 h-8 max-w-[32px] max-h-[32px] mb-2 text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="text-xs text-zinc-300"><span class="font-semibold text-zinc-100">Upload Thumbnail Cover</span></p>
                            <p class="text-[11px] text-zinc-500 mt-0.5">PNG, JPG, WebP (maks 3MB)</p>
                        </div>
                        <div id="cover-preview-container" class="hidden absolute inset-0 w-full h-full">
                            <img id="cover-preview" src="#" alt="Preview Cover" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-xs font-semibold text-white">
                                Klik untuk ganti cover
                            </div>
                        </div>
                        <input id="cover" name="cover" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>

                <!-- Source Switcher -->
                <div class="space-y-3">
                    <input type="hidden" id="source_type" name="source_type" value="file" />
                    <label class="block text-xs font-medium text-zinc-300">Pilih Tipe Sumber Resource</label>
                    <div class="grid grid-cols-2 gap-1 p-1 bg-surface-inset rounded-full">
                        <button type="button" id="btn-source-file" onclick="switchSourceType('file')"
                            class="pill-spring py-2 px-3 text-xs font-medium text-center rounded-full bg-surface text-zinc-100 border border-border shadow-sm inline-flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4 text-accent-emerald shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Upload File
                        </button>
                        <button type="button" id="btn-source-video" onclick="switchSourceType('video')"
                            class="pill-spring py-2 px-3 text-xs font-medium text-center rounded-full text-zinc-400 hover:text-zinc-200 inline-flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4 text-accent-crimson shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Link Video
                        </button>
                    </div>

                    <!-- Input File -->
                    <div id="source-file-container" class="space-y-1.5 pt-1">
                        <label for="file" class="block text-xs font-medium text-zinc-300">File Modul / Dokumen <span class="text-zinc-500 font-normal">(PDF, EPUB, DOCX, ZIP)</span></label>
                        <input id="file" name="file" type="file" accept=".pdf,.doc,.docx,.epub,.zip"
                            class="block w-full text-xs text-zinc-300 bg-zinc-950 border border-border rounded-xl cursor-pointer focus:outline-none focus:border-zinc-500 transition file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-surface file:text-zinc-200 hover:file:bg-zinc-700 p-2.5" />
                    </div>

                    <!-- Input Video Link -->
                    <div id="source-video-container" class="space-y-1.5 pt-1 hidden">
                        <label for="video_url" class="block text-xs font-medium text-zinc-300">Link Video Pembelajaran (YouTube / Embed)</label>
                        <input id="video_url" name="video_url" type="url" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=..."
                            class="w-full bg-zinc-950 border border-border rounded-xl px-4 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Bab / Sub-materi Resource -->
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
            </div>
        </div>

        <!-- Action Footer -->
        <div class="pt-4 flex items-center justify-between">
            <span class="text-xs text-zinc-400">Periksa kembali detail sebelum menyimpan resource.</span>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.resources.index') }}" class="btn-spring px-4 py-2 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="btn-spring px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Resource
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
    const coverPlaceholder = document.getElementById('cover-placeholder');

    if (coverInput && coverPreview) {
        coverInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    coverPreview.src = e.target.result;
                    if (coverPreviewContainer) coverPreviewContainer.classList.remove('hidden');
                    if (coverPlaceholder) coverPlaceholder.classList.add('hidden');
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
                        <textarea name="chapters[${index}][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
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
