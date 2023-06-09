@extends('layouts.admin')

@section('content')
    <h1 class="text-center">TECHNOLOGIES</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-center m-4">
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-outline-success">Create New Technology</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->slug }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline-block" action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete()">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Script for delete popup --}}
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Technology?');
        }
    </script>
@endsection
