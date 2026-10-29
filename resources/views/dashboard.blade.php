@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Total Produk</div>
            <div class="fs-2 fw-bold">{{ $totalProducts }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Stok Menipis</div>
            <div class="fs-2 fw-bold text-danger">{{ $lowStock }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-center"><div class="card-body">
            <div class="text-muted">Total Transaksi</div>
            <div class="fs-2 fw-bold">{{ $totalTransactions }}</div>
        </div></div>
    </div>
</div>

<div class="card">
    <div class="card-header">Transaksi Terbaru</div>
    <table class="table mb-0">
        <thead><tr><th>Tanggal</th><th>Produk</th><th>Tipe</th><th>Jumlah</th><th>Oleh</th></tr></thead>
        <tbody>
        @forelse ($recent as $t)
            <tr>
                <td>{{ $t->transaction_date->format('d/m/Y') }}</td>
                <td>{{ $t->product->name }}</td>
                <td>{{ $t->type === 'in' ? 'Masuk' : 'Keluar' }}</td>
                <td>{{ $t->quantity }}</td>
                <td>{{ $t->user->name }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection