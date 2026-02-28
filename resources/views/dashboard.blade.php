@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <div class="flex flex-wrap items-center justify-between gap-6">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Real-time Analytics</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold">Workspace Overview</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('leads.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Lead
            </a>
        </div>
    </div>

    <!-- Stat Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <div class="glass-card p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="h-10 w-10 rounded-2xl bg-brand-500/10 flex items-center justify-center border border-brand-500/20 group-hover:bg-brand-500/20 transition-colors">
                    <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div class="text-[10px] font-bold text-white/20 uppercase tracking-widest">Growth +{{ round(($new / max(1, $total)) * 100) }}%</div>
            </div>
            <h3 class="text-[10px] font-bold uppercase tracking-widest text-white/40 mb-1">Total Leads</h3>
            <div class="text-4xl font-bold font-serif">{{ $total }}</div>
        </div>

        <div class="glass-card p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="h-10 w-10 rounded-2xl bg-accent-cyan/10 flex items-center justify-center border border-accent-cyan/20 group-hover:bg-accent-cyan/20 transition-colors">
                    <svg class="w-5 h-5 text-accent-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span class="block h-2 w-2 rounded-full bg-brand-500 animate-pulse"></span>
            </div>
            <h3 class="text-[10px] font-bold uppercase tracking-widest text-white/40 mb-1">New Leads</h3>
            <div class="text-4xl font-bold font-serif text-brand-400">{{ $new }}</div>
        </div>

        <div class="glass-card p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="h-10 w-10 rounded-2xl bg-accent-indigo/10 flex items-center justify-center border border-accent-indigo/20 group-hover:bg-accent-indigo/20 transition-colors">
                    <svg class="w-5 h-5 text-accent-indigo" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
            <h3 class="text-[10px] font-bold uppercase tracking-widest text-white/40 mb-1">In Progress</h3>
            <div class="text-4xl font-bold font-serif text-accent-cyan">{{ $inProgress }}</div>
        </div>

        <div class="glass-card p-6 group">
            <div class="flex items-center justify-between mb-4">
                <div class="h-10 w-10 rounded-2xl bg-emerald-500/10 flex items-center justify-center border border-emerald-500/20 group-hover:bg-emerald-500/20 transition-colors">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>
            <h3 class="text-[10px] font-bold uppercase tracking-widest text-white/40 mb-1">Closed</h3>
            <div class="text-4xl font-bold font-serif text-emerald-400">{{ $closed }}</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="glass-card p-8">
            <h3 class="text-sm font-bold text-white/60 mb-8 border-b border-white/5 pb-4">Pipeline Distribution</h3>
            <div class="h-[280px] relative">
                <canvas id="statusDoughnut"></canvas>
            </div>
        </div>
        <div class="glass-card p-8">
            <h3 class="text-sm font-bold text-white/60 mb-8 border-b border-white/5 pb-4">Lead Velocity</h3>
            <div class="h-[280px] relative">
                <canvas id="statusBar"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="glass-card">
        <div class="px-8 py-6 border-b border-white/5 flex items-center justify-between">
            <h3 class="text-sm font-bold text-white/60">Recent Activity</h3>
            <a href="{{ route('leads.index') }}" class="text-[10px] font-bold uppercase tracking-widest text-brand-400 hover:text-brand-300 transition-colors">View All</a>
        </div>
        <div class="p-0 table-container border-none rounded-none !bg-transparent">
            <table class="table">
                <thead>
                    <tr>
                        <th class="pl-8">Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="pr-8 text-right">Added</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentLeads as $lead)
                    <tr class="group transition-colors duration-500 hover:bg-white/[0.03]">
                        <td class="pl-8 font-bold text-white group-hover:text-brand-400 transition-colors">{{ $lead->name }}</td>
                        <td class="text-white/40">{{ $lead->email }}</td>
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
                        <td class="pr-8 text-right text-white/30 font-medium text-xs">{{ $lead->date_added }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-white/20 py-12 italic">No recent activity detected</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const labels = @json($chartLabels);
    const data = @json($chartData);
    
    // Liquid Palette
    const palette = [
        'rgba(139, 92, 246, 0.8)', // Violet
        'rgba(34, 211, 238, 0.8)', // Cyan
        'rgba(99, 102, 241, 0.8)', // Indigo
        'rgba(16, 185, 129, 0.8)'  // Emerald
    ];

    if (window.Chart) {
        Chart.defaults.color = 'rgba(255, 255, 255, 0.4)';
        Chart.defaults.font.family = '"Inter", sans-serif';
        Chart.defaults.font.weight = 'bold';
    }

    new Chart(document.getElementById('statusDoughnut'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: palette,
                borderColor: 'rgba(255, 255, 255, 0.05)',
                borderWidth: 2,
                hoverOffset: 15,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 8,
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 10 }
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('statusBar'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Leads',
                data: data,
                backgroundColor: 'rgba(139, 92, 246, 0.3)',
                borderColor: 'rgba(139, 92, 246, 0.8)',
                borderWidth: 1,
                borderRadius: 12,
                hoverBackgroundColor: 'rgba(139, 92, 246, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: true, 
                    ticks: { precision: 0 },
                    grid: { color: 'rgba(255, 255, 255, 0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
});
</script>
@endsection
