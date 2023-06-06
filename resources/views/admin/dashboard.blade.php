@extends ('layouts.admin' )

@section('content')
    <h1 class="text-center mt-4">{{ Auth::user()->name }}, benvenuto!</h1>
@endsection
