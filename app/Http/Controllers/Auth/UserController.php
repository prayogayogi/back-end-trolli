<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Laravel\Fortify\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Register
    public function register(Request $request)
    {
        try {
            $request->validate([
                "name" => "required",
                "phone" => "required|string|max:255|unique:users",
                "email" => "required|email|string|max:255|unique:users",
                "password" => ["required", new Password]
            ]);

            User::create([
                "name" => $request->name,
                "phone" => $request->phone,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);

            $user = User::where("email", $request->email)->first();
            $tokenResult = $user->createToken("authToken")->plainTextToken;
            return ResponseFormatter::success([
                "access_token"  => $tokenResult,
                "token_type"    => "Bearer",
                "user"          => $user
            ], "User Registred");
        } catch (\Exception $exception) {
            return ResponseFormatter::error([
                "message" => "Something when wrong",
                "error" => $exception,
            ], "Authentication", 500);
        }
    }

    // Login
    public function login(Request $request)
    {
        try {
            $request->validate([
                "email" => ["required", "email"],
                "password" => ["required"]
            ]);

            $creredential = request(["email", "password"]);
            if (!Auth::attempt($creredential)) {
                return ResponseFormatter::error([
                    "message" => "Unauthhorized"
                ], "Authentication Failed", 500);
            }

            $user = User::where("email", $request->email)->first();
            if (!Hash::check($request->password, $user->password)) {
                throw new \Exception("Invalid Credentials");
            }

            $tokenResult = $user->createToken("authToken")->plainTextToken;
            return ResponseFormatter::success([
                "access_token" => $tokenResult,
                "token_type" => "Bearer",
                "user" => $user
            ], "Authenticated");
        } catch (\Throwable $error) {
            return ResponseFormatter::error([
                "message" => "Something when wrong",
                "error" => $error
            ], "Authenticated Failde", 500);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, "Token revoked");
    }
}
