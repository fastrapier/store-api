<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signUp']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'error' => 'Unauthorized'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signUp(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($request->password);

        $user = User::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'user' => new UserResource($user),
            'access_token' => auth()->login($user)
        ], 201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json([
            'status' => true,
            'user' => new UserResource(auth()->user())
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => new UserResource(auth()->user())
        ]);
    }
}
