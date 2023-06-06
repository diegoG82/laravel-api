@extends('layouts.admin')

@section('content')
    <h1 class="text-center mb-4">{{ $project->title }}</h1>
    <div class="text-center ">
        {{ $project->slug }}
    </div>
    <p class="mt-4">{{ $project->content }}</p>
    <div class="text-center">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary m-2  ">Turn Back</a>
    </div>
@endsection
