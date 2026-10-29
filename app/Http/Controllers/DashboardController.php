<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'lowStock' => Product::whereColumn('stock', '<=', 'min_stock')->count(),
            'totalTransactions' => StockTransaction::count(),
            'recent' => StockTransaction::with(['product', 'user'])
                ->latest()->take(5)->get(),
        ]);
    }
}