<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class RoleRedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role->nama_role;

            return match ($role) {
                'admin' => redirect()->route('dashboard.admin'),
                'user' => redirect()->route('dashboard.user'),
                default => abort(403, 'Role tidak dikenali.')
            };
        }

        return redirect()->route('login');
    }
}
