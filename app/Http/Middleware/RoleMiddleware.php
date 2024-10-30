<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($role === 'admin' && $user->role_id !== 1) {
            return redirect()->route('user.dashboard');
        }

        if ($role === 'user' && $user->role_id !== 2) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
