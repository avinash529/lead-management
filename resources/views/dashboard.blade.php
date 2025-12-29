@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Dashboard</h4>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h6>Total Leads</h6>
                    <h2>{{ $total }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-info">
                <div class="card-body">
                    <h6>New</h6>
                    <h2>{{ $new }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h6>In Progress</h6>
                    <h2>{{ $inProgress }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h6>Closed</h6>
                    <h2>{{ $closed }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Recent Leads
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Leads by Status</div>
                    <div class="card-body">
                        <canvas id="statusDoughnut"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Leads Count</div>
                    <div class="card-body">
                        <canvas id="statusBar"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
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
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->status }}</td>
                        <td>{{ $lead->date_added }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No leads found</td>
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

    // Doughnut Chart
    new Chart(document.getElementById('statusDoughnut'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data
            }]
        }
    });

    // Bar Chart
    new Chart(document.getElementById('statusBar'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Leads',
                data: data
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