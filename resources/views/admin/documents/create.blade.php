<!-- resources/views/admin/documents/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add New Document</h1>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="type">Document Type</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file_path" id="file_path" class="form-control" required>
            </div>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Save Document</button>
        </form>
    </div>
@endsection
