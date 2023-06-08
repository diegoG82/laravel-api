@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $technology->name }}</h1>

    <div class="text-center">
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary m-2">Turn Back</a>
    </div>
@endsection
