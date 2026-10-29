@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')
<h3 class="mb-3">Tambah Produk</h3>
<div class="card"><div class="card-body">
    <p class="text-muted">Stok awal otomatis 0. Stok berubah lewat transaksi barang masuk dan keluar.</p>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        @include('products._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection