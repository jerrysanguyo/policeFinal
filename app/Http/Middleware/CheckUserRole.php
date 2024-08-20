<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        if (!$user) {
            return redirect()->route('login'); 
        }
    
        $role = $user->role;
        $prefix = ltrim($request->route()->getPrefix(), '/');
    
        if (($role === 'superadmin' && $prefix !== 'superadmin') ||
            ($role === 'admin' && $prefix !== 'admin') ||
            ($role === 'user' && $prefix !== 'user')) {
            abort(403, 'Unauthorized');
        }
    
        return $next($request);
    }
}
