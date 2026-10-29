<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $product->sku ?? '') }}"
               class="form-control @error('sku') is-invalid @enderror" required>
        @error('sku')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-8 mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
               class="form-control @error('name') is-invalid @enderror" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">-- Pilih kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Supplier</label>
        <select name="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror" required>
            <option value="">-- Pilih supplier --</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" @selected(old('supplier_id', $product->supplier_id ?? '') == $supplier->id)>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
        @error('supplier_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Satuan</label>
        <input type="text" name="unit" value="{{ old('unit', $product->unit ?? 'pcs') }}"
               class="form-control @error('unit') is-invalid @enderror" required>
        @error('unit')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price ?? '') }}"
               class="form-control @error('price') is-invalid @enderror" required>
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Stok Minimum</label>
        <input type="number" min="0" name="min_stock" value="{{ old('min_stock', $product->min_stock ?? 0) }}"
               class="form-control @error('min_stock') is-invalid @enderror" required>
        @error('min_stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" rows="3"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>