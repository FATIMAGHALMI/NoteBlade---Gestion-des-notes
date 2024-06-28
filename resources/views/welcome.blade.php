<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Vite for CSS -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex justify-between items-center py-6">
                    <div>
                        <a href="{{ url('/') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-16 w-16">
                            <span class="text-4xl font-bold text-yellow-800">NOTES</span>
                        </a>
                    </div>
                    @auth
                        <nav class="-mx-3 flex flex-1 justify-end">
                            <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log out
                                </button>
                            </form>
                        </nav>
                    @else
                        <nav class="-mx-3 flex flex-1 justify-end">
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        </nav>
                    @endauth
                </header>

                <main class="mt-8">
                <h1 class="text-4xl text-center text-yellow-600 font-bold leading-tight">Welcome...</h1>
                    <img src="{{ asset('image/header.jpeg') }}" alt="Header Image" class="h-22 max-w-screen-2xl object-cover">
                    <div class="mt-8 text-center">
                        
                        <p class="mt-4 text-lg text-gray-700">Explorez vos notes par catégorie pour une organisation optimale.</p>
                    </div>
                </main>

                <footer class="py-8 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
