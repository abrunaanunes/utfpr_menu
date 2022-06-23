<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {

    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        
        if (!$validator->fails()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
        
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    }

    public function index(Request $request) {

    }

    public function save(Request $request) {

    }

    public function show($id) {
        $user = User::find($id);

        return response()->json([
            'data' => $user
        ]);
    }

    public function edit(Request $request, $id) {

    }

    public function delete($id) {
        
    }
}
