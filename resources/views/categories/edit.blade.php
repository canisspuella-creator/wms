@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<h3 class="mb-3">Edit Kategori</h3>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        @include('categories._form')
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection