@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <h1 class="text-center mt-2 text-danger">PROJECT LIST</h1>
    <div class="text-center m-4">
        <a class="btn btn-success text-center" href="{{ route('admin.projects.create') }}">NEW PROJECT</a>
    </div>



    <table class="table">
        <thead class="text-danger">
            <tr>
                <th scope="col" class="col-2">ID</th>
                <th scope="col" class="col-2">TITLE</th>
                <th scope="col" class="col-2">SLUG</th>
                <th scope="col" class="col-5">CONTENT</th>
                <th scope="col" class="col-5">TYPE</th>
                <th scope="col" class="col-5">TECH</th>
                <th scope="col " class="col-5">ACTION</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td class="text-success">{{ $project->title }}</td>
                    <td class="text-success">{{ $project->slug }}</td>
                    <td>{{ $project->content }}</td>
                    <td class="text-warning">{{ $project->type->name ?? 'N/A' }}</td>

                    <td class="text-primary">
                        @foreach ($project->technologies as $technology)
                            {{ $technology->name }}
                        @endforeach
                    </td>

                <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success m-2">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning m-2" href="{{ route('admin.projects.edit', $project->slug) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-delete m-2  " onclick="return confirmDelete()">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- Script for delete popup --}}
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Project?');
        }
    </script>
@endsection
