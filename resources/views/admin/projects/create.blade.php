@extends('layouts.admin')

@section('title', 'Progress Hub — Buat Project')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <!-- Header & Navigation -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-800 pb-6">
        <div>
            <a href="/admin/projects" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Admin Projects
            </a>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Buat Project Baru</h1>
            <p class="mt-1 text-xs text-zinc-400">Isi detail portofolio atau proyek mahasiswa yang akan ditampilkan.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="/admin/projects" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
            <button type="button" onclick="location.href='/admin/projects'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm hover:-translate-y-0.5 inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Proyek
            </button>
        </div>
    </div>

    <form class="space-y-6" onsubmit="return false;">
        <!-- Card 1: Informasi Utama Proyek -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Informasi Utama Proyek</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">Judul, deskripsi singkat, kategori, dan stack teknologi</p>
                </div>
            </div>

            <div class="mt-5 space-y-4">
                <div class="space-y-1.5">
                    <label for="project-title" class="block text-xs font-medium text-zinc-300">Judul Proyek</label>
                    <input id="project-title" type="text" placeholder="Contoh: Sistem E-Voting Kampus" 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="project-desc" class="block text-xs font-medium text-zinc-300">Deskripsi Proyek</label>
                    <textarea id="project-desc" rows="4" placeholder="Jelaskan tujuan dan fungsi utama proyek ini..." 
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition leading-relaxed"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="project-type" class="block text-xs font-medium text-zinc-300">Kategori Proyek</label>
                        <select id="project-type" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition cursor-pointer">
                            <option value="" disabled selected>Pilih kategori</option>
                            <option>UKM Project</option>
                            <option>Member Project</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="project-tech" class="block text-xs font-medium text-zinc-300">Teknologi (pisahkan dengan koma)</label>
                        <input id="project-tech" type="text" placeholder="React, Node.js, PostgreSQL" 
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Media Showcase & Link Projects -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 pb-5 border-b border-zinc-800">
                <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-zinc-100">Media Showcase & Link Projects</h2>
                    <p class="text-xs text-zinc-400 mt-0.5">Gambar preview dan tautan eksternal proyek</p>
                </div>
            </div>

            <div class="mt-5 space-y-5">
                <!-- Gambar Showcase -->
                <div class="space-y-1.5">
                    <label for="project-image" class="block text-xs font-medium text-zinc-300">Gambar Showcase Proyek</label>
                    <label for="project-image" class="flex flex-col items-center justify-center w-full h-36 border-2 border-dashed border-zinc-800 hover:border-zinc-700 bg-zinc-950 rounded-xl cursor-pointer transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                            <svg class="w-8 h-8 mb-2 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="text-xs text-zinc-300"><span class="font-semibold text-zinc-100">Klik untuk upload banner</span> atau drag and drop</p>
                            <p class="text-[11px] text-zinc-500 mt-0.5">PNG, JPG, WebP (Rekomendasi ratio 16:9, maks 5MB)</p>
                        </div>
                        <input id="project-image" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>

                <!-- Link Projects Grid -->
                <div class="space-y-2 pt-2">
                    <label class="block text-xs font-medium text-zinc-300">Link Repository & Demo</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">Live Demo</span>
                            <input id="link-demo" type="url" placeholder="https://demo.example.com" 
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                        </div>
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">GitHub Repository</span>
                            <input id="link-github" type="url" placeholder="https://github.com/user/repo" 
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                        </div>
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">Documentation</span>
                            <input id="link-docs" type="url" placeholder="https://docs.example.com" 
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Fitur Utama Proyek -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center text-zinc-200 shrink-0 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-base font-semibold text-zinc-100">Fitur Utama Proyek</h2>
                        <p class="text-xs text-zinc-400 mt-0.5">Tambahkan poin-poin fitur unggulan sistem</p>
                    </div>
                </div>

                <button type="button" id="add-feature-btn" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-xl transition shadow-sm self-start sm:self-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Fitur
                </button>
            </div>

            <div id="features-container" class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="feature-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                    <div class="flex items-center justify-between pb-1">
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                            Fitur 01
                        </span>
                        <button type="button" onclick="this.closest('.feature-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Fitur">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    <div class="space-y-3">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Nama Fitur</label>
                            <input type="text" name="features[0][title]" placeholder="Contoh: Verifikasi Identitas" 
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium text-zinc-400">Deskripsi Fitur</label>
                            <textarea name="features[0][description]" rows="3" placeholder="Deskripsi ringkas keunggulan fitur..." 
                                class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition leading-relaxed"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Footer -->
        <div class="pt-4 flex items-center justify-between">
            <span class="text-xs text-zinc-400">Periksa kembali detail sebelum menyimpan proyek.</span>
            <div class="flex items-center gap-3">
                <a href="/admin/projects" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="button" onclick="location.href='/admin/projects'" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition hover:-translate-y-0.5 shadow-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Proyek
                </button>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('features-container');
    const addBtn = document.getElementById('add-feature-btn');
    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            const count = container.querySelectorAll('.feature-item').length + 1;
            const padCount = String(count).padStart(2, '0');
            const index = Date.now();
            const newItem = document.createElement('div');
            newItem.className = 'feature-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm';
            newItem.innerHTML = `
                <div class="flex items-center justify-between pb-1">
                    <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                        Fitur ${padCount}
                    </span>
                    <button type="button" onclick="this.closest('.feature-item').remove()" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Fitur">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
                <div class="space-y-3">
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Nama Fitur</label>
                        <input type="text" name="features[${index}][title]" placeholder="Contoh: Voting Terenkripsi" 
                            class="w-full bg-zinc-900 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition font-medium" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium text-zinc-400">Deskripsi Fitur</label>
                        <textarea name="features[${index}][description]" rows="3" placeholder="Deskripsi ringkas keunggulan fitur..." 
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
