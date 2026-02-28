@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Nexus Control</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold">User Management</h1>
        </div>
    </div>

    <!-- Status Messages -->
    @if(session('success'))
        <div class="glass-panel px-6 py-4 flex items-center gap-3 border-emerald-500/20 bg-emerald-500/5 animate-fade-in text-emerald-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="glass-panel px-6 py-4 flex items-center gap-3 border-rose-500/20 bg-rose-500/5 animate-fade-in text-rose-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-sm font-semibold">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Users Table -->
    <div class="table-container shadow-xl shadow-brand-500/5">
        <table class="table">
            <thead>
                <tr>
                    <th class="pl-8">Entity ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Nexus Role</th>
                    <th class="pr-8 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="group transition-colors duration-500 hover:bg-white/[0.03]">
                        <td class="pl-8">
                            <span class="text-[10px] font-bold text-white/20 uppercase tracking-widest">UID-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="h-8 w-8 rounded-xl bg-white/5 flex items-center justify-center border border-white/10 text-xs font-bold text-brand-400 group-hover:scale-110 group-hover:bg-brand-500 group-hover:text-white transition-all duration-500">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-white/80 group-hover:text-white transition-colors">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs text-white/50 group-hover:text-white/70 transition-colors">{{ $user->email }}</span>
                        </td>
                        <td>
                            @php
                                $roleClass = $user->role === 'admin' ? 'badge-success' : 'badge-neutral';
                            @endphp
                            <span class="badge {{ $roleClass }} scale-90 group-hover:scale-100 transition-transform duration-500">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="pr-8 text-right">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="inline-flex h-8 px-4 items-center justify-center rounded-lg border border-white/5 bg-white/5 text-[10px] font-bold uppercase tracking-widest text-white/40 hover:bg-brand-500 hover:text-white hover:border-brand-500 transition-all active:scale-95" title="Modify Permissions">
                                Modify Role
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-white/20 py-20 italic">No user entities detected in the nexus.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div class="glass-panel p-4 flex justify-center">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
