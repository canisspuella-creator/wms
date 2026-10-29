<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
    'name' => 'Hulu',
    'email' => 'huluaja@gmail.com',
    'password' => Hash::make('belajarwad'),
    'role' => 'admin',
]);


       $staff = User::create([
    'name' => 'Staff Gudang',
    'email' => 'staff@gmail.com',
    'password' => Hash::make('staffwad123'),
    'role' => 'staff',
]);

        foreach (['Elektronik', 'Alat Tulis', 'Makanan & Minuman', 'Peralatan Rumah Tangga'] as $name) {
            Category::create(['name' => $name]);
        }

        $suppliers = [
            ['name' => 'PT Sumber Makmur', 'phone' => '021555001', 'email' => 'sales@sumbermakmur.test', 'address' => 'Jakarta'],
            ['name' => 'CV Maju Jaya', 'phone' => '022555002', 'email' => 'info@majujaya.test', 'address' => 'Bandung'],
            ['name' => 'UD Berkah Abadi', 'phone' => '031555003', 'email' => 'order@berkahabadi.test', 'address' => 'Surabaya'],
        ];
        foreach ($suppliers as $s) {
            Supplier::create($s);
        }

        $cat = Category::pluck('id', 'name');
        $sup = Supplier::pluck('id');

        $products = [
            ['ELK-001', 'Mouse Wireless', 'Elektronik', 'pcs', 85000],
            ['ELK-002', 'Keyboard USB', 'Elektronik', 'pcs', 150000],
            ['ATK-001', 'Pulpen Hitam (Box)', 'Alat Tulis', 'box', 36000],
            ['ATK-002', 'Kertas A4 80gsm', 'Alat Tulis', 'rim', 52000],
            ['MKN-001', 'Air Mineral 600ml (Dus)', 'Makanan & Minuman', 'dus', 48000],
            ['MKN-002', 'Mie Instan (Dus)', 'Makanan & Minuman', 'dus', 110000],
            ['RT-001', 'Sapu Lantai', 'Peralatan Rumah Tangga', 'pcs', 25000],
            ['RT-002', 'Ember Plastik', 'Peralatan Rumah Tangga', 'pcs', 18000],
        ];

        foreach ($products as $i => [$sku, $name, $category, $unit, $price]) {
            Product::create([
                'category_id' => $cat[$category],
                'supplier_id' => $sup[$i % $sup->count()],
                'sku' => $sku,
                'name' => $name,
                'unit' => $unit,
                'stock' => 0,
                'min_stock' => 20,
                'price' => $price,
            ]);
        }

        // Transaksi awal; stok produk diperbarui agar konsisten dengan riwayat
        foreach (Product::all() as $product) {
            $in = rand(50, 150);
            $out = rand(5, 40);

            StockTransaction::create([
                'product_id' => $product->id,
                'user_id' => $admin->id,
                'type' => 'in',
                'quantity' => $in,
                'note' => 'Stok awal',
                'transaction_date' => now()->subDays(7)->toDateString(),
            ]);

            StockTransaction::create([
                'product_id' => $product->id,
                'user_id' => $staff->id,
                'type' => 'out',
                'quantity' => $out,
                'note' => 'Pengiriman pesanan',
                'transaction_date' => now()->subDays(2)->toDateString(),
            ]);

            $product->update(['stock' => $in - $out]);
        }
    }
}