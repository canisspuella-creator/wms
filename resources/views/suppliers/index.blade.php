@extends('layouts.app')
@section('title', 'Supplier')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Supplier</h3>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Tambah Supplier</a>
</div>

<div class="card">
    <table class="table mb-0 align-middle">
        <thead>
            <tr><th>Nama</th><th>Telepon</th><th>Email</th><th>Alamat</th><th>Produk</th><th class="text-end">Aksi</th></tr>
        </thead>
        <tbody>
        @forelse ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->products_count }}</td>
                <td class="text-end">
                    <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}" class="d-inline"
                          onsubmit="return confirm('Hapus supplier ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center text-muted">Belum ada supplier.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $suppliers->links() }}</div>
@endsection