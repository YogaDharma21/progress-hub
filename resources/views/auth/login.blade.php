@extends('layouts.guest')

@section('title', 'Progress Hub — Login')

@section('content')
<div class="w-full max-w-md bg-zinc-900 border border-zinc-800 rounded-xl p-7 shadow-xl">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Login</h1>
        <p class="mt-1.5 text-sm text-zinc-400">Akses progres belajar, proyek, dan kegiatan UKM kamu.</p>
    </div>

    <form class="space-y-4" onsubmit="return false;">
        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-medium text-zinc-200">Email</label>
            <input id="email" type="email" placeholder="nama@kampus.ac.id" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-medium text-zinc-200">Password</label>
            <input id="password" type="password" placeholder="Masukkan password" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <button type="button" onclick="location.href='/members/dashboard'" 
            class="w-full mt-2 inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
            Login
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-zinc-400">
        Belum punya akun? <a href="/register" class="font-medium text-zinc-100 hover:text-white hover:underline transition">Daftar</a>
    </div>
</div>
@endsection
