@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{$type->name}}</h1>
  
    <div class="text-center">
        <a href="{{ route('admin.typess.index') }}" class="btn btn-primary m-2">Turn Back</a>
    </div>
@endsection
