@extends('layouts.admin')

@section('content')
    <h1 class="text-center">La lista dei Progetti</h1>
    <div class="text-center m-4">
        <a class="btn btn-success text-center" href="{{ route('admin.projects.create') }}">NEW PROJECT</a>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->content }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->id) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete()">
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
            return confirm('Are you sure you want to delete this comic?');
        }
    </script>
@endsection
