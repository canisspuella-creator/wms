@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Ringkasan Dashboard</h1>
        <p class="page-sub">Pantau stok produk, peringatan stok, dan catatan transaksi inventaris hari ini.</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle me-1"></i> Transaksi Baru
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card stat"><div class="card-body">
            <div>
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">{{ $totalProducts }}</div>
                <div class="stat-note text-info"><i class="bi bi-activity"></i> Aktif di sistem</div>
            </div>
            <span class="stat-icon ic-blue"><i class="bi bi-box-seam"></i></span>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card stat"><div class="card-body">
            <div>
                <div class="stat-label">Stok Menipis</div>
                <div class="stat-value">{{ $lowStock }}</div>
                @if ($lowStock > 0)
                    <div class="stat-note text-danger"><i class="bi bi-exclamation-circle"></i> {{ $lowStock }} produk perlu restock</div>
                @else
                    <div class="stat-note text-success"><i class="bi bi-check-circle"></i> Semua stok aman</div>
                @endif
            </div>
            <span class="stat-icon {{ $lowStock > 0 ? 'ic-red' : 'ic-green' }}"><i class="bi bi-exclamation-triangle"></i></span>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card stat"><div class="card-body">
            <div>
                <div class="stat-label">Total Transaksi</div>
                <div class="stat-value">{{ $totalTransactions }}</div>
                <div class="stat-note text-info"><i class="bi bi-arrow-left-right"></i> Masuk dan keluar terakumulasi</div>
            </div>
            <span class="stat-icon ic-violet"><i class="bi bi-arrow-repeat"></i></span>
        </div></div>
    </div>
</div>

<div class="card">
    <div class="card-head">
        <div>
            <h2 class="section-title"><i class="bi bi-arrow-left-right me-1"></i> Transaksi Terbaru</h2>
            <p class="page-sub">5 catatan aktivitas arus masuk dan keluar barang terakhir.</p>
        </div>
        <a href="{{ route('transactions.index') }}" class="link-all">Lihat Semua <i class="bi bi-chevron-right"></i></a>
    </div>

    <div class="table-responsive">
        <table class="table mb-0 align-middle">
            <thead>
                <tr><th>Tanggal</th><th>Nama Produk</th><th>Tipe</th><th>Jumlah</th><th>Oleh</th></tr>
            </thead>
            <tbody>
            @forelse ($recent as $t)
                <tr>
                    <td>{{ $t->transaction_date->format('d/m/Y') }}</td>
                    <td class="fw-semibold">{{ $t->product->name }}</td>
                    <td>
                        @if ($t->type === 'in')
                            <span class="pill pill-in"><i class="bi bi-arrow-down-short"></i> Masuk</span>
                        @else
                            <span class="pill pill-out"><i class="bi bi-arrow-up-short"></i> Keluar</span>
                        @endif
                    </td>
                    <td class="{{ $t->type === 'in' ? 'qty-in' : 'qty-out' }}">
                        {{ $t->type === 'in' ? '+' : '-' }}{{ $t->quantity }}
                    </td>
                    <td>
                        <span class="mini-chip">
                            <span class="avatar">{{ strtoupper(substr($t->user->name, 0, 1)) }}</span>
                            {{ $t->user->name }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada transaksi. Catat transaksi pertama lewat tombol Transaksi Baru.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection