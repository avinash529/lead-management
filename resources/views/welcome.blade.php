<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Lead Management') }}</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=ibm-plex-sans:400,500,600,700&family=fraunces:400,500,600,700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="page-shell font-sans">
        <div class="min-h-screen flex flex-col">
            <header class="border-b border-sand-200/70 bg-white/70 backdrop-blur">
                <div class="max-w-6xl mx-auto px-6 py-5 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-ink-900 text-white font-serif text-lg">LM</span>
                        <div class="leading-tight">
                            <span class="block text-base font-semibold tracking-tight text-ink-900">Lead Management</span>
                            <span class="block text-xs text-ink-600">Elegance in every stage</span>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </header>

            <main class="flex-1">
                <div class="max-w-6xl mx-auto px-6 py-16 grid gap-12 lg:grid-cols-[1.1fr_0.9fr] items-center">
                    <div class="space-y-6">
                        <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Lead Management Suite</p>
                        <h1 class="text-4xl md:text-5xl leading-tight">
                            Build calm, elegant momentum for every lead.
                        </h1>
                        <p class="text-lg text-ink-600">
                            Unify your pipeline in a workspace designed for clarity. Track status changes, review recent activity, and focus on what matters most.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <div class="card px-4 py-3 text-sm text-ink-700">
                                Status insights
                            </div>
                            <div class="card px-4 py-3 text-sm text-ink-700">
                                Lead history built in
                            </div>
                            <div class="card px-4 py-3 text-sm text-ink-700">
                                Export-ready data
                            </div>
                        </div>
                        @if (Route::has('login'))
                            <div class="flex flex-wrap gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-secondary">Sign in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary">Create account</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>

                    <div class="card p-6 md:p-8 space-y-6">
                        <div>
                            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Snapshot</p>
                            <h2 class="text-2xl md:text-3xl">Pipeline at a glance</h2>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between rounded-2xl bg-sand-50 px-4 py-3">
                                <span class="text-sm text-ink-600">New leads</span>
                                <span class="text-xl font-serif text-copper-600">24</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-sand-50 px-4 py-3">
                                <span class="text-sm text-ink-600">In progress</span>
                                <span class="text-xl font-serif text-sage-700">12</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-sand-50 px-4 py-3">
                                <span class="text-sm text-ink-600">Closed</span>
                                <span class="text-xl font-serif text-ink-900">8</span>
                            </div>
                        </div>
                        <div class="text-sm text-ink-600">
                            Designed for teams that want calm momentum and clean visibility.
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
