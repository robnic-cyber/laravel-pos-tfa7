@extends('layouts.app', ['title' => 'Add Customer'])
@section('content')<div class="page-head"><div><h1>Add customer</h1><p class="muted">Required fields are marked by the browser.</p></div></div><div class="panel"><form method="POST" action="/customers">@csrf @include('customers._form', ['submitLabel' => 'Create customer'])</form></div>@endsection
