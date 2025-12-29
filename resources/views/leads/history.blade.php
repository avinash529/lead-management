@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">History for: {{ $lead->name }}</h4>

    <a href="{{ route('leads.index') }}" class="btn btn-secondary mb-3">Back</a>

    <table class="table table-bordered table-striped">
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
                <td>{{ $i + 1 }}</td>
                <td>{{ $h->old_status ?? '-' }}</td>
                <td>{{ $h->new_status }}</td>
                <td>{{ $h->user->name ?? 'System' }}</td>
                <td>{{ $h->changed_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No history found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
