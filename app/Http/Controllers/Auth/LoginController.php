<?php

namespace App\Http\Controllers\Auth;

use App\{
    Http\Controllers\Controller,
    Services\Auth\LoginService,
    Http\Requests\Auth\LoginRequest,
};

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(LoginRequest $request)
    {
        $validated = $request->validated();

        if ($this->loginService->login($validated)) {
            $userRole = Auth::user()->role;
            return redirect()->route($userRole . '.dashboard')->with('success', 'Welcome!');
        }

        return redirect()->route('login')->with('Failed', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have logged out successfully!');
    }
}