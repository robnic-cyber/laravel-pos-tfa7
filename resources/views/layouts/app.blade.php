<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel POS' }}</title>
    <style>
        :root { font-family: Inter, ui-sans-serif, system-ui, sans-serif; color: #172033; background: #f6f8fb; }
        * { box-sizing: border-box; } body { margin: 0; } .nav { background: #172033; padding: 1rem 7%; display: flex; gap: 1.25rem; align-items: center; }
        .nav a { color: #dbeafe; text-decoration: none; } .nav .brand { color: #fff; font-weight: 700; margin-right: auto; }
        main { max-width: 1100px; margin: 0 auto; padding: 3rem 7%; } .hero, .panel { background: #fff; border-radius: 18px; padding: 2rem; box-shadow: 0 8px 28px rgba(23,32,51,.06); }
        .hero { background: #e0f2fe; } .page-head { display:flex; justify-content:space-between; align-items:center; gap:1rem; margin-bottom:1.5rem; }
        .button { display: inline-block; background: #2563eb; color: #fff; padding: .7rem 1rem; border:0; border-radius: 8px; text-decoration: none; cursor:pointer; font:inherit; }
        .button.secondary { background:#e2e8f0; color:#172033; } .button.small { padding:.5rem .75rem; font-size:.9rem; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 12px; overflow: hidden; } th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; } th { background: #eff6ff; }
        .muted { color: #64748b; } .alert { padding: .85rem 1rem; border-radius: 10px; margin-bottom: 1rem; } .success { background:#dcfce7; color:#166534; } .errors { background:#fee2e2; color:#991b1b; }
        .form-grid { display:grid; gap:1.25rem; max-width:620px; } label { display:block; font-weight:600; margin-bottom:.4rem; } input { width:100%; padding:.75rem; border:1px solid #cbd5e1; border-radius:8px; font:inherit; } input:focus { outline:3px solid #bfdbfe; border-color:#2563eb; } .field-error { display:block; color:#b91c1c; font-size:.9rem; margin-top:.35rem; }
        .avatar { width:48px; height:48px; object-fit:cover; border-radius:50%; vertical-align:middle; } .avatar.large { width:96px; height:96px; } .user-cell { display:flex; align-items:center; gap:.75rem; } .actions { white-space:nowrap; }
        .pagination { margin-top:1.25rem; } .pagination svg { width:1rem; vertical-align:middle; } .pagination a, .pagination span { margin-right:.5rem; }
    </style>
</head>
<body>
    <nav class="nav"><a class="brand" href="{{ route('home') }}">Laravel POS</a><a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}">About</a><a href="{{ route('customers.index') }}">Customers</a><a href="{{ route('users.index') }}">Users</a></nav>
    <main>
        @if (session('status')) <div class="alert success">{{ session('status') }}</div> @endif
        @if ($errors->any()) <div class="alert errors"><strong>Please fix the following:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
        @yield('content')
    </main>
</body>
</html>
