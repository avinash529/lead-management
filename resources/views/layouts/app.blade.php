<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lead Management') }}</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=ibm-plex-sans:400,500,600,700&family=fraunces:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell font-sans">
    <div class="min-h-screen">
        <header class="sticky top-0 z-40 border-b border-sand-200/70 bg-white/70 backdrop-blur">
            <div class="max-w-6xl mx-auto px-6 py-4">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-ink-900 text-white font-serif text-lg">
                            LM
                        </span>
                        <div class="leading-tight">
                            <span class="block text-base font-semibold tracking-tight text-ink-900">Lead Management</span>
                            <span class="block text-xs text-ink-600">Elegant pipeline control</span>
                        </div>
                    </a>

                    <nav class="hidden md:flex items-center gap-6">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('leads.index') }}"
                           class="nav-link {{ request()->routeIs('leads.*') ? 'nav-link-active' : '' }}">
                            Leads
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.users.index') }}"
                               class="nav-link {{ request()->routeIs('admin.users.*') ? 'nav-link-active' : '' }}">
                                Users
                            </a>
                        @endif
                    </nav>

                    <div class="flex items-center gap-3">
                        <span class="hidden sm:inline-flex items-center gap-2 rounded-full border border-sand-200 bg-white/70 px-3 py-1 text-xs text-ink-600">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            {{ auth()->user()->email ?? 'Guest' }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="md:hidden px-6 pb-4 flex flex-wrap gap-2">
                <a href="{{ route('dashboard') }}"
                   class="btn btn-secondary {{ request()->routeIs('dashboard') ? 'border-ink-800 text-ink-900' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('leads.index') }}"
                   class="btn btn-secondary {{ request()->routeIs('leads.*') ? 'border-ink-800 text-ink-900' : '' }}">
                    Leads
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-secondary {{ request()->routeIs('admin.users.*') ? 'border-ink-800 text-ink-900' : '' }}">
                        Users
                    </a>
                @endif
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-6 py-10">
            @if (isset($header))
                <div class="mb-6">
                    {{ $header }}
                </div>
            @endif

            @yield('content')
            {{ $slot ?? '' }}
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</body>
</html>
