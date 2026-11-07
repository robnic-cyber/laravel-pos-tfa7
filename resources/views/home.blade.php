@extends('layouts.app', ['title' => 'Home'])
@section('content')
<section class="hero"><p class="muted">Point-of-sale administration</p><h1>Welcome to Laravel POS</h1><p>A small MVC laboratory application built with Laravel routes, controllers, and Blade views.</p><a class="button" href="{{ route('customers.index') }}">View customers</a><a class="button" href="{{ route('users.index') }}">View users</a></section>
@endsection
