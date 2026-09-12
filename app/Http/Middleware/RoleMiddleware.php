<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | Pastikan pengguna sudah login
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            return redirect()->route('login');
        }


        /*
        |--------------------------------------------------------------------------
        | Ambil role pengguna yang sedang login
        |--------------------------------------------------------------------------
        */

        $userRole = Auth::user()->role;


        /*
        |--------------------------------------------------------------------------
        | Cek apakah role pengguna diizinkan
        |--------------------------------------------------------------------------
        */

        if (!in_array($userRole, $roles, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }


        /*
        |--------------------------------------------------------------------------
        | Lanjutkan request
        |--------------------------------------------------------------------------
        */

        return $next($request);
    }
}