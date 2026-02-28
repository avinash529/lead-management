@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-10">
    <div class="text-center space-y-2">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
            <span class="h-1.5 w-1.5 rounded-full bg-accent-indigo"></span>
            <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Permission Override</span>
        </div>
        <h1 class="text-4xl font-bold">Edit User Role</h1>
    </div>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="glass-panel p-10 space-y-10">
        @csrf
        @method('PUT')

        <div class="space-y-8">
            <div class="space-y-2 group opacity-60">
                <label class="form-label !text-white/40">Entity Name</label>
                <input type="text" class="form-input !cursor-not-allowed" value="{{ $user->name }}" disabled>
            </div>

            <div class="space-y-2 group opacity-60">
                <label class="form-label !text-white/40">Security Identifier</label>
                <input type="text" class="form-input !cursor-not-allowed" value="{{ $user->email }}" disabled>
            </div>

            <div class="space-y-2 group">
                <label class="form-label !text-white/40 group-focus-within:!text-brand-400 transition-colors">Access Level</label>
                <select name="role" class="form-select">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User (Standard Access)</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin (Nexus Control)</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-white/5">
            <a href="{{ route('admin.users.index') }}" class="text-sm font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">Cancel</a>
            <button class="btn btn-primary !px-10 !py-4 shadow-xl shadow-brand-500/20">Sync Permissions</button>
        </div>
    </form>
</div>
@endsection
