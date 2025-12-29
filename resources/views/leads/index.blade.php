@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h4>Leads</h4>
        <a href="{{ route('leads.create') }}" class="btn btn-primary">Add Lead</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Import / Export --}}
    <div class="mb-3 d-flex gap-2">
        <form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control" required>
                <button class="btn btn-info">Import Excel</button>
            </div>
        </form>

        <a href="{{ route('leads.export') }}" class="btn btn-success">
            Export Excel
        </a>
    </div>

    {{-- Failed rows --}}
    @if(session('failed'))
        <div class="alert alert-warning">
            <strong>Failed Rows:</strong>
            <ul class="mb-0">
                @foreach(session('failed') as $fail)
                    <li>Row {{ $fail['row'] }}: {{ $fail['error'] }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Search & Filter --}}
    <form method="GET" action="{{ route('leads.index') }}" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control"
                   placeholder="Search name, email or phone"
                   value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                @foreach(['New','In Progress','Closed'] as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>
                        {{ $st }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <button class="btn btn-secondary">Search</button>
            <a href="{{ route('leads.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{--  Bulk Delete Form (wraps table only) --}}
    <form method="POST" action="{{ route('leads.bulkDelete') }}"
          onsubmit="return confirm('Delete selected leads?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger mb-2">
            <i class="bi bi-trash"></i> Delete Selected
        </button>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $lead->id }}" class="row-check">
                        </td>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->status }}</td>
                        <td>
                            <a href="{{ route('leads.edit', $lead) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <a href="{{ route('leads.history', $lead) }}" class="btn btn-sm btn-info" title="History">
                                <i class="bi bi-clock-history"></i>
                            </a>

                            <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Delete this lead?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No leads found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </form>

    {{ $leads->links() }}
</div>

{{-- Select All Script --}}
<script>
document.getElementById('select-all')?.addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
});
</script>
@endsection
