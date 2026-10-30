<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StockTransactionController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');

        $transactions = StockTransaction::with(['product', 'user'])
            ->when(in_array($type, ['in', 'out'], true), fn ($q) => $q->where('type', $type))
            ->latest('transaction_date')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        return view('transactions.index', compact('transactions', 'type'));
    }

    public function create()
    {
        return view('transactions.create', [
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'type' => ['required', Rule::in(['in', 'out'])],
            'quantity' => ['required', 'integer', 'min:1'],
            'transaction_date' => ['required', 'date', 'before_or_equal:today'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        // Semua langkah di bawah berhasil bersama-sama, atau dibatalkan semuanya
        DB::transaction(function () use ($data, $request) {
            // lockForUpdate: baris produk dikunci sampai transaksi selesai,
            // sehingga dua pencatatan bersamaan tidak bisa menghasilkan stok salah
            $product = Product::lockForUpdate()->findOrFail($data['product_id']);

            if ($data['type'] === 'out' && $product->stock < $data['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => "Stok tidak cukup. Stok saat ini: {$product->stock} {$product->unit}.",
                ]);
            }

            $product->stock += $data['type'] === 'in' ? $data['quantity'] : -$data['quantity'];
            $product->save();

            StockTransaction::create($data + ['user_id' => $request->user()->id]);
        });

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil dicatat dan stok diperbarui.');
    }
}