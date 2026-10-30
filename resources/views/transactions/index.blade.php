@extends('layouts.app')
@section('title', 'Transaksi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Riwayat Transaksi</h3>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Catat Transaksi</a>
</div>

<div class="btn-group mb-3">
    <a href="{{ route('transactions.index') }}"
       class="btn btn-outline-secondary {{ $type ? '' : 'active' }}">Semua</a>
    <a href="{{ route('transactions.index', ['type' => 'in']) }}"
       class="btn btn-outline-secondary {{ $type === 'in' ? 'active' : '' }}">Masuk</a>
    <a href="{{ route('transactions.index', ['type' => 'out']) }}"
       class="btn btn-outline-secondary {{ $type === 'out' ? 'active' : '' }}">Keluar</a>
</div>

<div class="card">
    <table class="table mb-0 align-middle">
        <thead>
            <tr><th>Tanggal</th><th>Produk</th><th>Tipe</th><th class="text-end">Jumlah</th><th>Catatan</th><th>Dicatat oleh</th></tr>
        </thead>
        <tbody>
        @forelse ($transactions as $t)
            <tr>
                <td>{{ $t->transaction_date->format('d/m/Y') }}</td>
                <td>{{ $t->product->name }}</td>
                <td>
                    @if ($t->type === 'in')
                        <span class="badge text-bg-success">Masuk</span>
                    @else
                        <span class="badge text-bg-warning">Keluar</span>
                    @endif
                </td>
                <td class="text-end">{{ $t->quantity }} {{ $t->product->unit }}</td>
                <td>{{ $t->note }}</td>
                <td>{{ $t->user->name }}</td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada transaksi.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $transactions->links() }}</div>
@endsection