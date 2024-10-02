<!-- resources/views/admin/tour_guides/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Tour Guides</h1>
    <a href="{{ route('tourguides.create') }}" class="btn btn-primary mb-3">Add New Tour Guide</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>License ID</th>
                <th>Hourly Price</th>
                <th>Country</th>
                <th>Nationality</th>
                <th>Verified</th>
                <th>Approved</th>
                <th>Suspended</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tourGuides as $tourGuide)
            <tr>
                <td>{{ $tourGuide->id }}</td>
                <td>{{ $tourGuide->name }}</td>
                <td>{{ $tourGuide->license_id }}</td>
                <td>${{ number_format($tourGuide->hourly_price, 2) }}</td>
                <td>{{ $tourGuide->country }}</td>
                <td>{{ $tourGuide->nationality }}</td>
                <td>{{ $tourGuide->verified ? 'Yes' : 'No' }}</td>
                <td>{{ $tourGuide->approved ? 'Yes' : 'No' }}</td>
                <td>{{ $tourGuide->suspended ? 'Yes' : 'No' }}</td>
                <td>
                   
                    <a href="{{ route('tourguides.edit', $tourGuide->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tourguides.destroy', $tourGuide->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection





