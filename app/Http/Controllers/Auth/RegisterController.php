<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AccountStoreRequest;
use App\Services\AccountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    protected $accountService;
    
    public function __construct(AccountService $accountService)
    {
        $this->middleware('guest');
        $this->accountService = $accountService;
    }

    public function index()
    {
        return view('auth.register');
    }

    protected function redirectTo()
    {
        $role = auth()->user()->role;

        return match($role) {
            'admin' => '/admin/dashboard',
            'user' => '/user/dashboard',
            'superadmin' => '/superadmin/dashboard',
            default => '/',
        };
    }

    public function register(AccountStoreRequest $request)
    {
        $user = $this->accountService->registerUser($request->validated());

        Auth::login($user);

        return redirect($this->redirectTo());
    }
}
