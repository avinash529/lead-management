<x-app-layout>
    <div class="space-y-10">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Identity Matrix</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold">User Profile</h1>
            </div>
        </div>

        <div class="grid gap-8">
            <div class="glass-panel p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="glass-panel p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="glass-panel p-8 border-rose-500/10">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
