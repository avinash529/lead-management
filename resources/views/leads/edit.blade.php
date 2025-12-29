@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Lead</h4>

    <form method="POST" action="{{ route('leads.update', $lead) }}">
        @csrf
        @method('PUT')

        @include('leads.partials.form', ['lead' => $lead])

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
