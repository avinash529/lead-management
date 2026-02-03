@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Pipeline</p>
            <h1 class="text-3xl md:text-4xl">Leads</h1>
        </div>
        <a href="{{ route('leads.create') }}" class="btn btn-primary">Add Lead</a>
    </div>

    @if(session('success'))
        <div class="card px-5 py-4 text-sm text-emerald-800 bg-emerald-50/80 border-emerald-100">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="card px-5 py-4 text-sm text-rose-700 bg-rose-50/80 border-rose-100">
            {{ session('error') }}
        </div>
    @endif

    <div class="card p-5">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data" class="flex flex-wrap items-center gap-3">
                @csrf
                <input type="file" name="file" class="form-input max-w-xs" required>
                <button class="btn btn-secondary">Import Excel</button>
            </form>

            <a href="{{ route('leads.export') }}" class="btn btn-outline">
                Export Excel
            </a>
        </div>
    </div>

    @if(session('failed'))
        <div class="card px-5 py-4 text-sm text-amber-800 bg-amber-50/80 border-amber-100">
            <strong class="block text-xs uppercase tracking-[0.18em] text-amber-700 mb-2">Failed Rows</strong>
            <ul class="space-y-1">
                @foreach(session('failed') as $fail)
                    <li>Row {{ $fail['row'] }}: {{ $fail['error'] }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-5">
        <form method="GET" action="{{ route('leads.index') }}" class="grid gap-3 md:grid-cols-[1.4fr_0.9fr_auto] md:items-end">
            <div>
                <label class="form-label" for="lead-search">Search</label>
                <input id="lead-search" type="text" name="search" class="form-input"
                       placeholder="Search name, email or phone"
                       value="{{ request('search') }}">
            </div>

            <div>
                <label class="form-label" for="lead-status">Status</label>
                <select id="lead-status" name="status" class="form-select">
                    <option value="">All Status</option>
                    @foreach(['New','In Progress','Closed'] as $st)
                        <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                            {{ $st }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-wrap gap-2">
                <button class="btn btn-primary">Search</button>
                <a href="{{ route('leads.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>

    <form method="POST" action="{{ route('leads.bulkDelete') }}"
          onsubmit="return confirm('Delete selected leads?')"
          class="space-y-3">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
            Delete Selected
        </button>

        <div class="card p-5">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="select-all" class="rounded border-sand-300 text-ink-900 focus:ring-ink-700">
                            </th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" value="{{ $lead->id }}" class="row-check rounded border-sand-300 text-ink-900 focus:ring-ink-700">
                                </td>
                                <td class="text-ink-500">{{ $lead->id }}</td>
                                <td class="font-medium text-ink-900">{{ $lead->name }}</td>
                                <td class="text-ink-600">{{ $lead->email }}</td>
                                <td class="text-ink-600">{{ $lead->phone }}</td>
                                <td class="text-ink-700">{{ $lead->status }}</td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('leads.history', $lead) }}" class="btn btn-outline">History</a>
                                        <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Delete this lead?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-ink-500 py-6">No leads found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    {{ $leads->links() }}
</div>

<script>
document.getElementById('select-all')?.addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
});
</script>
@endsection
