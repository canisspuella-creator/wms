@extends('layouts.app')
@section('title', 'Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<div class="card">
    <table class="table mb-0 align-middle">
        <thead><tr><th>Nama</th><th>Deskripsi</th><th>Jumlah Produk</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->products_count }}</td>
                <td class="text-end">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="d-inline"
                          onsubmit="return confirm('Hapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada kategori.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $categories->links() }}</div>
@endsection