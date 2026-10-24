@extends('layouts.guest')

@section('content')
<div class="w-full max-w-md card-surface p-7 sm:p-8">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-zinc-100 tracking-tight">Create account</h1>
    </div>

    <form class="space-y-4" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-1.5">
            <label for="name" class="block text-xs font-medium text-zinc-300">Full name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama lengkap" required
                class="w-full bg-zinc-950 border @error('name') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
            @error('name')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-medium text-zinc-300">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required
                class="w-full bg-zinc-950 border @error('email') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
            @error('email')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="avatar" class="block text-xs font-medium text-zinc-300">
                Profile picture <span class="text-accent-crimson">*</span>
            </label>
            <input id="avatar" name="avatar" type="file" accept="image/*" required
                class="w-full bg-zinc-950 border @error('avatar') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2 text-sm text-zinc-100 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-medium file:bg-surface file:text-zinc-200 hover:file:bg-zinc-700 cursor-pointer focus:outline-none focus:border-zinc-500 transition" />
            @error('avatar')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-medium text-zinc-300">Password</label>
            <input id="password" name="password" type="password" placeholder="Minimal 8 karakter" required
                class="w-full bg-zinc-950 border @error('password') border-accent-crimson @else border-border @enderror rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
            @error('password')
                <p class="text-xs text-accent-crimson mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="password_confirmation" class="block text-xs font-medium text-zinc-300">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password" required
                class="w-full bg-zinc-950 border border-border rounded-xl px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:border-zinc-500 transition" />
        </div>

        <button type="submit" 
            class="btn-spring w-full mt-2 inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-xl hover:bg-white transition cursor-pointer">
            Register
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-zinc-400">
        Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-zinc-100 hover:text-white underline underline-offset-4 transition">Login</a>
    </div>
</div>
@endsection
