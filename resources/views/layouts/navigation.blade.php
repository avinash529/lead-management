<nav x-data="{ open: false }" class="sticky top-4 z-50 mx-auto max-w-6xl w-[calc(100%-2rem)]">
    <div class="glass-panel !rounded-full border-white/10 shadow-2xl shadow-brand-900/20 px-6">
        <!-- Primary Navigation Menu -->
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center pr-6 border-r border-white/5">
                    <a href="{{ route('dashboard') }}" class="group transition-transform hover:scale-110">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white font-serif text-lg shadow-lg shadow-brand-600/20">
                            LM
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Overview') }}
                    </x-nav-link>
                    <x-nav-link :href="route('leads.index')" :active="request()->routeIs('leads.*')">
                        {{ __('Pipeline') }}
                    </x-nav-link>
                    @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.*')">
                            {{ __('Nexus') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 rounded-full border border-white/5 bg-white/5 px-4 py-2 text-[10px] font-bold uppercase tracking-widest text-white/50 hover:text-white hover:bg-white/10 transition-all active:scale-95 shadow-lg shadow-black/5">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-500 animate-pulse"></span>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1 opacity-40">
                                <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-white/5 bg-white/5 mb-1">
                            <p class="text-[9px] font-bold text-white/20 uppercase tracking-[0.2em] mb-0.5">Authorized Entity</p>
                            <p class="text-xs font-semibold text-white/60 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Identity Shield') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="!text-rose-400 hover:!bg-rose-500/10">
                                {{ __('Terminate Session') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-white/40 hover:text-white hover:bg-white/5 focus:outline-none focus:bg-white/10 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" 
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="hidden sm:hidden mt-2">
        <div class="glass-panel !rounded-3xl p-4 space-y-2 border-white/10 shadow-2xl">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Overview') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('leads.index')" :active="request()->routeIs('leads.*')">
                {{ __('Pipeline') }}
            </x-responsive-nav-link>
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.*')">
                    {{ __('Nexus Admin') }}
                </x-responsive-nav-link>
            @endif

            <div class="pt-4 border-t border-white/5">
                <div class="px-4 pb-4">
                    <p class="text-[9px] font-bold text-white/20 uppercase tracking-[0.2em] mb-1">Authenticated As</p>
                    <div class="text-sm font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-[10px] text-white/40 font-semibold">{{ Auth::user()->email }}</div>
                </div>

                <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">
                    {{ __('Identity Shield') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="!text-rose-400">
                        {{ __('Terminate Session') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
