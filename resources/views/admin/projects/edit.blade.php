@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center mt-4">EDIT PROJECT</h2>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Slug</label>
                <textarea class="form-control @error('slug') is-invalid @enderror" name="slug" id="description" rows="3">{{ old('slug', $project->slug) }}</textarea>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Content</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{ old('content', $project->content) }}">
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection