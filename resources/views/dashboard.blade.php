@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Overview</p>
            <h1 class="text-3xl md:text-4xl">Dashboard</h1>
        </div>
        <div class="inline-flex items-center gap-2 rounded-full border border-sand-200 bg-white/70 px-4 py-2 text-xs text-ink-600">
            Pipeline status snapshot
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="card p-5">
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Total Leads</p>
            <div class="mt-4 flex items-end justify-between">
                <span class="text-3xl font-serif">{{ $total }}</span>
                <span class="text-xs text-ink-500">All time</span>
            </div>
        </div>
        <div class="card p-5">
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">New</p>
            <div class="mt-4 flex items-end justify-between">
                <span class="text-3xl font-serif text-copper-600">{{ $new }}</span>
                <span class="text-xs text-ink-500">Recently added</span>
            </div>
        </div>
        <div class="card p-5">
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">In Progress</p>
            <div class="mt-4 flex items-end justify-between">
                <span class="text-3xl font-serif text-sage-700">{{ $inProgress }}</span>
                <span class="text-xs text-ink-500">Active deals</span>
            </div>
        </div>
        <div class="card p-5">
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Closed</p>
            <div class="mt-4 flex items-end justify-between">
                <span class="text-3xl font-serif text-ink-900">{{ $closed }}</span>
                <span class="text-xs text-ink-500">Completed</span>
            </div>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="card">
            <div class="card-header">Leads by Status</div>
            <div class="card-body pt-2">
                <canvas id="statusDoughnut" height="220"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Leads Count</div>
            <div class="card-body pt-2">
                <canvas id="statusBar" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Recent Leads</div>
        <div class="card-body pt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Added</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentLeads as $lead)
                    <tr>
                        <td class="font-medium text-ink-900">{{ $lead->name }}</td>
                        <td class="text-ink-600">{{ $lead->email }}</td>
                        <td class="text-ink-700">{{ $lead->status }}</td>
                        <td class="text-ink-600">{{ $lead->date_added }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-ink-500 py-6">No leads found</td>
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
    const palette = ['#b36639', '#5f726d', '#1f2937'];

    if (window.Chart) {
        Chart.defaults.color = '#4b5563';
        Chart.defaults.font.family = 'IBM Plex Sans, ui-sans-serif, system-ui, -apple-system';
    }

    new Chart(document.getElementById('statusDoughnut'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: palette,
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { boxWidth: 12, usePointStyle: true }
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
                backgroundColor: palette[1],
                borderRadius: 8
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
});
</script>
@endsection
