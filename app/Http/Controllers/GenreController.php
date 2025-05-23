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
}
