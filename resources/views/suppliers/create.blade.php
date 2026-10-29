@extends('layouts.app')
@section('title', 'Tambah Supplier')

@section('content')
<h3 class="mb-3">Tambah Supplier</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('suppliers.store') }}">
        @csrf
        @include('suppliers._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection