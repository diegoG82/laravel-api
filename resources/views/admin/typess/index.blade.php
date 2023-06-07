@extends('layouts.admin')

@section('content')
    <h1 class="text-center">TYPES</h1>

    {{-- <ul>
        @foreach ($type as $item)
            <li>{{ $item->name }} <a href="{{ route('admin.typess.show', $item->slug) }}" class="btn btn-success">
               <i class="fa-solid fa-eye"></i>
           </a></li>
        @endforeach
    </ul> --}}

    <table class="table">
     <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Slug</th>
             <th>Actions</th>
         </tr>
     </thead>
     <tbody>
         @foreach ($types as $type)
         <tr>
             <td>{{ $type->id }}</td>
             <td>{{ $type->name }}</td>
             <td>{{ $type->slug }}</td>
             <td>
                 <a href="{{ route('admin.typess.show', $type->slug) }}" class="btn btn-primary">Show</a>
                 <a href="{{ route('admin.typess.edit', $type->slug) }}" class="btn btn-warning">Edit</a>
                 <form class="d-inline-block" action="{{ route('admin.typess.destroy', $type->slug) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete()">
                      Delete
                    </button>
                </form>
                 <!-- Add delete button if needed -->
             </td>
         </tr>
         @endforeach
     </tbody>
 </table>
  {{-- Script for delete popup --}}
  <script>
     function confirmDelete() {
         return confirm('Are you sure you want to delete this Type?');
     }
 </script>
 
@endsection
