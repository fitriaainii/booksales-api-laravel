<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Registrasi
    public function register(Request $request) {
        // 1. Setup Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|',
        ]);

        // 2. Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // 4. Cek keberhasilan
        if ($user) {
            return response()->json([
                "success" => true,
                "message" => "User created successfully",
                "data" => $user
            ], 201);
        }

        // 5. Cek gagal
        return response()->json([
            "success" => false,
            "message" => "User creation failed"
        ], 409);
    }




    //Login
    public function login(Request $request) {
        // 1. Setup Validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // 2. Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Cek Kredensial dari request
        $credentials = $request->only('email', 'password');

        // 4. Cek isFailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => "Email or password is incorrect"
            ], 401);
        }

        // 5. Cek isSuccess
        return response()->json([
            'success' => true,
            'message' => "Login successfully",
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }
}
