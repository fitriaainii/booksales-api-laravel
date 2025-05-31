<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();
        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "No transactions found",
            ], 404);
        }
        return response()->json([
            "success" => true,
            "message" => "Retrieved all transactions",
            "data" => $transactions
        ], 200);

    }




    public function store(Request $request)
    {
        // 1. Validator & cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'data' => $validator->errors()
            ], 422);
        }


        // 2. Generate orderNumber -> unique order number
        $uniqueCode = 'ORD-' . strtoupper(uniqid());


        // 3. Ambil user yang sedang login & cek login (apakah ada data user)
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }


        // 4. Mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. Cek apakah buku tersedia (stok buku)
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stock not enough',
            ], 400);
        }


        // 6. Hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;


        // 7. Kurangi stok buku (update)
        $book->stock -= $request->quantity;
        $book->save();


        // 8. Simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'amount' => $book->price,
            'total_amount' => $totalAmount,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transactions,
        ], 201);
    }





    public function show($id)
    {
        // 1. Cek apakah user sudah login
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }
        // 2. Cek apakah transaksi dengan ID tersebut ada
        $transaction = Transaction::with(['user', 'book'])->find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }
        // 3. Tampilkan detail transaksi
        return response()->json([
            'success' => true,
            'message' => 'Transaction details retrieved successfully',
            'data' => $transaction,
        ], 200);
    }




    public function update(Request $request, $id)   
    {
        // 1. Cek apakah user sudah login
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }
        // 2. Cek apakah transaksi dengan ID tersebut ada
        $transaction = Transaction::with(['user', 'book'])->find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }
        // 3. Tampilkan form untuk mengedit transaksi
        return response()->json([
            'success' => true,
            'message' => 'Display form for editing transaction',
            'data' => $transaction,
        ], 200);
    }



    public function destroy($id)
    {
        // 1. Cek apakah user sudah login
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
            ], 401);
        }
        // 2. Cek apakah transaksi dengan ID tersebut ada
        $transaction = Transaction::with(['user', 'book'])->find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
            ], 404);
        }
        // 3. Hapus transaksi
        $transaction->delete();
        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
        ], 200);
    }
}
