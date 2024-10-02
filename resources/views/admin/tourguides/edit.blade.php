<!-- resources/views/admin/tour_guides/edit.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1>Edit Tour Guide</h1>
   
    <?php 
   // dd($tourGuide);
    ?>
    <form action="{{ route('tourguides.update', ['tourguide' => $tourGuide->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $tourGuide->name }}" required>
        </div>
        <div class="form-group">
            <label for="license_id">License ID</label>
            <input type="text" name="license_id" id="license_id" class="form-control" value="{{ $tourGuide->license_id }}" required>
        </div>
        <div class="form-group">
            <label for="hourly_price">Hourly Price</label>
            <input type="number" name="hourly_price" id="hourly_price" class="form-control" step="0.01" value="{{ $tourGuide->hourly_price }}" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" id="country" class="form-control" value="{{ $tourGuide->country }}" required>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $tourGuide->nationality }}" required>
        </div>
        <div class="form-group">
            <label for="verified">Verified</label>
            <input type="checkbox" name="verified" id="verified" value="1" {{ $tourGuide->verified ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="approved">Approved</label>
            <input type="checkbox" name="approved" id="approved" value="1" {{ $tourGuide->approved ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="suspended">Suspended</label>
            <input type="checkbox" name="suspended" id="suspended" value="1" {{ $tourGuide->suspended ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
