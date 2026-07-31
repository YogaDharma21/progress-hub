@extends('layouts.admin')

@section('title', 'Progress Hub — Buat Project')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- Header & Navigation -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-zinc-800 pb-6">
            <div>
                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Admin Projects
                </a>
                <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Buat Project Baru</h1>
                <p class="mt-1 text-xs text-zinc-400">Isi detail portofolio atau proyek mahasiswa yang akan ditampilkan.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition shadow-sm hover:-translate-y-0.5 inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Proyek
                </button>
            </div>
        </div>

        @if ($errors->any())
            <div class="p-4 rounded-xl bg-rose-950/60 border border-rose-800/70 text-xs text-rose-300 space-y-1">
                <p class="font-semibold">Mohon perbaiki kesalahan berikut:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                    <label for="title" class="block text-xs font-medium text-zinc-300">Judul Proyek <span class="text-rose-400">*</span></label>
                    <input id="title" name="title" type="text" value="{{ old('title') }}" required placeholder="Contoh: Sistem E-Voting Kampus"
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition" />
                </div>

                <div class="space-y-1.5">
                    <label for="description" class="block text-xs font-medium text-zinc-300">Deskripsi Proyek</label>
                    <textarea id="description" name="description" rows="4" placeholder="Jelaskan tujuan dan fungsi utama proyek ini..."
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition leading-relaxed">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label for="category" class="block text-xs font-medium text-zinc-300">Kategori Proyek</label>
                        <select id="category" name="category" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-2.5 text-sm text-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:border-zinc-700 transition cursor-pointer">
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori</option>
                            <option value="UKM Project" {{ old('category') == 'UKM Project' ? 'selected' : '' }}>UKM Project</option>
                            <option value="Member Project" {{ old('category') == 'Member Project' ? 'selected' : '' }}>Member Project</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="technologies" class="block text-xs font-medium text-zinc-300">Teknologi (pisahkan dengan koma)</label>
                        <input id="technologies" name="technologies" type="text" value="{{ old('technologies') }}" placeholder="React, Node.js, PostgreSQL"
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
                    <label for="image" class="block text-xs font-medium text-zinc-300">Gambar Showcase Proyek</label>
                    <label for="image" class="relative flex flex-col items-center justify-center w-full h-44 border-2 border-dashed border-zinc-800 hover:border-zinc-700 bg-zinc-950 rounded-xl cursor-pointer transition overflow-hidden group">
                        <div id="image-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                            <svg width="32" height="32" class="w-8 h-8 max-w-[32px] max-h-[32px] mb-2 text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="text-xs text-zinc-300"><span class="font-semibold text-zinc-100">Klik untuk upload banner</span></p>
                            <p class="text-[11px] text-zinc-500 mt-0.5">PNG, JPG, WebP (Maks 5MB)</p>
                        </div>
                        <div id="image-preview-container" class="hidden absolute inset-0 w-full h-full">
                            <img id="image-preview" src="#" alt="Preview Banner" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-xs font-semibold text-white">
                                Klik untuk ganti gambar
                            </div>
                        </div>
                        <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>

                <!-- Link Projects Grid -->
                <div class="space-y-2 pt-2">
                    <label class="block text-xs font-medium text-zinc-300">Link Repository & Demo</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">Live Demo</span>
                            <input id="demo_url" name="demo_url" type="url" value="{{ old('demo_url') }}" placeholder="https://demo.example.com"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                        </div>
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">GitHub Repository</span>
                            <input id="repository_url" name="repository_url" type="url" value="{{ old('repository_url') }}" placeholder="https://github.com/user/repo"
                                class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-3.5 py-2.5 text-xs text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
                        </div>
                        <div class="space-y-1.5">
                            <span class="block text-[11px] font-medium text-zinc-400">Documentation</span>
                            <input id="documentation_url" name="documentation_url" type="url" value="{{ old('documentation_url') }}" placeholder="https://docs.example.com"
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

                <button type="button" id="add-feature-btn" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-zinc-200 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 rounded-xl transition shadow-sm self-start sm:self-auto cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Fitur
                </button>
            </div>

            <div id="features-container" class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="feature-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm">
                    <div class="flex items-center justify-between pb-1">
                        <span class="feature-label inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                            Fitur 01
                        </span>
                        <button type="button" onclick="this.closest('.feature-item').remove(); updateFeatureLabels();" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Fitur">
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
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 text-xs font-semibold text-zinc-400 hover:text-zinc-100 transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition hover:-translate-y-0.5 shadow-sm inline-flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Proyek
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function updateFeatureLabels() {
    const container = document.getElementById('features-container');
    if (!container) return;
    const items = container.querySelectorAll('.feature-item');
    items.forEach((item, index) => {
        const padCount = String(index + 1).padStart(2, '0');
        const label = item.querySelector('.feature-label');
        if (label) label.textContent = `Fitur ${padCount}`;
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    if (imagePreviewContainer) imagePreviewContainer.classList.remove('hidden');
                    if (imagePlaceholder) imagePlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    const container = document.getElementById('features-container');
    const addBtn = document.getElementById('add-feature-btn');
    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            const index = Date.now();
            const newItem = document.createElement('div');
            newItem.className = 'feature-item bg-zinc-950 border border-zinc-800 rounded-xl p-5 space-y-4 relative group hover:border-zinc-700 transition shadow-sm';
            newItem.innerHTML = `
                <div class="flex items-center justify-between pb-1">
                    <span class="feature-label inline-flex items-center px-3 py-1 rounded-md text-xs font-semibold bg-zinc-800 text-zinc-200 border border-zinc-700">
                        Fitur 01
                    </span>
                    <button type="button" onclick="this.closest('.feature-item').remove(); updateFeatureLabels();" class="p-1.5 text-zinc-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Hapus Fitur">
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
            updateFeatureLabels();
        });
    }
});
</script>
@endsection
