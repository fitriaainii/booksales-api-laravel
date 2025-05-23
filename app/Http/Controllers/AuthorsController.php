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



    // STORE DATA (CREATE)
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




    // SHOW DATA
    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $author
        ], 200);
    }


    // DESTROY DATA (DELETE)
    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found",
            ], 404);
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Resource deleted successfully",
        ], 200);
    }


    // UPDATE DATA
    public function update(string $id, Request $request){
        // 1. Mencari data
        $author = Author::find($id);
        if (!$author) {
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
        $author->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully",
            "data" => $author
        ], 200);
    }
}