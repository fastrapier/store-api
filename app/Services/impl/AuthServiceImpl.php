<?php

namespace App\Services\impl;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthServiceImpl implements AuthService
{

    public function login(array $validated, $isAdmin = false): JsonResponse
    {
        if (!$token = auth()->attempt($validated)) {
            return response()->json([
                'error' => 'Provided email address or password is incorrect'
            ], 401);
        }
        return $this->respondWithToken($token);
    }

    public function signUp($validated): JsonResponse
    {
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        $response = [
            'success' => true,
            'message' => 'User successfully registered',
            'user' => new UserResource($user),
            'access_token' => auth()->login($user)
        ];

        return response()->json($response, 201);
    }

    public function user(): JsonResponse
    {
        return response()->json([
            'user' => new UserResource(auth()->user())
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token): JsonResponse
    {
        $response = [
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => new UserResource(auth()->user()),
            'access_token' => $token
        ];
        return response()->json($response);
    }

    public function adminLogin(array $validated): JsonResponse
    {
        if (!$token = auth()->attempt($validated)) {
            return response()->json([
                'error' => 'Provided email address or password is incorrect'
            ], 401);
        }

        if (auth()->user()->role != 'admin') {
            return response()->json([
                'error' => 'This user is not admin'
            ], 403);
        }

        return $this->respondWithToken($token);
    }
}
