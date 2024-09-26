<!-- resources/views/admin/tour_guides/create.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add New Tour Guide</h1>
    <form action="{{ route('tourguides.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="license_id">License ID</label>
            <input type="text" name="license_id" id="license_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hourly_price">Hourly Price</label>
            <input type="number" name="hourly_price" id="hourly_price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="verified">Verified</label>
            <input type="checkbox" name="verified" id="verified" value="1">
        </div>
        <div class="form-group">
            <label for="approved">Approved</label>
            <input type="checkbox" name="approved" id="approved" value="1">
        </div>
        <div class="form-group">
            <label for="suspended">Suspended</label>
            <input type="checkbox" name="suspended" id="suspended" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
