@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Add Lead</h4>

    <form method="POST" action="{{ route('leads.store') }}">
        @csrf

        @include('leads.partials.form', ['lead' => null])

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
