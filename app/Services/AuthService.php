<?php

namespace App\Services;

interface AuthService
{
    public function login(array $validated, $isAdmin = false);

    public function signUp($validated);

    public function user();

    public function logout();

    public function refresh();

}
