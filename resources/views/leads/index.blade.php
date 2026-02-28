@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <!-- Header -->
    <div class="flex flex-wrap items-center justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Pipeline Management</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold">Leads Pipeline</h1>
        </div>
        <a href="{{ route('leads.create') }}" class="btn btn-primary transition-all hover:scale-105">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Lead
        </a>
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

    <!-- Tools & Actions -->
    <div class="grid gap-6 lg:grid-cols-[1fr_auto]">
        <div class="glass-panel p-6">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data" class="flex flex-wrap items-center gap-4">
                    @csrf
                    <div class="relative group">
                        <input type="file" name="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required>
                        <div class="btn btn-secondary !px-4 !py-2.5 flex items-center gap-2">
                           <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                           <span class="text-xs">Choose Excel</span>
                        </div>
                    </div>
                    <button class="btn btn-primary !px-6 !py-2.5 text-xs font-bold uppercase tracking-wider">Import Pipeline</button>
                </form>

                <a href="{{ route('leads.export') }}" class="btn btn-secondary !px-6 !py-2.5 text-xs font-bold uppercase tracking-wider flex items-center gap-2">
                    <svg class="w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export All
                </a>
            </div>
        </div>

        @if(session('failed'))
            <div class="glass-panel p-6 border-amber-500/20 bg-amber-500/5">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-500/80">Import Faults</span>
                </div>
                <ul class="space-y-2 text-[10px] text-amber-500/60 max-h-24 overflow-y-auto pr-4 scrollbar-thin">
                    @foreach(session('failed') as $fail)
                        <li class="flex gap-2">
                            <span class="font-bold">Row {{ $fail['row'] }}:</span>
                            <span>{{ $fail['error'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Filters -->
    <div class="glass-panel p-8">
        <form method="GET" action="{{ route('leads.index') }}" class="grid gap-6 md:grid-cols-[1.4fr_0.8fr_auto] md:items-end">
            <div class="relative">
                <label class="form-label" for="lead-search">Direct Search</label>
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input id="lead-search" type="text" name="search" class="form-input !pl-12"
                           placeholder="Name, email, phone..."
                           value="{{ request('search') }}">
                </div>
            </div>

            <div>
                <label class="form-label" for="lead-status">Filter by Status</label>
                <select id="lead-status" name="status" class="form-select">
                    <option value="">All Statuses</option>
                    @foreach(['New','In Progress','Closed'] as $st)
                        <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                            {{ $st }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
                <button class="btn btn-primary !px-8">Analyze</button>
                <a href="{{ route('leads.index') }}" class="btn btn-secondary px-6">Reset</a>
            </div>
        </form>
    </div>

    <!-- Main Table -->
    <form method="POST" action="{{ route('leads.bulkDelete') }}"
          onsubmit="return confirm('Securely delete selected leads?')"
          class="space-y-6">
        @csrf
        @method('DELETE')

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button type="submit" class="btn btn-outline border-rose-500/20 text-rose-400 hover:bg-rose-500/10 hover:border-rose-500/40 !py-2 !px-4 text-xs font-bold uppercase tracking-wider">
                    Delete Selection
                </button>
                <div class="h-4 w-[1px] bg-white/5"></div>
                <div class="text-[10px] uppercase font-bold text-white/20 tracking-widest">
                    Showing {{ $leads->count() }} of {{ $leads->total() }} results
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="w-12 pl-6">
                            <input type="checkbox" id="select-all" class="w-4 h-4 rounded-md border-white/10 bg-white/5 text-brand-500 focus:ring-brand-500/20 transition-all cursor-pointer">
                        </th>
                        <th class="w-16">Lead ID</th>
                        <th>Lead Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Lead Status</th>
                        <th class="text-right pr-6">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr class="group transition-colors duration-500 hover:bg-white/[0.03]">
                            <td class="pl-6">
                                <input type="checkbox" name="ids[]" value="{{ $lead->id }}" class="row-check w-4 h-4 rounded-md border-white/10 bg-white/5 text-brand-500 focus:ring-brand-500/20 transition-all cursor-pointer">
                            </td>
                            <td class="text-[10px] font-bold text-white/20">#{{ str_pad($lead->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div class="flex flex-col">
                                    <span class="font-bold text-white group-hover:text-brand-400 transition-colors">{{ $lead->name }}</span>
                                    <span class="text-[10px] text-white/30 uppercase tracking-widest font-semibold">{{ $lead->date_added }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="text-xs text-white/70">{{ $lead->email }}</span>
                            </td>
                            <td>
                                <span class="text-xs text-white/50">{{ $lead->phone }}</span>
                            </td>
                            <td>
                                @php
                                    $statusClass = match(strtolower($lead->status)) {
                                        'new' => 'badge-neutral',
                                        'in progress' => 'badge-warning',
                                        'closed' => 'badge-success',
                                        default => 'badge-neutral'
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $lead->status }}</span>
                            </td>
                            <td class="text-right pr-6">
                                <div class="flex justify-end items-center gap-2">
                                    <a href="{{ route('leads.edit', $lead) }}" class="p-2 rounded-xl bg-white/5 border border-white/5 text-white/40 hover:text-white hover:bg-brand-600/20 hover:border-brand-600/30 transition-all" title="Modify">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <a href="{{ route('leads.history', $lead) }}" class="p-2 rounded-xl bg-white/5 border border-white/5 text-white/40 hover:text-white hover:bg-accent-cyan/20 hover:border-accent-cyan/30 transition-all" title="History">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </a>
                                    <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-xl bg-white/5 border border-white/5 text-white/20 hover:text-rose-400 hover:bg-rose-500/20 hover:border-rose-500/30 transition-all"
                                                onclick="return confirm('Confirm permanent deletion of this lead?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-white/20 py-16 italic">No pipeline members found in current selection.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-6">
            {{ $leads->links() }}
        </div>
    </form>
</div>

<script>
document.getElementById('select-all')?.addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => {
        cb.checked = this.checked;
        cb.dispatchEvent(new Event('change'));
    });
});
</script>
@endsection
