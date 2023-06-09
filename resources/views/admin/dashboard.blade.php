@extends ('layouts.admin' )

@section('content')
    <h1 class="text-center mt-4">Benvenuto, {{ Auth::user()->name }} !!!</h1>
@endsection
