@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <p class="text-xs uppercase tracking-[0.18em] text-ink-500">Pipeline</p>
        <h1 class="text-3xl md:text-4xl">Add Lead</h1>
    </div>

    <form method="POST" action="{{ route('leads.store') }}" class="card p-6 space-y-6">
        @csrf

        <div class="grid gap-5">
            @include('leads.partials.form', ['lead' => null])
        </div>

        <div class="flex flex-wrap gap-2">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
