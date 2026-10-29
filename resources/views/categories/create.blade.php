@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<h3 class="mb-3">Tambah Kategori</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        @include('categories._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection