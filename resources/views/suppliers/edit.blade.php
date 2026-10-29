@extends('layouts.app')
@section('title', 'Edit Supplier')

@section('content')
<h3 class="mb-3">Edit Supplier</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('suppliers.update', $supplier) }}">
        @csrf
        @method('PUT')
        @include('suppliers._form')
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection