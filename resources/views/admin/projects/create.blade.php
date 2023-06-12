@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center text-white mt-4">CREATE PROJECT</h2>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label text-white">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-white">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2">
                    <img id="image-preview" src="#" alt="Image Preview" class="img-fluid"
                        style="display: none; max-height: 200px;">
                </div>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label text-white">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type" class="text-white">Type</label>
                <select name="type_id" id="type" class="form-control">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="technologies" class="text-white mt-4">Technologies</label>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]"
                            id="technology{{ $technology->id }}" value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label text-white"
                            for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Turn Back</a>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection

<script>
    // Leggi il file selezionato e visualizza l'anteprima
    function readImage(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                let imagePreview = document.getElementById('image-preview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Aggiungi un listener all'input del file
    document.addEventListener('DOMContentLoaded', function() {
        let imageInput = document.getElementById('image');

        imageInput.addEventListener('change', function() {
            readImage(this);
        });
    });
</script>
