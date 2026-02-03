@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Pipeline</p>
            <h1 class="text-3xl md:text-4xl">History</h1>
            <p class="text-sm text-ink-600 mt-1">Lead: {{ $lead->name }}</p>
        </div>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card p-5">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Old Status</th>
                        <th>New Status</th>
                        <th>Changed By</th>
                        <th>Changed At</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($histories as $i => $h)
                    <tr>
                        <td class="text-ink-500">{{ $i + 1 }}</td>
                        <td class="text-ink-600">{{ $h->old_status ?? '-' }}</td>
                        <td class="text-ink-900 font-medium">{{ $h->new_status }}</td>
                        <td class="text-ink-600">{{ $h->user->name ?? 'System' }}</td>
                        <td class="text-ink-600">{{ $h->changed_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-ink-500 py-6">No history found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
