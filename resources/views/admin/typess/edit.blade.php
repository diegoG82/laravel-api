@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Edit Type: {{ $type->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.typess.update', $type->slug) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $type->name) }}" class="form-control">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.typess.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
