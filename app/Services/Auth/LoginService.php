<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $validated): bool
    {
        return Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
    }
}