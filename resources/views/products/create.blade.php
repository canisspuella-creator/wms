@extends('layouts.app')
@section('title', 'Catat Transaksi')

@section('content')
<h3 class="mb-3">Catat Transaksi Stok</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                <option value="">-- Pilih produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                        {{ $product->sku }} - {{ $product->name }} (stok: {{ $product->stock }} {{ $product->unit }})
                    </option>
                @endforeach
            </select>
            @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Tipe</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                    <option value="in" @selected(old('type') === 'in')>Barang Masuk</option>
                    <option value="out" @selected(old('type') === 'out')>Barang Keluar</option>
                </select>
                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" min="1" name="quantity" value="{{ old('quantity') }}"
                       class="form-control @error('quantity') is-invalid @enderror" required>
                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="transaction_date" max="{{ now()->toDateString() }}"
                       value="{{ old('transaction_date', now()->toDateString()) }}"
                       class="form-control @error('transaction_date') is-invalid @enderror" required>
                @error('transaction_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="note" rows="2"
                      class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
            @error('note')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection