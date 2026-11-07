@extends('layouts.app', ['title' => 'Users'])
@section('content')
<div class="page-head"><div><h1>User Accounts</h1><p class="muted">{{ $users->count() }} user accounts with prepared profile images.</p></div><a class="button" href="{{ route('users.create') }}">Add user</a></div>
<div class="panel"><table><thead><tr><th>#</th><th>User</th><th>Username</th><th></th></tr></thead><tbody>
@forelse ($users as $user)<tr><td>{{ $user->id }}</td><td><div class="user-cell"><img class="avatar" src="{{ $user->avatar_url }}" alt="Avatar for {{ $user->full_name }}"><span>{{ $user->full_name }}</span></div></td><td>{{ '@' . $user->username }}</td><td class="actions"><a class="button secondary small" href="{{ route('users.edit', $user) }}">Edit</a></td></tr>
@empty<tr><td colspan="4">No users yet.</td></tr>@endforelse
</tbody></table></div>
@endsection
