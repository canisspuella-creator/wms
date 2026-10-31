<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WMS') - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #060a15;
            --surface: rgba(255, 255, 255, .045);
            --border: rgba(255, 255, 255, .09);
            --text: #e8ecf6;
            --muted: #8b95ad;
            --accent: #3b82f6;
        }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            color: var(--text);
            min-height: 100vh;
            background:
                radial-gradient(900px 500px at 85% -10%, rgba(99, 102, 241, .22), transparent 60%),
                radial-gradient(800px 500px at -10% 10%, rgba(59, 130, 246, .18), transparent 60%),
                var(--bg);
            background-attachment: fixed;
        }

        /* Navbar */
        .topbar { border-bottom: 1px solid var(--border); background: rgba(6, 10, 21, .7); backdrop-filter: blur(14px); margin-bottom: 2rem; }
        .topbar-inner { display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap; padding-block: .8rem; }
        .brand { display: flex; align-items: center; gap: .7rem; text-decoration: none; color: var(--text); }
        .brand-mark { width: 40px; height: 40px; border-radius: 12px; display: grid; place-items: center; font-size: 1.2rem; background: linear-gradient(135deg, #3b82f6, #7c3aed); box-shadow: 0 6px 20px rgba(99, 102, 241, .45); }
        .brand-text { display: flex; flex-direction: column; line-height: 1.15; }
        .brand-text small { color: var(--muted); font-size: .68rem; }
        .navx-list { display: flex; gap: .25rem; list-style: none; margin: 0 auto 0 0; padding: 0; flex-wrap: wrap; }
        .navx { display: flex; align-items: center; gap: .45rem; padding: .5rem .9rem; border-radius: 999px; color: var(--muted); text-decoration: none; font-weight: 500; font-size: .9rem; border: 1px solid transparent; }
        .navx:hover { color: var(--text); }
        .navx.active { color: #fff; background: rgba(59, 130, 246, .16); border-color: rgba(59, 130, 246, .4); }
        .user-chip { display: flex; align-items: center; gap: .6rem; padding: .3rem .4rem .3rem .35rem; border: 1px solid var(--border); border-radius: 999px; background: var(--surface); }
        .avatar { width: 32px; height: 32px; border-radius: 50%; display: grid; place-items: center; font-weight: 700; font-size: .85rem; background: linear-gradient(135deg, #22c55e, #16a34a); color: #fff; flex-shrink: 0; }
        .who { display: flex; flex-direction: column; line-height: 1.1; }
        .who small { color: var(--muted); font-size: .68rem; }
        .btn-logout { border: 0; background: transparent; color: var(--muted); padding: .35rem .6rem; border-radius: 999px; }
        .btn-logout:hover { color: #fb7185; }

        /* Komponen umum: kartu, tabel, form, tombol */
        .card { background: var(--surface); border: 1px solid var(--border); border-radius: 18px; backdrop-filter: blur(10px); overflow: hidden; }
        .table { --bs-table-bg: transparent; --bs-table-color: var(--text); --bs-table-border-color: var(--border); --bs-table-hover-bg: rgba(255, 255, 255, .03); }
        .table thead th { color: var(--muted); font-weight: 600; font-size: .78rem; letter-spacing: .04em; text-transform: uppercase; padding-block: .9rem; background: rgba(255, 255, 255, .03); }
        .table td { padding-block: .95rem; }
        .form-control, .form-select { background-color: rgba(255, 255, 255, .05); border-color: var(--border); color: var(--text); border-radius: 12px; }
        .form-control:focus, .form-select:focus { background-color: rgba(255, 255, 255, .07); border-color: var(--accent); box-shadow: 0 0 0 .2rem rgba(59, 130, 246, .25); color: var(--text); }
        option { background: #0f1629; color: var(--text); }
        .btn { border-radius: 12px; font-weight: 600; }
        .btn-primary { background: linear-gradient(135deg, #3b82f6, #2563eb); border: 0; box-shadow: 0 8px 24px rgba(59, 130, 246, .35); }
        .btn-primary:hover, .btn-primary:focus { background: linear-gradient(135deg, #3b82f6, #2563eb); filter: brightness(1.12); }
        .alert { border-radius: 14px; border-color: var(--border); }

        /* Dashboard */
        .page-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; flex-wrap: wrap; margin-bottom: 1.8rem; }
        .page-title { font-size: 2.2rem; font-weight: 800; letter-spacing: -.02em; margin: 0; }
        .page-sub { color: var(--muted); margin: .3rem 0 0; }
        .stat .card-body { display: flex; justify-content: space-between; align-items: center; padding: 1.4rem; }
        .stat-label { color: var(--muted); font-size: .75rem; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; }
        .stat-value { font-size: 2.6rem; font-weight: 800; line-height: 1.1; margin: .2rem 0; }
        .stat-note { font-size: .82rem; font-weight: 500; }
        .stat-icon { width: 56px; height: 56px; border-radius: 16px; display: grid; place-items: center; font-size: 1.5rem; }
        .ic-blue { background: rgba(59, 130, 246, .16); color: #60a5fa; }
        .ic-green { background: rgba(34, 197, 94, .16); color: #4ade80; }
        .ic-red { background: rgba(239, 68, 68, .16); color: #f87171; }
        .ic-violet { background: rgba(139, 92, 246, .18); color: #a78bfa; }
        .card-head { display: flex; justify-content: space-between; align-items: center; gap: 1rem; padding: 1.3rem 1.4rem 1rem; }
        .section-title { font-size: 1.15rem; font-weight: 700; margin: 0; }
        .link-all { color: #60a5fa; text-decoration: none; font-weight: 600; font-size: .9rem; white-space: nowrap; }
        .pill { display: inline-flex; align-items: center; gap: .35rem; padding: .25rem .75rem; border-radius: 999px; font-size: .78rem; font-weight: 600; border: 1px solid; }
        .pill-in { color: #4ade80; background: rgba(34, 197, 94, .1); border-color: rgba(34, 197, 94, .45); }
        .pill-out { color: #fb7185; background: rgba(239, 68, 68, .1); border-color: rgba(239, 68, 68, .45); }
        .qty-in { color: #4ade80; font-weight: 700; }
        .qty-out { color: #fb7185; font-weight: 700; }
        .mini-chip { display: inline-flex; align-items: center; gap: .5rem; }
        .mini-chip .avatar { width: 26px; height: 26px; font-size: .72rem; background: rgba(255, 255, 255, .14); }

        @media (max-width: 768px) { .page-title { font-size: 1.7rem; } .topbar-inner { gap: .8rem; } }
    </style>
</head>
<body>
<nav class="topbar">
    <div class="container topbar-inner">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-mark"><i class="bi bi-box-seam-fill"></i></span>
            <span class="brand-text">
                <strong>{{ config('app.name') }}</strong>
                <small>Warehouse Management System</small>
            </span>
        </a>

        @auth
            <ul class="navx-list">
                <li><a class="navx {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
                <li><a class="navx {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}"><i class="bi bi-box-seam"></i> Produk</a></li>
                <li><a class="navx {{ request()->routeIs('transactions.*') ? 'active' : '' }}" href="{{ route('transactions.index') }}"><i class="bi bi-arrow-left-right"></i> Transaksi</a></li>
                @if (auth()->user()->role === 'admin')
                    <li><a class="navx {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}"><i class="bi bi-tags"></i> Kategori</a></li>
                    <li><a class="navx {{ request()->routeIs('suppliers.*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}"><i class="bi bi-truck"></i> Supplier</a></li>
                @endif
            </ul>

            <div class="user-chip">
                <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                <span class="who">
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>{{ auth()->user()->role }}</small>
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn-logout" title="Logout"><i class="bi bi-box-arrow-right"></i></button>
                </form>
            </div>
        @endauth
    </div>
</nav>

<div class="container pb-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>