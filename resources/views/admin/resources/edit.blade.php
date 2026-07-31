@extends('layouts.admin')

@section('title', 'Progress Hub — Edit Resource')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <!-- Header & Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-800 pb-6">
        <div>
            <a href="/admin/resources" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Admin Resources
            </a>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Edit Resource</h1>
            <p class="mt-1 text-xs text-zinc-400">Perbarui detail modul, artikel, atau tutorial.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/admin/resources" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
            <button type="button" onclick="location.href='/admin/resources'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm hover:-translate-y-0.5 inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </div>

    <form class="space-y-6" onsubmit="return false;">
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Informasi Utama Resource</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">Judul, ringkasan materi, tipe, dan kata kunci tag</p>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1.5">
                    <label for="resource-title" class="block text-xs font-medium text-zinc-300">Judul Resource</label>
                    <input id="resource-title" type="text" value="Modul Dasar React untuk Pemula"
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="resource-desc" class="block text-xs font-medium text-zinc-300">Deskripsi / Ringkasan</label>
                    <textarea id="resource-desc" rows="4"
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition leading-relaxed">Panduan langkah demi langkah memahami komponen, props, state, dan lifecycle React</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="resource-type" class="block text-xs font-medium text-zinc-300">Tipe Resource</label>
                        <select id="resource-type" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition cursor-pointer">
                            <option selected>Modul</option>
                            <option>Artikel</option>
                            <option>Tutorial</option>
                            <option>Tools</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="resource-tags" class="block text-xs font-medium text-zinc-300">Tags (pisahkan dengan koma)</label>
                        <input id="resource-tags" type="text" value="React, Tutorial"
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Cover & Sumber Resource -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Cover & Sumber Resource</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">Gambar opsional dan file dokumen atau tautan video</p>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cover Image Optional Preview -->
                <div class="space-y-1.5">
                    <label for="resource-image" class="block text-xs font-medium text-zinc-300">Gambar Cover <span class="text-zinc-500 font-normal">(Opsional)</span></label>
                    <div class="flex items-center gap-4 p-4 bg-zinc-950 border border-zinc-800 rounded-xl">
                        <div class="w-20 h-16 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-700 flex items-center justify-center text-xs text-zinc-400 font-medium shrink-0 shadow-inner">
                            Cover
                        </div>
                        <div class="flex-1 space-y-1">
                            <p class="text-xs font-medium text-zinc-200">modul-react-cover.png</p>
                            <label for="resource-image" class="inline-block mt-1 px-3.5 py-1.5 text-xs font-medium text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-lg cursor-pointer transition">
                                Ganti Gambar Cover
                            </label>
                            <input id="resource-image" type="file" class="hidden" accept="image/*" />
                        </div>
                    </div>
                </div>

                <!-- Source Switcher -->
                <div class="space-y-3">
                    <label class="block text-xs font-medium text-zinc-300">Pilih Tipe Sumber Resource</label>
                    <div class="grid grid-cols-2 gap-2 p-1.5 bg-zinc-950 border border-zinc-800 rounded-xl">
                        <button type="button" id="btn-source-file" onclick="switchSourceType('file')"
                            class="py-2.5 px-3 text-xs font-semibold text-center rounded-lg bg-zinc-800 text-zinc-100 transition shadow-sm inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Upload File
                        </button>
                        <button type="button" id="btn-source-video" onclick="switchSourceType('video')"
                            class="py-2.5 px-3 text-xs font-medium text-center rounded-lg text-zinc-400 hover:text-zinc-200 transition inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Link Video
                        </button>
                    </div>

                    <!-- Existing Uploaded File Display -->
                    <div id="source-file-container" class="space-y-1.5 pt-1">
                        <div class="flex items-center justify-between p-3.5 bg-zinc-950 border border-zinc-800 rounded-xl">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-zinc-200 font-medium">modul-react-dasar.pdf</p>
                                    <p class="text-[10px] text-zinc-500">2.4 MB • PDF Document</p>
                                </div>
                            </div>
                            <label for="resource-file" class="px-3 py-1.5 text-xs font-medium text-zinc-300 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-lg cursor-pointer transition">
                                Ganti File
                            </label>
                        </div>
                        <input id="resource-file" type="file" accept=".pdf,.doc,.docx,.epub,.zip" class="hidden" />
                    </div>

                    <!-- Input Video Link -->
                    <div id="source-video-container" class="space-y-1.5 pt-1 hidden">
                        <label for="resource-video" class="block text-[11px] font-medium text-zinc-400">Link Video Pembelajaran (YouTube / Embed)</label>
                        <input id="resource-video" type="url" placeholder="https://www.youtube.com/watch?v=..."
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Bab / Sub-materi Resource -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-zinc-100">Bab dalam Modul / Resource</h2>
                        <p class="text-xs text-zinc-400 mt-0.5">Kelola silabus dan bab pembahasan materi</p>
                    </div>
                </div>

                <button type="button" id="add-chapter-btn" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-xl transition shadow-sm self-start sm:self-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Bab
                </button>
            </div>

            <div id="chapters-container" class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="chapter-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                    <div class="flex items-center justify-between pb-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                            Bab 01
                        </span>
                        <button type="button" onclick="this.closest('.chapter-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Bab">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                            <input type="text" name="chapters[0][title]" value="Bab 1: Pengenalan React" placeholder="Judul Bab"
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                            <textarea name="chapters[0][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition leading-relaxed">Apa itu React, why React, dan setup lingkungan development</textarea>
                        </div>
                    </div>
                </div>

                <div class="chapter-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                    <div class="flex items-center justify-between pb-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                            Bab 02
                        </span>
                        <button type="button" onclick="this.closest('.chapter-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Bab">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                            <input type="text" name="chapters[1][title]" value="Bab 2: Komponen & Props" placeholder="Judul Bab"
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                            <textarea name="chapters[1][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition leading-relaxed">Struktur komponen, props, dan data flow dalam React</textarea>
                        </div>
                    </div>
                </div>

                <div class="chapter-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                    <div class="flex items-center justify-between pb-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                            Bab 03
                        </span>
                        <button type="button" onclick="this.closest('.chapter-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Bab">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                            <input type="text" name="chapters[2][title]" value="Bab 3: State & Hooks" placeholder="Judul Bab"
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                            <textarea name="chapters[2][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition leading-relaxed">useState, useEffect, dan manajemen state yang efektif</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Footer -->
        <div class="pt-4 flex items-center justify-between">
            <span class="text-xs text-zinc-400">Periksa kembali detail sebelum menyimpan perubahan.</span>
            <div class="flex items-center gap-3">
                <a href="/admin/resources" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="button" onclick="location.href='/admin/resources'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition hover:-translate-y-0.5 shadow-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function switchSourceType(type) {
    const fileContainer = document.getElementById('source-file-container');
    const videoContainer = document.getElementById('source-video-container');
    const btnFile = document.getElementById('btn-source-file');
    const btnVideo = document.getElementById('btn-source-video');

    if (type === 'file') {
        fileContainer.classList.remove('hidden');
        videoContainer.classList.add('hidden');
        btnFile.className = 'py-2.5 px-3 text-xs font-semibold text-center rounded-lg bg-zinc-800 text-zinc-100 transition shadow-sm inline-flex items-center justify-center gap-2';
        btnVideo.className = 'py-2.5 px-3 text-xs font-medium text-center rounded-lg text-zinc-400 hover:text-zinc-200 transition inline-flex items-center justify-center gap-2';
    } else {
        videoContainer.classList.remove('hidden');
        fileContainer.classList.add('hidden');
        btnVideo.className = 'py-2.5 px-3 text-xs font-semibold text-center rounded-lg bg-zinc-800 text-zinc-100 transition shadow-sm inline-flex items-center justify-center gap-2';
        btnFile.className = 'py-2.5 px-3 text-xs font-medium text-center rounded-lg text-zinc-400 hover:text-zinc-200 transition inline-flex items-center justify-center gap-2';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('chapters-container');
    const addBtn = document.getElementById('add-chapter-btn');
    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            const count = container.querySelectorAll('.chapter-item').length + 1;
            const padCount = String(count).padStart(2, '0');
            const index = Date.now();
            const newItem = document.createElement('div');
            newItem.className = 'chapter-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm';
            newItem.innerHTML = `
                <div class="flex items-center justify-between pb-1">
                    <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                        Bab ${padCount}
                    </span>
                    <button type="button" onclick="this.closest('.chapter-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Bab">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
                <div class="space-y-3">
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Judul Bab</label>
                        <input type="text" name="chapters[${index}][title]" placeholder="Contoh: Bab ${count}: Judul Bab"
                            class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Penjelasan Bab</label>
                        <textarea name="chapters[${index}][description]" rows="3" placeholder="Penjelasan atau pembahasan materi bab ini..."
                            class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition leading-relaxed"></textarea>
                    </div>
                </div>
            `;
            container.appendChild(newItem);
        });
    }
});
</script>
@endsection
