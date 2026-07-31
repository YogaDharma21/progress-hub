@extends('layouts.app')

@section('title', 'Progress Hub — Resource Detail')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    
    <a href="/members/resources" class="inline-flex items-center gap-2 text-xs font-medium text-zinc-400 hover:text-zinc-100 transition">
        &larr; Kembali ke Resources
    </a>

    
    <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-6">
        <div class="w-full h-56 bg-gradient-to-br from-zinc-800 to-zinc-900 rounded-lg border border-zinc-800 flex items-center justify-center text-sm text-zinc-500 font-medium">
            Resource Preview Image
        </div>

        <div class="space-y-3">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-zinc-800 text-zinc-200">
                Modul
            </span>
            <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Modul Dasar React untuk Pemula</h1>
            <p class="text-sm text-zinc-400 leading-relaxed">
                Panduan langkah demi langkah memahami komponen, props, state, dan lifecycle React. Modul ini dirancang untuk pemula yang ingin mempelajari React dari nol dengan pendekatan praktis dan contoh nyata.
            </p>
        </div>

        <div class="flex flex-wrap gap-2">
            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">React</span>
            <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-zinc-950 text-zinc-400 border border-zinc-800">Tutorial</span>
        </div>

        <div class="pt-4 border-t border-zinc-800 flex items-center justify-between text-xs text-zinc-400">
            <span>1.2K views • 2 minggu lalu</span>
            <a href="#" class="px-4 py-2 text-xs font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5">
                Download PDF Modul
            </a>
        </div>
    </div>

    
    <div class="space-y-4">
        <h2 class="text-lg font-semibold text-zinc-100">Bab dalam Modul</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Bab 1: Pengenalan React</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Apa itu React, why React, dan setup lingkungan development</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Bab 2: Komponen & Props</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">Struktur komponen, props, dan data flow dalam React</p>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 space-y-2">
                <h3 class="font-semibold text-sm text-zinc-100">Bab 3: State & Hooks</h3>
                <p class="text-xs text-zinc-400 leading-relaxed">useState, useEffect, dan manajemen state yang efektif</p>
            </div>
        </div>
    </div>
</div>
@endsection
