@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md card-surface p-7 sm:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-zinc-100 tracking-tight">Login</h1>
    </div>
    
    <form class="space-y-4" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-medium text-zinc-300">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required
                class="w-full bg-zinc-950 border @error('email') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
            @error('email')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-medium text-zinc-300">Password</label>
            <input id="password" name="password" type="password" placeholder="Masukkan password" required
                class="w-full bg-zinc-950 border @error('password') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
            @error('password')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="btn-spring w-full mt-2 inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition cursor-pointer">
            Login
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-zinc-400">
        Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-zinc-100 hover:text-white underline underline-offset-4 transition">Daftar</a>
    </div>
</div>
@endsection
