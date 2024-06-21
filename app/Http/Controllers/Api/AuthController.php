<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\SignupRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
        ]);

        $userResponse = new UserResource($user);

        return response()->json([
            'status' => successType(),
            'message' => 'User Created Successfully',
            'data' => $userResponse,
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        $userResponse = new UserResource($user);

        return response()->json([
            'message' => 'User Logged In Successfully',
            'access_token' => $token,
            'data' => $userResponse,
        ]);
    }

    public function logout()
    {
        user()->tokens()->delete();

        return response()->json([
            "message" => "logged out"
        ]);
    }
}
