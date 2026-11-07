@extends('layouts.app', ['title' => 'About'])
@section('content')
<h1>About the application</h1><p>This POS application demonstrates the Laravel MVC pattern. Routes select controller methods, controllers prepare data, and Blade views render the response.</p><p class="muted">The account lists currently use static PHP arrays as temporary data sources.</p>
@endsection
