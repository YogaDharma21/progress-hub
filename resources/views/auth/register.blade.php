@extends('layouts.guest')

@section('title', 'Progress Hub — Register')

@section('content')
<div class="w-full max-w-md bg-zinc-900 border border-zinc-800 rounded-xl p-7 shadow-xl">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Create account</h1>
        <p class="mt-1.5 text-sm text-zinc-400">Bergabung dan mulai eksplorasi kegiatan serta proyek UKM.</p>
    </div>

    <form class="space-y-4" onsubmit="return false;">
        <div class="space-y-1.5">
            <label for="name" class="block text-xs font-medium text-zinc-200">Full name</label>
            <input id="name" type="text" placeholder="Nama lengkap" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-medium text-zinc-200">Email</label>
            <input id="email" type="email" placeholder="nama@kampus.ac.id" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-medium text-zinc-200">Password</label>
            <input id="password" type="password" placeholder="Minimal 8 karakter" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <div class="space-y-1.5">
            <label for="confirm" class="block text-xs font-medium text-zinc-200">Confirm password</label>
            <input id="confirm" type="password" placeholder="Ulangi password" 
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <button type="button" onclick="location.href='/login'" 
            class="w-full mt-2 inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm">
            Register
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-zinc-400">
        Sudah punya akun? <a href="/login" class="font-medium text-zinc-100 hover:text-white hover:underline transition">Login</a>
    </div>
</div>
@endsection
