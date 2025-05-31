<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-0001',
            'customer_id' => 1, // Pastikan ID ini sesuai dengan ID user yang ada di database
            'book_id' => 1, // Pastikan ID ini sesuai dengan ID buku yang ada di database
            'amount' => 17000.00, // Jumlah transaksi
            'total_amount' => 17000.00, // Jumlah transaksi
        ]);
        Transaction::create([
            'order_number' => 'ORD-0002',
            'customer_id' => 2, // Pastikan ID ini sesuai dengan ID user yang ada di database
            'book_id' => 5, // Pastikan ID ini sesuai dengan ID buku yang ada di database
            'amount' => 25000.00, // Jumlah transaksi
            'total_amount' => 25000.00, // Jumlah transaksi
        ]);
    }
}
