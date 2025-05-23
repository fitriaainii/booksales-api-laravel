<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

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

    // STORE DATA (CREATE)
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

    // SHOW DATA
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $book
        ], 200);
    }

    // DESTROY DATA (DELETE)
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        if ($book->cover_photo) {
            // Delete the image from storage
            Storage::disk('public')->delete('images/' . $book->cover_photo);
        }

        $book->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }


    // UPDATE DATA
    public function update(string $id, Request $request){
        // 1. Mencari data
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }
        // 2. Validator
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'author_id' => 'integer|exists:authors,id',
            'genre_id' => 'integer|exists:genres,id',
            'price' => 'numeric|min:0',
            'stock' => 'integer|min:0',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // 3. Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors(),
            ], 422);
        }

        // 4. Siapkan data yang ingin diupdate
        $data = [
            'title' => $request->title,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'price' => $request->price,
            'stock' => $request->stock,
        ];

        // 5. Jika ada cover_photo yang diupload
        if ($request->hasFile('cover_photo')) {
            // Upload file
            $image = $request->file('cover_photo');
            $image->store('images', 'public');

            // Hapus cover_photo yang lama
            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }

        // 6. Update data
        $book->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $book
        ], 200);
    }

}
