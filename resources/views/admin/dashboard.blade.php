@extends ('layouts.admin' )

@section('content')
    <h1 class="text-center mt-4">Benvenuto, {{ Auth::user()->name }} !!!</h1>
    <div class="container dash_main mt-4">

    </div>
@endsection
