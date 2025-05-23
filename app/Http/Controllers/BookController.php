<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $books
        ], 200);
    }

    public function store(Request $request) {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:authors,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        // 2. Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors(),
            ], 422);
        }


        // 3. Upload Image
        $image = $request->file('cover_photo');
        $image->store('images', 'public');

        // 4. Insert Data
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
        ]);
        

        // 5. Response
        return response()->json([
            "success" => true,
            "message" => "Resource created successfully",
            "data" => [
                'title' => $request->title,
                'author_id' => $request->author_id,
                'genre_id' => $request->genre_id,
                'price' => $request->price,
                'stock' => $request->stock,
                'cover_photo' => $image->hashName(),
            ]
        ], 201);
    }
}
