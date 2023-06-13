@extends('layouts.admin')

@section('content')
    <div class="container show_proj">
        <h1 class="text-center mb-4 text-danger">{{ $project->title }}</h1>
        <div class="text-center text-success">
            {{ $project->slug }}
        </div>

        @if ($project->image)
            <div class="w-25     mx-auto mt-4">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
            </div>
        @else
            <div class="p-5 bg-secondary text-white">
                NO IMAGE
            </div>
        @endif

        <p class="mt-4 text-center text-success">{{ $project->content }}</p>
        <p class="mt-4  text-center">
            <span class="text-danger">PROJECT TYPE:</span> <span
                class="text-warning">{{ $project->type ? $project->type->name : 'No type available' }}</span>
        </p>
        <div class="text-center techs">
            <p class="text-center text-danger">TECHNOLOGIES:</p>
            <ul class="list-group">

                @forelse ($project->technologies as $technology)
                    <li class="list-group-item text-primary">{{ $technology->name }}</li>
                @empty
                    <li class="list-group-item">Nessun tag presente</li>
                @endforelse
            </ul>

        </div>

        <div class="text-center">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-success m-2  ">Turn Back</a>
        </div>
    </div>
@endsection
