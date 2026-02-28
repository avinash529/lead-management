<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-white/10 bg-white/5 text-brand-500 shadow-sm focus:ring-brand-500 focus:ring-offset-0 transition-colors" name="remember">
                <span class="ms-3 text-sm font-bold uppercase tracking-widest text-white/40 group-hover:text-white/60 transition-colors">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-8 pt-6 border-t border-white/5">
            @if (Route::has('password.request'))
                <a class="text-xs font-bold uppercase tracking-widest text-white/30 hover:text-white transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Secure Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
