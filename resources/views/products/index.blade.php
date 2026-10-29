@extends('layouts.app')
@section('title', 'Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Produk</h3>
    @if (auth()->user()->role === 'admin')
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    @endif
</div>

<form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-3">
    <div class="col-md-5">
        <input type="text" name="q" value="{{ $search }}" class="form-control"
               placeholder="Cari nama atau SKU...">
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-secondary">Cari</button>
        @if ($search)
            <a href="{{ route('products.index') }}" class="btn btn-link">Reset</a>
        @endif
    </div>
</form>

<div class="card">
    <table class="table mb-0 align-middle">
        <thead>
            <tr>
                <th>SKU</th><th>Nama</th><th>Kategori</th><th>Supplier</th>
                <th class="text-end">Harga</th><th class="text-end">Stok</th>
                @if (auth()->user()->role === 'admin')<th class="text-end">Aksi</th>@endif
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->supplier->name }}</td>
                <td class="text-end">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="text-end">
                    {{ $product->stock }} {{ $product->unit }}
                    @if ($product->stock <= $product->min_stock)
                        <span class="badge text-bg-danger">Menipis</span>
                    @endif
                </td>
                @if (auth()->user()->role === 'admin')
                    <td class="text-end">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" class="d-inline"
                              onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr><td colspan="7" class="text-center text-muted">Produk tidak ditemukan.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $products->links() }}</div>
@endsection