<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {

            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'message' => 'Unauthorization'
                ]);
            } else {
                $user = User::where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message' => 'Success login',
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ]);
        }
    }
}
