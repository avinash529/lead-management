@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
                <span class="h-1.5 w-1.5 rounded-full bg-accent-indigo"></span>
                <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Temporal Audit</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold">Timeline History</h1>
            <p class="text-sm text-white/50 mt-2 flex items-center gap-2">
                <span class="font-bold text-brand-400">{{ $lead->name }}</span>
                <span class="h-1 w-1 rounded-full bg-white/10"></span>
                <span>Active Matrix Trail</span>
            </p>
        </div>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary !px-8 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Pipeline
        </a>
    </div>

    <!-- History Table -->
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th class="pl-8">Event</th>
                    <th>Old Status</th>
                    <th>New Status</th>
                    <th>Authorized By</th>
                    <th class="pr-8 text-right">Timestamp</th>
                </tr>
            </thead>
            <tbody>
            @forelse($histories as $i => $h)
                <tr class="group transition-colors duration-500 hover:bg-white/[0.03]">
                    <td class="pl-8">
                        <span class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Update #{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        @if($h->old_status)
                            @php
                                $oldClass = match(strtolower($h->old_status)) {
                                    'new' => 'badge-neutral',
                                    'in progress' => 'badge-warning',
                                    'closed' => 'badge-success',
                                    default => 'badge-neutral'
                                };
                            @endphp
                            <span class="badge {{ $oldClass }} scale-90 opacity-40">{{ $h->old_status }}</span>
                        @else
                            <span class="text-white/10 italic text-xs">Origin Entry</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $newClass = match(strtolower($h->new_status)) {
                                'new' => 'badge-neutral',
                                'in progress' => 'badge-warning',
                                'closed' => 'badge-success',
                                default => 'badge-neutral'
                            };
                        @endphp
                        <span class="badge {{ $newClass }}">{{ $h->new_status }}</span>
                    </td>
                    <td>
                        <div class="flex items-center gap-2">
                            <div class="h-6 w-6 rounded-lg bg-white/5 flex items-center justify-center border border-white/5 text-[10px] font-bold text-white/40">
                                {{ strtoupper(substr($h->user->name ?? 'S', 0, 1)) }}
                            </div>
                            <span class="text-xs font-semibold text-white/60">{{ $h->user->name ?? 'Core System' }}</span>
                        </div>
                    </td>
                    <td class="pr-8 text-right">
                        <span class="text-[10px] font-bold text-white/30 uppercase tracking-widest">{{ $h->changed_at }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-white/20 py-20 italic">No temporal fragments detected for this lead.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
