<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; font-family: 'Segoe UI', sans-serif; }
        .navbar-brand-sub { font-size: 11px; color: #aaa; display: block; margin-top: -4px; }
        .navbar { background-color: #2C3E50; }
        .navbar-brand, .nav-link { color: #fff !important; }
        .nav-link:hover { color: #ddd !important; }
        .footer { background-color: #2C3E50; color: #aaa; font-size: 13px; padding: 20px 0; text-align: center; margin-top: 48px; }
        .badge-kategori { background-color: #2C3E50; color: #fff; font-size: 11px; padding: 3px 10px; border-radius: 20px; }
        .avatar { width: 28px; height: 28px; border-radius: 50%; background-color: #2C3E50; color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 600; }
        .card-artikel { border: none; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); margin-bottom: 24px; overflow: hidden; }
        .card-artikel img { width: 100%; height: 220px; object-fit: cover; }
        .sidebar-card { border: none; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07); padding: 20px; background: #fff; margin-bottom: 20px; }
        .kategori-item { display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; border-radius: 6px; color: #333; text-decoration: none; font-size: 14px; }
        .kategori-item:hover { background-color: #f0f0f0; }
        .kategori-item.active { background-color: #2ecc71; color: #fff; font-weight: 600; }
        .kategori-item.active .badge { background-color: #27ae60 !important; }
        .btn-baca { background-color: #2ecc71; color: #fff; border: none; font-size: 13px; padding: 6px 16px; border-radius: 6px; }
        .btn-baca:hover { background-color: #27ae60; color: #fff; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('publik.index') }}">
            Blog Kami
            <span class="navbar-brand-sub fw-normal">Artikel terbaru seputar teknologi dan pemrograman</span>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('publik.index') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('publik.index') }}">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('publik.index') }}">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<div class="footer">
    &copy; 2026 Blog Kami. Seluruh hak cipta dilindungi.
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>