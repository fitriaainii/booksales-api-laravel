<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $authors
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
        Author::create([
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