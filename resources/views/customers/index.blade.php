@extends('layouts.app', ['title' => 'Customers'])
@section('content')
<div class="page-head"><div><h1>Customer Accounts</h1><p class="muted">Create and maintain customer records.</p></div><a class="button" href="{{ route('customers.create') }}">Add customer</a></div>
<div class="panel"><table><thead><tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th></th></tr></thead><tbody>
@forelse ($customers as $customer)<tr><td>{{ $customer->id }}</td><td>{{ $customer->full_name }}</td><td>{{ $customer->email }}</td><td>{{ $customer->phone ?: '—' }}</td><td class="actions"><a class="button secondary small" href="{{ route('customers.edit', $customer) }}">Edit</a></td></tr>
@empty<tr><td colspan="5">No customers yet.</td></tr>@endforelse
</tbody></table><div class="pagination">{{ $customers->links() }}</div></div>
@endsection
