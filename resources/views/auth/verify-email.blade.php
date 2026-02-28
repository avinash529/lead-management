<x-guest-layout>
    <div class="mb-6 text-sm text-white/50 leading-relaxed">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 font-bold text-[10px] uppercase tracking-widest text-emerald-400 flex items-center gap-2">
            <span class="h-1 w-1 rounded-full bg-emerald-400"></span>
            {{ __('A new verification link has been sent to your email.') }}
        </div>
    @endif

    <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-xs font-bold uppercase tracking-widest text-white/30 hover:text-white transition-colors">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
