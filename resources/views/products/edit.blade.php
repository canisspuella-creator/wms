@extends('layouts.app')
@section('title', 'Edit Produk')

@section('content')
<h3 class="mb-3">Edit Produk</h3>
<div class="card"><div class="card-body">
    <p class="text-muted">Stok saat ini: <strong>{{ $product->stock }}</strong> {{ $product->unit }} (diubah lewat transaksi, bukan di sini).</p>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        @include('products._form')
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection