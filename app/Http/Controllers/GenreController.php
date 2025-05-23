<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        
        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres
        ], 200);
    }

    public function store(Request $request) {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);


        // 2. Check Validator Error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors(),
            ], 422);
        }

        // 3. Insert Data
        Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);


        // 4. Response
        return response()->json([
            "success" => true,
            "message" => "Resource created successfully",
            "data" => [
                'name' => $request->name,
                'description' => $request->description,
            ]
        ], 201);
    }

    // SHOW DATA
    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $genre
        ], 200);
    }



    // DESTROY DATA (DELETE)
    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }


    // UPDATE DATA
    public function update(string $id, Request $request){
        // 1. Mencari data
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }
        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'string|max:1000',
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
            'name' => $request->name,
            'description' => $request->description,
        ];


        // 6. Update data
        $genre->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $genre
        ], 200);
    }
}
