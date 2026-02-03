@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Administration</p>
        <h1 class="text-3xl md:text-4xl">Edit User Role</h1>
    </div>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="card p-6 space-y-5">
        @csrf
        @method('PUT')

        <div class="space-y-2">
            <label class="form-label">Name</label>
            <input type="text" class="form-input" value="{{ $user->name }}" disabled>
        </div>

        <div class="space-y-2">
            <label class="form-label">Email</label>
            <input type="text" class="form-input" value="{{ $user->email }}" disabled>
        </div>

        <div class="space-y-2">
            <label class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="flex flex-wrap gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
