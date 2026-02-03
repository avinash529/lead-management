@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Administration</p>
        <h1 class="text-3xl md:text-4xl">User Management</h1>
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
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="text-ink-500">{{ $user->id }}</td>
                            <td class="font-medium text-ink-900">{{ $user->name }}</td>
                            <td class="text-ink-600">{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'badge-success' : 'badge-neutral' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="btn btn-secondary" title="Edit Role">
                                    Edit Role
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-ink-500 py-6">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $users->links() }}
</div>
@endsection
