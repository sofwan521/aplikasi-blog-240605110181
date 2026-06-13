<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 400px; width: 100%; }
        .card-header { background-color: #2C3E50; color: white; border-radius: 12px 12px 0 0 !important; padding: 20px 24px; }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-semibold" style="font-size:16px;">Sistem Manajemen Blog (CMS)</h5>
        <p class="mb-0" style="font-size:12px; color:#aaa;">Silakan login untuk melanjutkan</p>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger py-2" style="font-size:13px;">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Username</label>
                <input type="text" name="user_name" class="form-control"
                    value="{{ old('user_name') }}" placeholder="Masukkan username" autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" style="font-size:13px;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-success w-100 fw-semibold">Masuk</button>
<hr style="margin: 16px 0;">
<p class="text-center mb-0" style="font-size:13px;">
    Belum punya akun? 
    <a href="{{ route('register') }}" style="color:#2C3E50; font-weight:600;">Daftar di sini</a>
</p>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
