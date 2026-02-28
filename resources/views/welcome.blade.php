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
    <body class="page-shell font-sans text-white/90 selection:bg-brand-500/30 overflow-x-hidden">
        <!-- Mesh Background Elements -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-brand-600/20 blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-accent-cyan/10 blur-[120px] animate-pulse" style="animation-delay: 2s"></div>
            <div class="absolute top-[20%] right-[10%] w-[40%] h-[40%] rounded-full bg-accent-pink/10 blur-[120px] animate-pulse" style="animation-delay: 4s"></div>
        </div>

        <div class="min-h-screen flex flex-col">
            <header class="sticky top-4 z-50 mx-auto w-[90%] max-w-6xl">
                <div class="glass-panel px-6 py-4 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-brand-600 text-white font-serif text-lg shadow-lg shadow-brand-600/20">LM</span>
                        <div class="leading-tight">
                            <span class="block text-base font-bold tracking-tight text-white">Lead Management</span>
                            <span class="block text-[10px] uppercase tracking-widest text-white/40 font-semibold">Elevate your pipeline</span>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link !text-white/60 hover:!text-white mr-2">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary !px-6">Get Started</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </header>

            <main class="flex-1">
                <div class="max-w-6xl mx-auto px-6 pt-24 pb-16 grid gap-16 lg:grid-cols-[1fr_0.8fr] items-center relative">
                    <!-- Hero Text -->
                    <div class="space-y-8 animate-fade-in-up">
                        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 backdrop-blur-md">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                            </span>
                            <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-white/60">Lead Management Suite 2.0</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl leading-[1.1] font-bold tracking-tight">
                            Master your <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-accent-cyan to-accent-indigo">flow</span> with liquid precision.
                        </h1>
                        
                        <p class="text-xl text-white/50 max-w-lg leading-relaxed">
                            A workspace designed for clarity, moving at the speed of your vision. Elegantly track, manage, and convert every lead.
                        </p>
                        
                        <div class="flex flex-wrap gap-4 pt-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary !px-8 !py-4 text-lg">Go to Dashboard</a>
                            @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary !px-8 !py-4 text-lg shadow-2xl shadow-brand-500/40">Start Free Trial</a>
                                @endif
                                <a href="{{ route('login') }}" class="btn btn-secondary !px-8 !py-4 text-lg">View Demo</a>
                            @endauth
                        </div>

                        <div class="flex items-center gap-8 pt-8 border-t border-white/5">
                            <div>
                                <div class="text-2xl font-bold">12k+</div>
                                <div class="text-[10px] uppercase tracking-widest text-white/30 font-bold">Leads Managed</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold">99.9%</div>
                                <div class="text-[10px] uppercase tracking-widest text-white/30 font-bold">Uptime Guaranteed</div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual / Snapshot Card -->
                    <div class="relative group animate-fade-in" style="animation-delay: 0.3s">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-brand-600/30 to-accent-cyan/30 blur-3xl opacity-20 group-hover:opacity-40 transition-opacity duration-700"></div>
                        
                        <div class="glass-card p-8 md:p-10 space-y-8 relative border-t-white/20">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/30 mb-2">Real-time Snapshot</p>
                                <h2 class="text-3xl font-bold">Pipeline Health</h2>
                            </div>
                            
                            <div class="grid gap-4">
                                <div class="group/item flex items-center justify-between p-4 rounded-2xl bg-white/[0.03] border border-white/5 transition-all hover:bg-white/[0.06] hover:translate-x-2">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-brand-500/10 flex items-center justify-center border border-brand-500/20">
                                            <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        </div>
                                        <span class="text-sm font-semibold text-white/70">New opportunities</span>
                                    </div>
                                    <span class="text-2xl font-serif text-brand-400">24</span>
                                </div>
                                <div class="group/item flex items-center justify-between p-4 rounded-2xl bg-white/[0.03] border border-white/5 transition-all hover:bg-white/[0.06] hover:translate-x-2">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-accent-cyan/10 flex items-center justify-center border border-accent-cyan/20">
                                            <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        </div>
                                        <span class="text-sm font-semibold text-white/70">In negotiation</span>
                                    </div>
                                    <span class="text-2xl font-serif text-accent-cyan">12</span>
                                </div>
                                <div class="group/item flex items-center justify-between p-4 rounded-2xl bg-white/[0.03] border border-white/5 transition-all hover:bg-white/[0.06] hover:translate-x-2">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-emerald-500/10 flex items-center justify-center border border-emerald-500/20">
                                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        <span class="text-sm font-semibold text-white/70">Closed won</span>
                                    </div>
                                    <span class="text-2xl font-serif text-emerald-400">08</span>
                                </div>
                            </div>

                            <div class="pt-6 relative">
                                <div class="h-32 w-full glass-panel flex items-end justify-between p-4 gap-2 border-dashed">
                                    <div class="flex-1 bg-brand-500/40 rounded-t-lg transition-all hover:bg-brand-500" style="height: 40%"></div>
                                    <div class="flex-1 bg-brand-500/60 rounded-t-lg transition-all hover:bg-brand-500" style="height: 70%"></div>
                                    <div class="flex-1 bg-brand-500/30 rounded-t-lg transition-all hover:bg-brand-500" style="height: 50%"></div>
                                    <div class="flex-1 bg-brand-500/80 rounded-t-lg transition-all hover:bg-brand-500" style="height: 90%"></div>
                                    <div class="flex-1 bg-brand-500/50 rounded-t-lg transition-all hover:bg-brand-500" style="height: 60%"></div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                     <div class="px-6 py-2 rounded-full glass-panel border-white/20 text-xs font-bold shadow-2xl">Daily Activity</div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Dots for extra "liquid" feel -->
                        <div class="absolute -top-6 -right-6 h-12 w-12 rounded-full bg-accent-pink/30 blur-xl animate-float"></div>
                        <div class="absolute -bottom-10 -left-10 h-20 w-20 rounded-full bg-brand-600/20 blur-2xl animate-float" style="animation-delay: 2s"></div>
                    </div>
                </div>
            </main>

            <footer class="py-12 border-t border-white/5 mt-auto">
                <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-white/20 text-[10px] uppercase tracking-[0.3em] font-bold">
                        &copy; {{ date('Y') }} Lead Management Suite &bull; All Rights Reserved
                    </div>
                    <div class="flex gap-8">
                        <a href="#" class="text-[10px] uppercase tracking-widest text-white/30 font-bold hover:text-white transition-colors">Privacy</a>
                        <a href="#" class="text-[10px] uppercase tracking-widest text-white/30 font-bold hover:text-white transition-colors">Terms</a>
                        <a href="#" class="text-[10px] uppercase tracking-widest text-white/30 font-bold hover:text-white transition-colors">Contact</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
