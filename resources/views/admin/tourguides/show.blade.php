<!-- resources/views/admin/tour_guides/show.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tour Guide Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $tourGuide->id }}</p>
            <p><strong>Name:</strong> {{ $tourGuide->name }}</p>
            <p><strong>License ID:</strong> {{ $tourGuide->license_id }}</p>
            <p><strong>Hourly Price:</strong> ${{ number_format($tourGuide->hourly_price, 2) }}</p>
            <p><strong>Country:</strong> {{ $tourGuide->country }}</p>
            <p><strong>Nationality:</strong> {{ $tourGuide->nationality }}</p>
            <p><strong>Verified:</strong> {{ $tourGuide->verified ? 'Yes' : 'No' }}</p>
            <p><strong>Approved:</strong> {{ $tourGuide->approved ? 'Yes' : 'No' }}</p>
            <p><strong>Suspended:</strong> {{ $tourGuide->suspended ? 'Yes' : 'No' }}</p>
            <a href="{{ route('tourguides.edit', $tourGuide->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('tourguides.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
