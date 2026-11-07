@extends('layouts.app', ['title' => 'Add User'])
@section('content')<div class="page-head"><div><h1>Add user</h1><p class="muted">Create an account with a unique username.</p></div></div><div class="panel"><form method="POST" action="{{ route('users.store') }}">@csrf @include('users._form', ['submitLabel' => 'Create user', 'showAvatar' => false])</form></div>@endsection
