<?php

namespace App\Services;

interface AuthService
{
    public function login(array $validated);

    public function signUp($validated);

    public function user();

    public function logout();

    public function refresh();

    public function adminLogin(array $validated);
}
