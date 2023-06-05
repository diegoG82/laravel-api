@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center mt-4">CREATE NEW PROJECT</h2>

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Content</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                    name="content" value="{{ old('content') }}">
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
