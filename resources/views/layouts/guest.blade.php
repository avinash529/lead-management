<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lead Management') }}</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Calistoga&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="page-shell font-sans text-white/90 selection:bg-brand-500/30 overflow-x-hidden">
        <!-- Mesh Background Elements -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-brand-600/20 blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-accent-cyan/10 blur-[120px] animate-pulse" style="animation-delay: 2s"></div>
            <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] rounded-full bg-accent-indigo/10 blur-[100px] animate-pulse" style="animation-delay: 4s"></div>
        </div>

        <div class="min-h-screen flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-5xl grid gap-16 lg:grid-cols-[1.1fr_1fr] items-center">
                <div class="space-y-8 animate-fade-in-up">
                    <a href="/" class="inline-flex items-center gap-3 group transition-transform hover:scale-105">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-600 text-white font-serif text-xl shadow-lg shadow-brand-600/20">
                            LM
                        </span>
                        <div class="leading-tight">
                            <span class="block text-lg font-bold tracking-tight text-white">Lead Management</span>
                            <span class="block text-[10px] uppercase tracking-widest text-white/40 font-semibold">The New Standard</span>
                        </div>
                    </a>

                    <h1 class="text-4xl md:text-5xl leading-[1.1] font-bold tracking-tight">
                        Craft an elegant, <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-accent-cyan">focused workflow</span> for every lead.
                    </h1>
                    
                    <p class="text-lg text-white/50 leading-relaxed max-w-md">
                        Experience the clarity of liquid precision. Manage your pipeline with an interface designed for modern efficiency.
                    </p>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="glass-card p-4 flex items-center gap-3 border-white/5 bg-white/[0.02]">
                            <div class="h-8 w-8 rounded-xl bg-brand-500/10 flex items-center justify-center border border-brand-500/20">
                                <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-white/60">Fast Ingestion</span>
                        </div>
                        <div class="glass-card p-4 flex items-center gap-3 border-white/5 bg-white/[0.02]">
                            <div class="h-8 w-8 rounded-xl bg-accent-cyan/10 flex items-center justify-center border border-accent-cyan/20">
                                <svg class="w-4 h-4 text-accent-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-white/60">Fluid Audit</span>
                        </div>
                    </div>
                </div>

                <div class="glass-panel p-8 md:p-12 relative overflow-hidden group">
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-brand-600/10 rounded-full blur-3xl group-hover:bg-brand-600/20 transition-colors duration-700"></div>
                    <div class="relative z-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
