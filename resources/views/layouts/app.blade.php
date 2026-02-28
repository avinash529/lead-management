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
<body class="page-shell font-sans text-white/90 selection:bg-brand-500/30">
    <!-- Mesh Background Elements -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-brand-600/20 blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-accent-cyan/10 blur-[120px] animate-pulse" style="animation-delay: 2s"></div>
        <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] rounded-full bg-accent-pink/10 blur-[120px] animate-pulse" style="animation-delay: 4s"></div>
    </div>

    <div class="min-h-screen flex flex-col">
        <header class="sticky top-4 z-50 mx-auto w-[95%] max-w-6xl">
            <div class="glass-panel px-6 py-3 flex items-center justify-between gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group transition-transform hover:scale-105">
                    <div class="relative">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-brand-600 text-white font-serif text-lg shadow-lg shadow-brand-600/20">
                            LM
                        </span>
                        <div class="absolute -inset-1 bg-brand-600/20 blur opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    </div>
                    <div class="leading-tight">
                        <span class="block text-base font-bold tracking-tight text-white">Lead Management</span>
                        <span class="block text-[10px] uppercase tracking-widest text-white/40 font-semibold">Elevate your pipeline</span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center gap-8">
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

                <div class="flex items-center gap-4">
                    <x-dropdown align="right" width="64">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 rounded-full border border-white/10 bg-white/5 pl-2 pr-4 py-1.5 transition-all hover:bg-white/10 active:scale-95">
                                <div class="h-6 w-6 rounded-full bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-[10px] font-bold text-white uppercase shadow-lg shadow-brand-500/20">
                                    {{ substr(auth()->user()->name ?? 'G', 0, 1) }}
                                </div>
                                <span class="text-xs font-medium text-white/70">
                                    {{ auth()->user()->name ?? 'Account' }}
                                </span>
                                <svg class="fill-current h-3 w-3 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-white/5 bg-white/5 mb-1 rounded-t-2xl">
                                <p class="text-[9px] font-bold text-white/20 uppercase tracking-[0.2em] mb-0.5">Active Session</p>
                                <p class="text-[11px] font-semibold text-white/60 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('User Preferences') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="!text-rose-400 hover:!bg-rose-500/10">
                                    {{ __('Terminate Access') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div class="md:hidden mt-2 glass-panel p-2 flex justify-around gap-1">
                <a href="{{ route('dashboard') }}"
                   class="flex-1 text-center py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('dashboard') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/20' : 'text-white/60' }}">
                    Dash
                </a>
                <a href="{{ route('leads.index') }}"
                   class="flex-1 text-center py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('leads.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/20' : 'text-white/60' }}">
                    Leads
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.users.index') }}"
                       class="flex-1 text-center py-2 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('admin.users.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/20' : 'text-white/60' }}">
                        Users
                    </a>
                @endif
            </div>
        </header>

        <main class="flex-1 max-w-6xl mx-auto w-full px-6 py-12">
            @if (isset($header))
                <div class="mb-10 animate-fade-in-up">
                    {{ $header }}
                </div>
            @endif

            <div class="animate-fade-in">
                @yield('content')
                {{ $slot ?? '' }}
            </div>
        </main>

        <footer class="py-8 text-center text-white/20 text-[10px] uppercase tracking-[0.2em] font-bold">
            &copy; {{ date('Y') }} Lead Management Suite &bull; Crafted for Excellence
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</body>
</html>
