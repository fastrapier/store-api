<?php

namespace App\Http\Controllers\api\v1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\User\LoginUserRequest;
use App\Http\Requests\Client\User\RegisterUserRequest;
use App\Http\Resources\Client\User\UserResource;
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
                'success' => false,
                'error' => 'Provided email address or password is incorrect'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signUp(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($request->password);

        $user = User::create($validated);

        $response = [
            'success' => true,
            'message' => 'User successfully registered',
            'user' => new UserResource($user),
        ];

        $response['user']["access_token"] = auth()->login($user);

        return response()->json($response, 201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json([
            'success' => true,
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
            'success' => true,
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
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $response = [
            'success' => true,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => new UserResource(auth()->user())
        ];
        $response['user']['access_token'] = $token;
        return response()->json($response);
    }
}
