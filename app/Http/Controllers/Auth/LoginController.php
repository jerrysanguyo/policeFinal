<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected function redirectTo(): string
    {
        $role = auth()->user()->role;

        $routes = [
            'admin' => route('admin.dashboard'),
            'user' => route('user.dashboard'),
            'superadmin' => route('superadmin.dashboard'),
        ];

        return $routes[$role] ?? route('home'); 
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
