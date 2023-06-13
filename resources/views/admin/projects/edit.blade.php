@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-center text-white mt-4">EDIT PROJECT</h2>

        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="title" class="form-label text-white">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label text-white">Current image</label>
                @if ($project->image)
                    <div class="w-25 mx-auto mt-4">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid" id="image-preview">
                    </div>
                @else
                    <div class="text-muted">No existing image</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="new_image" class="form-label text-white">New Image</label>
                <input type="file" class="form-control" id="new_image" name="new_image">
            </div>




            <div class="mb-3">
                <label for="content" class="form-label text-white">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="type" class="text-white">Type</label>
                <select name="type_id" id="type" class="form-control ">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
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
                            {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label class="form-check-label text-white"
                            for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

    </div>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2">Turn Back</a>
    <button type="submit" class="btn btn-warning">Update</button>
    </form>
    </div>
@endsection

<script>
    // read file and show preview
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

   // add eventlistener to file preview
    document.addEventListener('DOMContentLoaded', function() {
        let imageInput = document.getElementById('new_image');

        imageInput.addEventListener('change', function() {
            readImage(this);
        });
    });
</script>
