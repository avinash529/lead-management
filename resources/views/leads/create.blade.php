@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-10">
    <div class="text-center space-y-2">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 mb-2">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="text-[10px] uppercase tracking-widest font-bold text-white/40">Creation Terminal</span>
        </div>
        <h1 class="text-4xl font-bold">Add Lead</h1>
    </div>

    <form method="POST" action="{{ route('leads.store') }}" class="glass-panel p-10 space-y-10">
        @csrf

        @include('leads.partials.form', ['lead' => null])

        <div class="flex items-center justify-between pt-6 border-t border-white/5">
            <a href="{{ route('leads.index') }}" class="text-sm font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">Cancel</a>
            <button class="btn btn-primary !px-10 !py-4 shadow-xl shadow-brand-500/20">Create Lead</button>
        </div>
    </form>
</div>
@endsection
