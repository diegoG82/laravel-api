    @extends('layouts.admin')

    @section('content')
        <div class="container-fluid">
            <h2 class="text-center mt-4 text-white">CREATE NEW PROJECT</h2>

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label text-white">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
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
                    <select name="type_id" id="type" class="form-control ">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                {{-- Versione con la selezione a cascata e pluck --}}
                {{-- <div class="form-group">
                    <label for="technologies">Technologies</label>
                    <select name="technologies[]" id="technologies" class="form-control" multiple>
                        @foreach ($technologies as $technology)
                            <option value="{{ $technology->id }}" {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $technology->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- Versione con checkbox --}}
                <div class="form-group text-white   ">
                    <label for="technologies">Technologies</label>
                    @foreach ($technologies as $technology)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="technologies[]"
                                id="technology{{ $technology->id }}" value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>


                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    @endsection
