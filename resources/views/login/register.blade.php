<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Manajemen Blog</title>
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
        <p class="mb-0" style="font-size:12px; color:#aaa;">Buat akun baru untuk melanjutkan</p>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger py-2" style="font-size:13px;">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('register.proses') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Nama Depan</label>
                <input type="text" name="nama_depan"
                    class="form-control @error('nama_depan') is-invalid @enderror"
                    value="{{ old('nama_depan') }}"
                    placeholder="Masukkan nama depan" autofocus>
                @error('nama_depan')
                    <div class="invalid-feedback" style="font-size:12px;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Nama Belakang <span class="text-muted fw-normal">(opsional)</span></label>
                <input type="text" name="nama_belakang"
                    class="form-control"
                    value="{{ old('nama_belakang') }}"
                    placeholder="Masukkan nama belakang">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Username</label>
                <input type="text" name="user_name"
                    class="form-control @error('user_name') is-invalid @enderror"
                    value="{{ old('user_name') }}"
                    placeholder="Masukkan username">
                @error('user_name')
                    <div class="invalid-feedback" style="font-size:12px;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" style="font-size:13px;">Password</label>
                <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password (min. 8 karakter)">
                @error('password')
                    <div class="invalid-feedback" style="font-size:12px;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success w-100 fw-semibold">Daftar Sekarang</button>
        </form>
        <small class="d-block text-center mt-3" style="font-size:12px;">
            Sudah punya akun? <a href=