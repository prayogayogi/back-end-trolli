<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
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

    public function login(Request $request)
    {
        //
    }
}
