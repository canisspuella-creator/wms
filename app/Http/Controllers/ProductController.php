<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        $products = Product::with(['category', 'supplier'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('sku', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('products.create', $this->formData());
    }

    public function store(Request $request)
    {
        // stok tidak diisi dari form: otomatis 0 (default kolom)
        Product::create($request->validate($this->rules()));

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', $this->formData() + ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate($this->rules($product)));

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->stockTransactions()->exists()) {
            return back()->with('error', 'Produk tidak bisa dihapus karena sudah punya riwayat transaksi.');
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function formData(): array
    {
        return [
            'categories' => Category::orderBy('name')->get(),
            'suppliers' => Supplier::orderBy('name')->get(),
        ];
    }

    private function rules(?Product $product = null): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'sku' => ['required', 'string', 'max:50', Rule::unique('products', 'sku')->ignore($product?->id)],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'unit' => ['required', 'string', 'max:20'],
            'min_stock' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }
}