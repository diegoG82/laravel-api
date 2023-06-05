@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        {{ $project->slug }}
    </div>
    <p class="mt-4">{{ $project->content }}</p>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>

@endsection