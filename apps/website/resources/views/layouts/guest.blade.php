<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
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

    <header class="fixed inset-x-0 top-0 z-50 px-4 pt-3">
        <nav class="mx-auto flex h-14 max-w-5xl items-center justify-between gap-3 rounded-full border border-zinc-800/70 bg-zinc-900 px-3 shadow-lg shadow-black/40 ring-1 ring-white/5 lg:bg-zinc-900/70 lg:backdrop-blur-xl sm:px-4">
            <a href="/" class="flex items-center gap-2.5 font-semibold text-zinc-100 hover:text-white transition">
                <img src="/icon-192.png" alt="Progress Hub" class="w-8 h-8 rounded-lg" />
                <span class="text-base tracking-tight">Progress Hub</span>
            </a>
            <div class="flex items-center gap-2">
                <a href="/login" class="inline-flex items-center justify-center rounded-full bg-zinc-100 px-3 py-1.5 text-xs font-medium text-zinc-950 transition hover:-translate-y-0.5 hover:bg-white sm:px-4 sm:py-2">
                    Login
                </a>
                <a href="/register" class="inline-flex items-center justify-center rounded-full border border-zinc-700 bg-zinc-800 px-3 py-1.5 text-xs font-medium text-zinc-100 transition hover:-translate-y-0.5 hover:bg-zinc-700 sm:px-4 sm:py-2">
                    Register
                </a>
            </div>
        </nav>
    </header>

    <main class="flex-1 flex items-center justify-center p-6 pt-24">
        @yield('content')
    </main>

</body>
</html>
