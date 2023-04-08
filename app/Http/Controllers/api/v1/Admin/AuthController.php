<?php

namespace App\Http\Controllers\api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AuthRequest;
use App\Http\Resources\Client\User\UserResource;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'error' => 'Provided email address or password is incorrect'
            ], 401);
        }

        if (auth()->user()->role != 'admin') {
            return response()->json([
                'success' => false,
                'error' => 'User is not admin'
            ], 401);
        }
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
