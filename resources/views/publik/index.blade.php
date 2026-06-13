@extends('layouts.publik')
@section('title', 'Beranda - Blog Kami')

@section('content')
<div class="row">
    {{-- Kolom Artikel --}}
    <div class="col-lg-8">
        @forelse($artikel as $item)
        <div class="card-artikel">
            @if($item->gambar)
                <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
            @endif
            <div class="p-4">
                <span class="badge-kategori">{{ $item->kategori->nama_kategori ?? '-' }}</span>
                <h5 class="mt-2 mb-2 fw-bold" style="font-size:18px;">{{ $item->judul }}</h5>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="avatar">{{ strtoupper(substr($item->penulis->nama_depan ?? 'P', 0, 1)) }}</span>
                    <span style="font-size:13px; color:#666;">
                        {{ $item->penulis->nama_depan ?? '' }} {{ $item->penulis->nama_belakang ?? '' }}
                        &bull; {{ $item->hari_tanggal }}
                    </span>
                </div>
                <p style="font-size:14px; color:#555; text-align:justify;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 180) }}
                </p>
                <a href="{{ route('publik.detail', $item->id) }}" class="btn btn-baca">
                    Baca Selengkapnya &rarr;
                </a>
            </div>
        </div>
        @empty
        <div class="text-center text-muted py-5">Belum ada artikel.</div>
        @endforelse
    </div>

    {{-- Sidebar --}}
    <div class="col-lg-4">
        <div class="sidebar-card">
            <h6 class="fw-bold mb-3" style="font-size:15px;">Kategori Artikel</h6>
            <a href="{{ route('publik.index') }}"
               class="kategori-item d-flex {{ !$kategoriAktif ? 'active' : '' }}">
                <span>Semua Artikel</span>
                <span class="badge bg-secondary">{{ $totalArtikel }}</span>
            </a>
            @foreach($kategori as $kat)
            <a href="{{ route('publik.index', ['kategori' => $kat->id]) }}"
               class="kategori-item {{ $kategoriAktif == $kat->id ? 'active' : '' }}">
                <span>{{ $kat->nama_kategori }}</span>
                <span class="badge bg-secondary">{{ $kat->artikel_count }}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection