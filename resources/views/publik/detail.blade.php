@extends('layouts.publik')
@section('title', $artikel->judul . ' - Blog Kami')

@section('content')
<div class="row">
    {{-- Konten Artikel --}}
    <div class="col-lg-8">
        {{-- Breadcrumb --}}
        <nav style="font-size:13px;" class="mb-3">
            <a href="{{ route('publik.index') }}" style="color:#2ecc71;">Beranda</a>
            <span class="mx-1 text-muted">/</span>
            <a href="{{ route('publik.index', ['kategori' => $artikel->id_kategori]) }}" style="color:#2ecc71;">
                {{ $artikel->kategori->nama_kategori ?? '-' }}
            </a>
            <span class="mx-1 text-muted">/</span>
            <span class="text-muted">{{ \Illuminate\Support\Str::limit($artikel->judul, 40) }}</span>
        </nav>

        <div class="card-artikel">
            @if($artikel->gambar)
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}">
            @endif
            <div class="p-4">
                <span class="badge-kategori">{{ $artikel->kategori->nama_kategori ?? '-' }}</span>
                <h4 class="mt-2 mb-3 fw-bold">{{ $artikel->judul }}</h4>
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span class="avatar">{{ strtoupper(substr($artikel->penulis->nama_depan ?? 'P', 0, 1)) }}</span>
                    <div>
                        <div class="fw-semibold" style="font-size:13px;">
                            {{ $artikel->penulis->nama_depan ?? '' }} {{ $artikel->penulis->nama_belakang ?? '' }}
                        </div>
                        <div style="font-size:12px; color:#888;">{{ $artikel->hari_tanggal }}</div>
                    </div>
                </div>
                <div style="font-size:15px; color:#333; line-height:1.8; text-align:justify;">
                    {!! nl2br(e($artikel->isi)) !!}
                </div>
                <div class="mt-4">
                    <a href="{{ route('publik.index') }}" class="btn btn-sm"
                       style="background-color:#f0f0f0; color:#555;">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Sidebar Artikel Terkait --}}
    <div class="col-lg-4">
        <div class="sidebar-card">
            <h6 class="fw-bold mb-3" style="font-size:15px;">Artikel Terkait</h6>
            @forelse($artikelTerkait as $terkait)
            <a href="{{ route('publik.detail', $terkait->id) }}" class="text-decoration-none text-dark">
                <div class="d-flex gap-2 mb-3">
                    @if($terkait->gambar)
                        <img src="{{ asset('storage/gambar/' . $terkait->gambar) }}"
                             style="width:64px; height:54px; object-fit:cover; border-radius:6px; flex-shrink:0;">
                    @endif
                    <div>
                        <div style="font-size:13px; font-weight:600; line-height:1.3;">
                            {{ \Illuminate\Support\Str::limit($terkait->judul, 60) }}
                        </div>
                        <div style="font-size:11px; color:#999; margin-top:4px;">{{ $terkait->hari_tanggal }}</div>
                    </div>
                </div>
            </a>
            @empty
            <p style="font-size:13px; color:#aaa;">Tidak ada artikel terkait.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection