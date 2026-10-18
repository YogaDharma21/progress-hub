<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-pt-24">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Progress Hub</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/icon-192.png" type="image/png" sizes="192x192">
    <link rel="icon" href="/icon-512.png" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.json">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <header data-nav class="group fixed inset-x-0 top-0 z-50 px-6 pt-3">
        <nav class="relative mx-auto max-w-7xl rounded-full border border-zinc-800/70 bg-zinc-900 shadow-lg shadow-black/40 ring-1 ring-white/5 lg:bg-zinc-900/70 lg:backdrop-blur-xl">
            <div class="flex h-14 items-center justify-between gap-3 px-3 sm:px-4 lg:px-6">
                <a href="/members" class="btn-spring flex items-center gap-2.5 font-semibold text-zinc-100 hover:text-white">
                    <img src="/icon-192.png" alt="Progress Hub" class="w-8 h-8 rounded-lg shadow-sm" />
                    <span class="text-base tracking-tight">Progress Hub</span>
                </a>

                <div class="hidden lg:flex items-center gap-0.5">
                    <a href="/members/events" class="pill-spring rounded-full px-4 py-2 text-sm font-medium {{ request()->is('members/events*') ? 'bg-zinc-800 text-white shadow-sm' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Events
                    </a>
                    <a href="/members/projects" class="pill-spring rounded-full px-4 py-2 text-sm font-medium {{ request()->is('members/projects*') ? 'bg-zinc-800 text-white shadow-sm' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Projects
                    </a>
                    <a href="/members/resources" class="pill-spring rounded-full px-4 py-2 text-sm font-medium {{ request()->is('members/resources*') ? 'bg-zinc-800 text-white shadow-sm' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Resources
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <div class="hidden md:flex items-center gap-3">
                        @auth
                            @if(Auth::user()->avatar_url)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded object-cover border border-zinc-700 shadow-sm transition-transform duration-200 hover:scale-105" />
                            @else
                                <div class="w-8 h-8 rounded bg-zinc-700 border border-zinc-600 inline-flex items-center justify-center text-xs font-semibold text-zinc-100 shadow-sm transition-transform duration-200 hover:scale-105">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="text-xs font-medium text-zinc-300 hidden sm:inline">{{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn-spring px-2.5 py-1 text-xs font-medium text-zinc-400 hover:text-white bg-zinc-800/80 hover:bg-zinc-800 border border-zinc-700 rounded-md cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="/login" class="btn-spring text-xs font-medium text-zinc-300 hover:text-white px-3 py-1.5 rounded-full bg-zinc-800 border border-zinc-700">Login</a>
                        @endauth
                    </div>

                    <button type="button" data-nav-toggle aria-controls="site-menu" aria-expanded="false" class="relative grid h-9 w-9 place-items-center rounded-full border border-zinc-800 bg-zinc-950/60 text-zinc-300 transition hover:border-zinc-700 hover:text-white active:scale-90 lg:hidden">
                        <span class="sr-only">Toggle navigation</span>
                        <span aria-hidden="true" class="flex flex-col items-center gap-[5px] transition duration-200 group-data-[open]:scale-50 group-data-[open]:opacity-0">
                            <span class="h-0.5 w-4 rounded bg-current"></span>
                            <span class="h-0.5 w-4 rounded bg-current"></span>
                        </span>
                        <svg aria-hidden="true" class="absolute h-4 w-4 opacity-0 transition duration-200 group-data-[open]:rotate-90 group-data-[open]:opacity-100" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="site-menu" class="pointer-events-none absolute inset-x-0 top-[calc(100%+0.5rem)] -translate-y-1 rounded-2xl border border-zinc-800/70 bg-zinc-950 p-2 opacity-0 shadow-xl shadow-black/40 ring-1 ring-white/5 transition duration-200 ease-out group-data-[open]:pointer-events-auto group-data-[open]:translate-y-0 group-data-[open]:opacity-100 lg:hidden">
                <div class="flex flex-col">
                    <a href="/members/events" class="pill-spring rounded-full px-3 py-2.5 text-sm font-medium {{ request()->is('members/events*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Events
                    </a>
                    <a href="/members/projects" class="pill-spring rounded-full px-3 py-2.5 text-sm font-medium {{ request()->is('members/projects*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Projects
                    </a>
                    <a href="/members/resources" class="pill-spring rounded-full px-3 py-2.5 text-sm font-medium {{ request()->is('members/resources*') ? 'bg-zinc-800 text-white' : 'text-zinc-400 hover:text-zinc-100 hover:bg-zinc-800/60' }}">
                        Resources
                    </a>
                </div>

                <div class="mt-2 border-t border-zinc-800/80 pt-2 md:hidden">
                    @auth
                        <div class="flex items-center gap-3 px-3 py-2">
                            @if(Auth::user()->avatar_url)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded object-cover border border-zinc-700" />
                            @else
                                <div class="w-9 h-9 rounded bg-zinc-700 border border-zinc-600 inline-flex items-center justify-center text-xs font-semibold text-zinc-100">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="min-w-0 flex-1 truncate text-sm font-medium text-zinc-200">{{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn-spring px-2.5 py-1 text-xs font-medium text-zinc-400 hover:text-white bg-zinc-800/80 hover:bg-zinc-800 border border-zinc-700 rounded-md cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="/login" class="btn-spring flex items-center justify-center rounded-full border border-zinc-700 bg-zinc-800 px-3 py-2.5 text-sm font-medium text-zinc-300 hover:text-white">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-6 pt-24 pb-8">
        @if (session('error'))
            <div class="mb-6 p-4">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>

</body>
</html>
