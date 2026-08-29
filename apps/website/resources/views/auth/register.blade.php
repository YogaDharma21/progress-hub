@extends('layouts.guest')


@section('content')
<div class="w-full max-w-md bg-zinc-900 border border-zinc-800 rounded-xl p-7 shadow-xl">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-zinc-100 tracking-tight">Create account</h1>
        <p class="mt-1.5 text-sm text-zinc-400">Bergabung dan mulai eksplorasi kegiatan serta proyek UKM.</p>
    </div>

    <form class="space-y-4" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-1.5">
            <label for="name" class="block text-xs font-medium text-zinc-200">Full name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama lengkap" required
                class="w-full bg-zinc-950 border @error('name') border-red-500 @else border-zinc-800 @enderror rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            @error('name')
                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="email" class="block text-xs font-medium text-zinc-200">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@kampus.ac.id" required
                class="w-full bg-zinc-950 border @error('email') border-red-500 @else border-zinc-800 @enderror rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            @error('email')
                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="avatar" class="block text-xs font-medium text-zinc-200">
                Profile Picture <span class="text-red-400">*</span>
            </label>
            <input id="avatar" name="avatar" type="file" accept="image/*" required
                class="w-full bg-zinc-950 border @error('avatar') border-red-500 @else border-zinc-800 @enderror rounded-lg px-3.5 py-2 text-sm text-zinc-100 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-zinc-800 file:text-zinc-200 hover:file:bg-zinc-700 cursor-pointer focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            @error('avatar')
                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="password" class="block text-xs font-medium text-zinc-200">Password</label>
            <input id="password" name="password" type="password" placeholder="Minimal 8 karakter" required
                class="w-full bg-zinc-950 border @error('password') border-red-500 @else border-zinc-800 @enderror rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
            @error('password')
                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1.5">
            <label for="password_confirmation" class="block text-xs font-medium text-zinc-200">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password" required
                class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2.5 text-sm text-zinc-100 placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 transition" />
        </div>

        <button type="submit" 
            class="w-full mt-2 inline-flex items-center justify-center px-4 py-2.5 text-sm font-semibold text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5 shadow-sm cursor-pointer">
            Register
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-zinc-400">
        Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-zinc-100 hover:text-white hover:underline transition">Login</a>
    </div>
</div>
@endsection
