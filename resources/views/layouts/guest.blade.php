<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Progress Hub')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <header class="bg-zinc-900 border-b border-zinc-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 font-semibold text-lg text-zinc-100 hover:text-white transition">
                <div class="w-8 h-8 bg-zinc-100 text-zinc-950 rounded-lg flex items-center justify-center font-bold text-sm">
                    P
                </div>
                Progress Hub
            </a>
            <div class="flex items-center gap-2">
                <a href="/login" class="inline-flex items-center justify-center px-4 py-2 text-xs font-medium text-zinc-950 bg-zinc-100 rounded-lg hover:bg-white transition hover:-translate-y-0.5">
                    Login
                </a>
                <a href="/register" class="inline-flex items-center justify-center px-4 py-2 text-xs font-medium text-zinc-100 bg-zinc-800 border border-zinc-700 rounded-lg hover:bg-zinc-700 transition hover:-translate-y-0.5">
                    Register
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1 flex items-center justify-center p-6">
        @yield('content')
    </main>

    <footer class="border-t border-zinc-800 py-5 text-center text-zinc-400 text-xs bg-zinc-950">
        <div class="max-w-7xl mx-auto px-6">
            <p>Progress Hub — UKM Dashboard. Dibuat dengan purpose.</p>
        </div>
    </footer>

</body>
</html>
