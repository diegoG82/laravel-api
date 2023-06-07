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
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                    name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type_id" id="type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                
            </div>
            

            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
