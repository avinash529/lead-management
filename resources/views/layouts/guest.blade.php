<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lead Management') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=ibm-plex-sans:400,500,600,700&family=fraunces:400,500,600,700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="page-shell font-sans">
        <div class="min-h-screen flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-5xl grid gap-10 lg:grid-cols-[1.1fr_1fr] items-center">
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 rounded-full border border-sand-200 bg-white/70 px-3 py-1 text-xs uppercase tracking-[0.18em] text-ink-600">
                        Lead Management
                    </div>
                    <h1 class="text-3xl md:text-4xl leading-tight">
                        Craft an elegant, focused workflow for every lead.
                    </h1>
                    <p class="text-base text-ink-600">
                        Keep every stage of your pipeline calm and clear. Monitor progress, record history, and move deals forward with confidence.
                    </p>
                    <div class="flex flex-wrap gap-3 text-sm text-ink-600">
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-copper-500"></span>
                            Focused pipeline views
                        </span>
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-sage-500"></span>
                            Clean audit trails
                        </span>
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-ink-700"></span>
                            Elegant reporting
                        </span>
                    </div>
                </div>

                <div class="card p-6 md:p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
