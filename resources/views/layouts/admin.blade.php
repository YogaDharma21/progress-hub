<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Progress Hub — Admin Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <header class="bg-zinc-900 border-b border-zinc-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="/admin" class="flex items-center gap-3 font-semibold text-lg text-zinc-100 hover:text-white transition">
                    <div class="w-8 h-8 bg-zinc-100 text-zinc-950 rounded-lg flex items-center justify-center font-bold text-sm">
                        P
                    </div>
                    Progress Hub
                </a>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/30">
                    Admin
                </span>
            </div>

            <nav class="hidden md:flex items-center gap-1">
                <a href="/admin/events" class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->is('admin/events*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                    Events
                </a>
                <a href="/admin/projects" class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->is('admin/projects*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                    Projects
                </a>
                <a href="/admin/resources" class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request()->is('admin/resources*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                    Resources
                </a>
            </nav>

            <div class="flex items-center gap-4">
                @auth
                    <div class="flex items-center gap-3">
                        @if(Auth::user()->avatar_url)
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border border-zinc-700 shadow-sm" />
                        @else
                            <div class="w-8 h-8 rounded-full bg-zinc-700 border border-zinc-600 inline-flex items-center justify-center text-xs font-semibold text-zinc-100">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <span class="text-xs font-medium text-zinc-300 hidden sm:inline">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 text-xs font-medium text-zinc-400 hover:text-white bg-zinc-800/80 hover:bg-zinc-800 border border-zinc-700 rounded-md transition cursor-pointer">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="/login" class="text-xs font-medium text-zinc-300 hover:text-white">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-950/60 border border-emerald-800/70 text-sm text-emerald-300 flex items-center justify-between shadow-sm">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-950/60 border border-red-800/70 text-sm text-red-300 flex items-center justify-between shadow-sm">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
