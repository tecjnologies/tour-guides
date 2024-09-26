<!-- resources/views/admin/documents/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>ETGA Documents</h1>
        <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Add New Document</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>File Path</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->type }}</td>
                        <td>{{ $document->file_path }}</td>
                        <td>{{ $document->user_id }}</td>
                        <td>
                            <a href="{{ route('admin.etga.documents.edit', $document->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.etga.documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{ route('admin.etga.documents.show', $document->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
