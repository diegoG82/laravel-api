@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center mt-4">EDIT TECHNOLOGY</h2>

        <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $technology->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary m-2">Turn Back</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
